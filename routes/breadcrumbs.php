<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $home = __("nav.home");
    $breadcrumbs->push($home, route('website'));
});

// Home > About
Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $about = __("nav.about");
    $breadcrumbs->push($about, route('about'));
});

// Home > Terms
Breadcrumbs::register('terms', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Terms & Conditions ', route('terms'));
});


// Home > Training Courses
Breadcrumbs::register('courses', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $cousrses = __("nav.training_courses");
    $breadcrumbs->push( $cousrses, route('training_courses'));
});

// Home > Training Courses -> course
Breadcrumbs::register('course', function ($breadcrumbs , $course) {
    $breadcrumbs->parent('home');
    $cousrses = __("nav.training_courses");
    $breadcrumbs->push($cousrses, route('training_courses'));
    if(app()->getLocale() =='ar')
    $breadcrumbs->push(strip_tags($course->ar_title), route('courseDesc' , $course));
    else
    $breadcrumbs->push(strip_tags($course->title), route('courseDesc' , $course));

});



// Home > Articles
Breadcrumbs::register('articles', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News');
    $breadcrumbs->push('Articles' , route('articles'));
});

// Home > News -> Articles -> {Articles}
Breadcrumbs::register('article', function ($breadcrumbs , $article) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News');
    $breadcrumbs->push('Articles' , route('articles'));
    $breadcrumbs->push(strip_tags($article->title), route('article' , $article));
});


// Home > Press Realse
Breadcrumbs::register('press_', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News');
    $breadcrumbs->push('Press Release' , route('press_releases'));
});

// Home > News -> Articles -> {Articles}
Breadcrumbs::register('press', function ($breadcrumbs , $press_release) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('News');
    $breadcrumbs->push('Press Release' , route('press_releases'));
    $breadcrumbs->push(strip_tags($press_release->title), route('article' , $press_release));
});



// Home > Services -> Service
Breadcrumbs::register('services', function ($breadcrumbs , $section , $parent) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('services');
    $breadcrumbs->push(strip_tags($parent->title));
    $breadcrumbs->push(strip_tags($section->title), route('service.show' , ['section'=>$parent , 'sub'=>$section]));
});


// Home > Services -> Service
Breadcrumbs::register('our_services', function ($breadcrumbs ) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__("nav.services"));
});



// Home > careers
Breadcrumbs::register('our_careers', function ($breadcrumbs ) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__("nav.vacancy"));
});


// Home > careers -> career
//{{route('career.show',['section' =>$career])}}
Breadcrumbs::register('careers', function ($breadcrumbs , $section) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push(__("nav.vacancy"), route('our_careers'));
    if(app()->getLocale() =='ar')
    $breadcrumbs->push(strip_tags($section->ar_title), route('career.show' , ['section'=>$section]));
else
    $breadcrumbs->push(strip_tags($section->title), route('career.show' , ['section'=>$section]));
});