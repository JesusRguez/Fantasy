<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizes';
    protected $fillable = [
	'id_fantasy',
	'id_activepoint',
    	'id_student1',
	'id_student2'
    ];
}
