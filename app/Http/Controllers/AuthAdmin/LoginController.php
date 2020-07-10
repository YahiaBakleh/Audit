<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function showReset()
    {
        return view('admin.auth.resetPassword');
    }

    public function reset(Request $request){
        dd($request);
        $user = Admin::find('1');
        $user->password  = bcrypt($request->get('password'));
        $user->save();
        return redirect('/');
    }
    

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/admin');
    }
}
