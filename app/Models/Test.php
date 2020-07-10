<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Test extends Model
{
    protected $fillable = ['name' , 'time' , 'description' , 'instructions'];

 
    public function groups()
    {
    	return $this->hasMany('App\Models\Group');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\Test' ,'test__results' ,'test_id','user_id')->withPivot('result');
    }

    public function questions()
    {
        return $this->hasManyThrough('App\Models\Question' , 'App\Models\Group');
    }

}
