<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tests()
    {
        return $this->belongsToMany('App\Models\Test' ,'test__results' ,'user_id' ,'test_id')->withPivot('result');
    }

    public function scopeToDoTests()
    {
        return $this->belongsToMany('App\Models\Test' ,'test__results' ,'user_id' ,'test_id')->withPivot('result')->whereNull('result');
    }

    public function scopeDoneTests()
    {
        return $this->belongsToMany('App\Models\Test' ,'test__results' ,'user_id' ,'test_id')->withPivot('result')->whereNotNull('result');
    }

    public function scopeQuestionParagraph()
    {
        return $this->belongsToMany('App\Models\Question' ,'answer__tests' ,'user_id' ,'question_id')->withPivot('choice_id' , 'paragraph')->whereNotNull('paragraph');
    }

    public function scopeQuestionChoice()
    {
        return $this->belongsToMany('App\Models\Question' ,'answer__tests' ,'user_id' ,'question_id')->withPivot('choice_id' , 'paragraph')->whereNotNull('choice_id');
    }



}
