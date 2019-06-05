<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
	protected $table = 'keywords';

  protected $fillable = ['id_fantasy', 'name'];
}
