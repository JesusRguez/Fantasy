<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['questiontext' ,
                         'type' ,
			 'image',
                         'score' ,
                         'id_quiz'
                         ];
}
