<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivePoint extends Model
{
	protected $table = 'activepoints';
       protected $fillable = ['image' ,
							'audio' ,
							'music' ,
							'title' ,
							'token' ,
							'text' ,
							'turn' ,
							'video' ,
							'coordinateX' ,
							'coordinateY' ,
							'height' ,
							'width' ,
							'status' ,
							'id_fantasy',
							'html'];
}
