<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivePoint;
use App\Models\Fantasy;

use File;

class ActivePointController extends Controller
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
    
        //INICIO STOREAJAX
        public function storeAjax(Request $request)
        {
            if(! ActivePoint::where('token', '=', $request->token)->exists()) {
                $activepoint = new ActivePoint();
                $image_path = null;
                $audio_path = null;
                //$music_path = null;
            }
            else {
                $activepoint = ActivePoint::where('token', '=', $request->token)->first();
                $image_path = $activepoint->image;
                $audio_path = $activepoint->audio;
                //$music_path = $activepoint->music;
            }

            //CAMPOS DE TEXTO A GUARDAR
            $activepoint->title = $request->title;
            $activepoint->token = $request->token;
            $activepoint->text = $request->text;
            $activepoint->turn = $request->turn;
            $activepoint->video = $request->video;
            $video = $request->video;
            $video = str_replace("https://www.youtube.com/watch?v=","",$video);
            $activepoint->video = $video;
            $activepoint->coordinateX = $request->coordinateX;
            $activepoint->coordinateY = $request->coordinateY;
            $activepoint->height = $request->height;
            $activepoint->width = $request->width;
            $activepoint->status = $request->status;
            // consulta tomar id de la fantasia con el token
            $id_fantasy = Fantasy::where('token', $request->token_fantasy)->first()->id;
            $activepoint->id_fantasy = $id_fantasy;
            //FIN CAMPOS TEXTO

            $activepoint->html = $request->html;

            //SUBIDA IMAGEN AP
           if( $request->hasFile('image') ){

                if (File::exists($image_path)) {
                    unlink($image_path);
                }
                // para la extension deberia enviarse en un campo del request porque el MIME type es unico
                // por cada request http
                $dir = 'uploads/activepoints/images/';  // ruta relativa al directorio public
                $filename = $request->token;
                $request->file('image')->move($dir, $filename);
                $activepoint->image = ($dir . $request->token);
            }

            //SUBIDA AUDIO AP
            if( $request->hasFile('audio') ){

                if (File::exists($audio_path)) {
                    unlink($audio_path);
                }
                // para la extension deberia enviarse en un campo del request porque el MIME type es unico
                // por cada request http
                $dir = 'uploads/activepoints/audio/';  // ruta relativa al directorio public
                $filename = $request->token;
                $request->file('audio')->move($dir, $filename);
                $activepoint->audio = ($dir . $request->token);
            }
            //FIN AUDIO AP

            /* //SUBIDA MUSIC AP
            if( $request->hasFile('music') ){

                if (File::exists($music_path)) {
                    unlink($music_path);
                }
                // para la extension deberia enviarse en un campo del request porque el MIME type es unico
                // por cada request http
                $dir = 'uploads/activepoints/music/';  // ruta relativa al directorio public
                $filename = $request->token;
                $request->file('music')->move($dir, $filename);
                $activepoint->music = ($dir . $request->token);
            }*/
            //FIN MUSIC AP

            //GUARDADO AP
            $activepoint->save();

            // Response

            if ( $request->hasFile('image')  ) {
                return response()->json(['image' => '../../' . $activepoint->image]);
            }

            //

        }

    public function deleteAjax(Request $request)
    {
        if (ActivePoint::where('token', '=', $request->token)->exists()) {
            $id = ActivePoint::where('token', $request->token)->first()->id;

            $image_path = ActivePoint::where('id', $id)->first()->image;
            $video_path = ActivePoint::where('id', $id)->first()->video;
            $audio_path = ActivePoint::where('id', $id)->first()->audio;
            //$music_path = ActivePoint::where('id', $id)->first()->music;

            if (File::exists($image_path)) {
                unlink($image_path);
            }
            if (File::exists($video_path)) {
                unlink($video_path);
            }
            if (File::exists($audio_path)) {
                unlink($audio_path);
            }
            /* if (File::exists($music_path)) {
                unlink($music_path);
            }*/

            ActivePoint::where('id', $id)->delete();

        // Response
            return response()->json(['token' => $request->token]);
        }
    }

    //Funcion para obtener los PA por el token
    public function showAjax(Request $request){
        if (ActivePoint::where('token', '=', $request->token)->exists()) {
            $ActivePoint = ActivePoint::where('token', $request->token)->first();
            return response()->json([
                    'title' => $ActivePoint->title,
                    'image' => '../../' . $ActivePoint->image,
                    'top' => $ActivePoint->coordinateY,
                    'left' => $ActivePoint->coordinateX,
                    'height' => $ActivePoint->height,
                    'width' => $ActivePoint->width
            ]);
	}

    }

    // Obtains the necessary data to fill the AP modal (excluding quiz, see QuizController)
    public function modalAjax(Request $request){
        if (ActivePoint::where('token', '=', $request->ap_token)->exists()) {
            $ActivePoint = ActivePoint::where('token', $request->ap_token)->first();
            return response()->json([
                    'title' => $ActivePoint->title,
		    'turn' => $ActivePoint->turn,
		    'text' => $ActivePoint->text,
		    'video' => $ActivePoint->video
            ]);
	}

    }

}
