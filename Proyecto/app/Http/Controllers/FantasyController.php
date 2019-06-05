<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fantasy;
use Validator;
use File;
use App\Models\ActivePoint;


class FantasyController extends Controller
{

  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $fantasies=Fantasy::orderBy('id','DESC')->get();
    return view('index',compact('fantasies'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('Fantasy.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request,[ 'name'=>'required', 'state', 'password','topic','author']);
    Fantasy::create($request->all());
    return redirect()->route('Fantasy.index')->with('success','Registro creado satisfactoriamente');
  }

  //INICIO STOREAJAX
  public function storeAjax(Request $request)
  {
    if(! Fantasy::where('token', '=', $request->token)->exists())
    $fantasy = new Fantasy();
    else
    $fantasy = Fantasy::where('token', '=', $request->token)->first();

    //CAMPOS DE TEXTO A GUARDAR
    $fantasy->name = $request->name;
    $fantasy->token = $request->token;
    if( $request->description){
      $fantasy->description = $request->description;
    }
    //FIN CAMPOS TEXTO

    $haycambioimagen = false;

    //SUBIDA IMAGEN BACKGROUND
    if($request->file('backgroundImage')){

      if($fantasy->backgroundImage){
        $image_path = Fantasy::where('token', $request->token)->first()->backgroundImage;
        if (File::exists($image_path)) {
          //File::delete($image_path);
          unlink($image_path);
          //File::delete('uploads/backgroundImage' . Fantasy::where('id', $id)->first()->token);
        }

      }
      $extension = $request->file('backgroundImage');
      $extension = $request->file('backgroundImage')->getClientOriginalExtension(); // getting excel extension
      $dir = 'uploads/background/';
      $filename = $request->token;
      $request->file('backgroundImage')->move($dir, $filename);
      $fantasy->backgroundImage = ($dir . $request->token);
      $fantasy->backgroundColor = null;
    }
    //SINO SUBIDA COLOR BACKGROUND
    else{
      if($fantasy->backgroundImage && $request->backgroundColor != 'FFFFFF'){
        $fantasy->backgroundColor = $request->backgroundColor;
        $fantasy->backgroundImage = null;
      }
      elseif($request->backgroundColor == 'FFFFFF'){
        $haycambioimagen = true;
      }

      else{
        $fantasy->backgroundColor = $request->backgroundColor;
        $haycambioimagen = true;
      }
    }

    //SUBIDA IMAGEN PORTADA
    if($request->file('mainImage')){

      if($fantasy->image){
        $image_path = Fantasy::where('token', $request->token)->first()->image;
        if (File::exists($image_path)) {
          //File::delete($image_path);
          unlink($image_path);
          //File::delete('uploads/backgroundImage' . Fantasy::where('id', $id)->first()->token);
        }

      }
      $extension = $request->file('mainImage');
      $extension = $request->file('mainImage')->getClientOriginalExtension(); // getting excel extension
      $dir = 'uploads/images/';
      $filename = $request->token;
      $request->file('mainImage')->move($dir, $filename);
      $fantasy->image = ($dir . $request->token);
    }
    //FIN IMAGEN PORTADA

    //GURADADO FANTASIA
    $fantasy->save();

    //RETORNOS JSON
    if($request->action == 'create'){
      $fantasy2 = Fantasy::where('token', '=', $request->token)->first();
      return response()->json(['url'=>'/fantasy/'.$fantasy2->id.'/edit']);
      //return redirect()->route('FantasyController@edit', [$fantasy->id]);
      /*
      if($request->file('backgroundImage'))
      {
        return response()->json(['backgroundImage'=> '../' . $fantasy->backgroundImage]);
      }
      else{
        return response()->json(['backgroundColor'=> $fantasy->backgroundColor]);
      }*/
    }

    if($request->action == 'edit' && $request->file('backgroundImage')){
      return response()->json(['backgroundImage'=> '../../' . $fantasy->backgroundImage]);
    }
    elseif($request->action == 'edit' && !$request->file('backgroundImage') && !$haycambioimagen){
      if($fantasy->backgroundImage != null){
        return response()->json(['backgroundImage'=> '../' . $fantasy->backgroundImage]);
      }
      else{
        return response()->json(['backgroundColor'=> $fantasy->backgroundColor]);
      }
    }
    elseif ($request->action == 'edit' && !$request->file('backgroundImage') && $haycambioimagen) {
      return response()->json(['backgroundImage'=> '../../' . $fantasy->backgroundImage]);
    }


  }//FIN STOREAJAX

  /*public function storeAjaxImg(Request $request)
  {
  $validation = Validator::make($request->all(), [
  'imgBack' => 'required|image|mimes:png'
]);
if(!$validation->passes())
{
$image = $request->file('imgBack');
$new_name = $request->_token . '.' . $image->getClientOriginalExtension();
$image->move(public_path('images'), $new_name);

return response()->json([
'uploaded_image' => public_path('images'.$new_name)
]);
}
else
{
return response()->json([
'message'   => $validation->errors()->all(),
'uploaded_image' => '',
'class_name'  => 'alert-danger'
]);
}

}*/

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
  $fantasy=Fantasy::find($id);
  return  view('Fantasy.show',compact('fantasy'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
  $data[] = array();
  $fantasy = Fantasy::where('id', $id)->first();
  $data['fantasy'] = $fantasy;
  $activepoints = ActivePoint::where('id_fantasy',$id)->get();
  $data['activepoints'] = $activepoints;
  return view('Fantasy.edit',compact('data'));
}

/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
  //
}

public function search()
{
  return view('search');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
  $image_path = Fantasy::where('id', $id)->first()->image;
  $audio_path = Fantasy::where('id', $id)->first()->audio;
  if (File::exists($image_path)) {
    unlink($image_path);
  }
  if (File::exists($audio_path)) {
    unlink($audio_path);
  }

  Fantasy::where('id', $id)->delete();

  return redirect()->route('index')->with('success','Delete');
}


	public function modalAjax(Request $request) {

		if(Fantasy::where('token', $request->fantasy_token)->exists()) {

			$fantasy = Fantasy::where('token', $request->fantasy_token)->get(['topic','description','name']);
			return json_encode($fantasy);
		}
	}


}
