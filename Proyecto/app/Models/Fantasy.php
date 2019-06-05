<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fantasy extends Model
{
	protected $table = 'fantasies';

    protected $fillable = ['name', 'state', 'password','topic','author', 'token', 'image'];
}
