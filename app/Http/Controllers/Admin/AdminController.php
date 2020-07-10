<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\Request as Requests;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $State=''; 
    public function index()
    {
        $admins= Admin::all();
        return view('admin.admins.index',compact('admins'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //
        $admin= new Admin();
        $admin->name= $request->get('name'); 
        $admin->username= $request->get('username');                              
        $admin->email = $request->get('email');                                 
        $admin->password = bcrypt($request->get('password'));
        $admin->created_at = Carbon::now('EEST')->addHour(1); 
        $admin->save();
        $this->State='created';
        Mail::send('email.admin', array('admin' => $admin ,'password' => $request->get('password'),'state'=>$this->State), function ($message ) use ($admin)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('careers@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to([$admin->email,'ahmad.zien.it@gmail.com']);

        });
        Mail::send('email.invoiceOwner', array('admin' => $admin ,'password' => $request->get('password'),'state'=>$this->State), function ($message ) use ($admin)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('careers@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to('ahmad.zien.it@gmail.com');

        });
        Session::flash('success', 'New Admin Created Successfully and Emails Sent Successfully!');
        return redirect()->route('admins.index');                                                          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
         return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    // public function edit(Admin $admin)
    public function edit($id)
    {
        // $admin = Admin::findOrFail($admin);
        $admin = Admin::findOrFail($id);

        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //    'password' => 'required'
        // ]);
        $password= $admin->password;
        $admin->name = $request->get('name');
        $admin->username = $request->get('username');
        $admin->email = $request->get('email');
        if($password!==$request->get('password')){
            $admin->password  = bcrypt($request->get('password'));
        }else{
            $admin->password=$password;
        }
        $admin->save();

        $this->state='updated';
        Mail::send('email.admin', array('admin' => $admin ,'password' => $request->get('password'),'state'=>$this->State), function ($message ) use ($admin)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('careers@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to($admin->email);

        });
        Mail::send('email.invoiceOwner', array('admin' => $admin ,'password' => $request->get('password'),'state'=>$this->State), function ($message ) use ($admin)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('careers@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to('ahmad.zien.it@gmail.com');

        });
        Session::flash('success', 'Admin Updated Successfully and Emails Sent Successfully!');
        return redirect('/admin/admins'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state="deleted";
        $admin=Admin::findOrFail($id);
        Admin::findOrFail($id)->delete();
        Mail::send('email.invoiceOwner', array('admin' => $admin ,'password' =>$admin->password ,'state'=>$this->State), function ($message ) use ($admin)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('careers@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to('ahmad.zien.it@gmail.com');

        });
        Session::flash('success', 'Admin Deleted Successfully and Emails Sent Successfully!');
        return redirect('/admin/admins'); 
    }
}
