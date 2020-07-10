<?php
use App\Models\Section;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//language
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);


//use App\Models\Test;
// Website Area
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'WebsiteController@index')->name('website');
    Route::get('/about', 'WebsiteController@about')->name('about');
    Route::get('/contact', 'WebsiteController@contact')->name('contact');
    Route::get('training_courses', 'WebsiteController@training_courses')->name('training_courses');
    Route::get('/press_release', 'WebsiteController@press_releases')->name('press_releases');
    Route::get('/articles', 'WebsiteController@articles')->name('articles');
    Route::get('/press_release/{press_release}', 'WebsiteController@show_press_release')->name('press_release');
    Route::get('/articles/{article}', 'WebsiteController@show_article')->name('article');
    Route::get('/course/{course}', 'WebsiteController@courseDesc')->name('courseDesc');
    Route::post('/register_course', 'WebsiteController@register_course')->name('register_course');
    Route::get('/terms', 'WebsiteController@terms')->name('terms');
    Route::get('/our_services' , 'WebsiteController@our_services')->name('our_services');
    Route::get('/our_careers' , 'WebsiteController@our_careers')->name('our_careers');
    Route::get('/our_team','WebsiteController@our_team')->name('our_team');
    Route::get('/teamMember/{id}','WebsiteController@team_memeber');



    Route::get('/career', function () {
        return view('website.career');
    })->name('career');

    Route::get('/careers/{section}', 'WebsiteController@show_career')->name('career.show');

    Route::get('/services/{section}/{sub}', 'WebsiteController@show_service')->name('service.show');


Route::post('/apply' , 'WebsiteController@apply')->name('apply');
Route::get('/testtime',function(){
    $n= Carbon::now('EEST');
    $t = Carbon::parse($n)->addDays(2)->addHour(1);
});

Route::post('/message' , 'WebsiteController@Messages_Mail')->name('message');

Route::get('/home/asma/Desktop/free/Test/audit_5.5', function(){
    Artisan::call('migrate:fresh');
});

// User area

// Agreement
Route::get('agreement', 'HomeController@agreementForm')->name('agreement');
Route::post('agreement', 'HomeController@agreementPost');
});

Auth::routes(['register' => false]);

// user accepts agreement
Route::group(['middleware' => ['agreement' , 'web']], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/tests/{test}', 'HomeController@showTest');
    Route::get('home/tests/start/{test}', 'HomeController@showStart');
    Route::post('home/tests', 'HomeController@gradeTest');
    Route::post('timer_post' , 'HomeController@test');
//    Route::get('/timer2',function(){
//        $test = Test::first();
//        return view('Test_Example' ,compact('test'));
//    });
});

// Admin Auth Area
Route::get('/adminLogin', 'AuthAdmin\LoginController@showLoginForm');
Route::post('/adminLogin', 'AuthAdmin\LoginController@login');
Route::get('/adminLogout', 'AuthAdmin\LoginController@logout')->name('adminLogout');
Route::post('/resetPassword' , 'AuthAdmin\LoginController@reset');

Route::get('/view', function () {
    return view('admin.test.test_view');
});

Route::get('/home2', function(){
   return view('home-3');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test' , function()
{
    $user = auth()->user();
    return redirect('users.show' , ['user' => $user]);
});

