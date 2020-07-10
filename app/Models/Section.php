<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Section extends Model
{
    use HasSlug;

    const SERVICE = 1;
    const PRESS = 2;
    const VACANCY = 3;
    const COURSE = 4;
    const ARTICLE = 5;
    const TEAM = 6;
    const SLIDER = 7;

    protected $fillable = ['title' , 'type' , 'description'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function requests ()
    {
        return $this->hasMany('App\Models\Request' , 'career_id');
    }

    public function sub_section()
    {
        return $this->hasMany('App\Models\Section' , 'parent_id');
    }

    public function getRouteKeyName()
    {
        return  ('slug');
    }


}
