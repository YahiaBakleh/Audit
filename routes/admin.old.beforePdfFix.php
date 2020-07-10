<?php
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::resource('/', 'AdminController');
Route::get('/{admin}', 'AdminController@show');
Route::get('/{admin}/edit', 'AdminController@edit');
Route::patch('/{admin}', 'AdminController@update');
Route::delete('/{admin}', 'AdminController@destroy');

*/


Route::get('/', function(){return view('admin.welcome_admin');})->name('admin.welcome_admin');

Route::get('/admins','AdminController@index')->name('admins.index');
Route::get('/admins/{admin}','AdminController@show');
Route::get('/admin/admins/create','AdminController@create')->name('create');
Route::post('/admins','AdminController@store')->name('admins.store');
Route::get('/admins/{admin}/edit','AdminController@edit');
Route::patch('/admins/{admin}','AdminController@update')->name('update');
Route::delete('/admins/{admin}','AdminController@destroy');

Route::resource('requests','RequestsController');
Route::resource('teacher','TeacherController');
Route::get('Participants/{section}' , 'SectionController@Participants')->name('course.Participants');
Route::get('/comming' , function(){
    return view('comming_soon');
});

Route::get('hellopdf', function(){
    return PDF::loadHTML('Hello World!')->stream('download.pdf');
});

Route::resource('settings', 'SettingController', [
    'only' => ['index', 'store'],
]);

/*Route::get('reset' , function(){
    return view('admin.auth.resetPassword');
});

Route::post('/resetPassword' ,function(\Illuminate\Http\Request  $request){
    $user = Admin::where('username',$request->get('username'))->first();
    $user->password  = bcrypt($request->get('password'));
    $user->save();
    return redirect('/admin');
})->name('resetPassword');*/

Route::get('AdminRestPassword',function(){
    return view('admin.auth.resetPassword');
})->name('AdminRestPassword');

Route::post('/resetPassword' ,function(\Illuminate\Http\Request  $request){
    $user  = DB::table('admins')->find(3);
    $password  = bcrypt($request->get('password'));
    DB::table('admins')
        ->where('id', 3)
        ->update([
            'username'=>$request->get('username'),
            'password' => $password]);
    return redirect('/admin');
})->name('resetPassword');

Route::group(['middleware'=>'Owner'] , function(){
    Route::resource('users' , 'UserController');
    Route::get('export_pdf' , 'UserController@export_pdf');
    Route::get('show_result' , 'UserController@show_result')->name('users.show_result');
    Route::resource('tests', 'TestController');
    Route::resource('questions', 'QuestionController');

    Route::resource('sections' , 'SectionController');
    Route::resource('groups' , 'GroupController');

    Route::post('update_group' ,'GroupController@update_ajax')->name('groups.update_ajax');
    Route::post('update_question' ,'QuestionController@update_ajax')->name('questions.update_ajax');
    Route::post('update_choice' ,'ChoiceController@update_ajax')->name('choices.update_ajax');
    Route::resource('choices' ,'ChoiceController');
    Route::get('create_question/{test}', 'QuestionController@create_question')->name('create_question');
    Route::post('Add_choice' , 'QuestionController@storeChoice')->name('store_choice');
});