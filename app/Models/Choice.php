<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Choice extends Model
{
	
    public function question()
    {
    	return $this->belongsTo('App\Models\Question');
    }
}
