<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidMark extends Model
{
	protected $table = 'validmarks';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $score = 'score';
    public $id_quiz = 'id_quiz';     
}
