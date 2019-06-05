<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fantasy;
use App\Models\ActivePoint;

class GameController extends Controller
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
    
  public function show($id)
  {
    $data[] = array();
    $fantasy = Fantasy::where('id', $id)->first();
    $activepoints = ActivePoint::where('id_fantasy', $id)->orderBy('turn','ASC')->get();
    $data['fantasy'] = $fantasy;
    $data['activepoints'] = $activepoints;

    return view('Fantasy.display',compact('data'));
  }
}
