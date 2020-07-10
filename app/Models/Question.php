<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{

    public function Group()
    {
    	return $this->belongsTo('App\Models\Group');
    }

    public function choices()
    {
    	return $this->hasMany('App\Models\Choice');
    }


}
