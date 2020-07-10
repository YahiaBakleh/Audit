<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Test;
use App\Models\Request as Requests;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show_result(Request $request)
    {

        $user = User::find($request->get('user_id'));
        $test = $user->doneTests()->where('test_id' , $request->get('test_id'))->first();


        $questions = $test->questions()->paginate(5);



        return view ('admin.users.show_result' , compact('user' , 'questions' ));

    }

    public function export_pdf()
    {
        // Fetch all customers from database
        $user = User::find(1);
        $test = $user->doneTests()->where('test_id',1)->first();
        $questions = $test->questions;
        $data = array('user' => $user , 'questions'=> $questions );
        //return $data;

        //return view ('admin.users.print' , compact('user' , 'questions' ));

        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('admin.users.print',  $data);


        // If you want to store the generated pdf to the server then you can use the store function
        return $pdf->download('customers.pdf');

        return redirect('/');
        // Finally, you can download the file using download function
        return $pdf->download('customers.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tests = Test::all();
        $name = '';
        $email = '';
        if($request->has('request_job'))
        {
            $job = Requests::find($request_job=$request->request_job);
            $job->approved =1;
            $job->save();
            $name = $job->first_name.' '.$job->father_name.' '.$job->family_name;
            $email = $job->email;
            
        }
        return view('admin.users.create', compact('tests' ,'name' , 'email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->created_at = Carbon::now('EEST')->addHour(1);
        $user->save();
        $tests = $request->get('tests');
        $testCount = 0;
        $testName = '';
        if ($request->has('tests')) {
            $user->tests()->attach($tests);
            $testCount = count($tests);
            foreach($tests as $t)
            {
                $testName=$testName .' '.Test::find($t)->name.' ';
            }
        }

        Mail::send('email.index', array('user' => $user ,'password' => $request->get('password'), 'testCount' => $testCount, 'testName' => $testName), function ($message ) use ($user)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('careers@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to($user->email);

        });
        Session::flash('success', 'User Created Successfully and Email Sent Successfully!');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $tests = Test::all();

        return view('admin.users.edit', compact('user', 'tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
           'password' => 'required'
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password  = bcrypt($request->get('password'));
        $user->save();

        /*$user->update($request->except('password'));
        if (isset($request->password)) {
            $user->password = Hash::make($request->get('password'));
            $user->save();
        }*/


        $user->tests()->syncWithoutDetaching($request->tests);

        Mail::send('email.next_stage', array('user' => $user ,'password' => $request->get('password')), function ($message ) use ($user)
        {
            $message->subject('BASSEL SALEH & CO ');

            $message->from('tests@basselsalehco.com','BASSEL SALEH & CO ');

            $message->to($user->email);

        });
        Session::flash('success', 'User Updated Successfully and Email Sent Successfully!');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy( $id)
    {
        $user = User::find($id)->tests()->detach();
        User::find($id)->delete();
        return redirect()->route('users.index');
    }

    public function approve(User $user)
    {

        Mail::send('email.index', array('user' => $user ,'password' => Crypt::decrypt($user->password)), function ($message ) use ($user)
        {
            $username = 'BasselSaleh@gmail.com';

            $message->from('Asma.Hawari.AH@gmail.com', 'Asma Hawari');

            $message->to($user->email);

        });
        Session::flash('success', 'Email Sent Succesfully!');
        return redirect()->route('users.index');

    }

}
