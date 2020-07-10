<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Session;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view('admin.test.index' , compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' =>'required' , 
            'time'=>'required' ,
             'description'=>'required',
            'instructions'=>'required'
            ]);

        $test  =new Test();
        $test->name = $request->get('name');
        $test->time = $request->get('time');
        $test->description =$request->get('description');
        $test->instructions = $request->get('instructions');
        $test->save();

        return redirect()->route('tests.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
       return view('admin.test.show' , compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {

      return view ('admin.test.edit' , compact('test' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
      
      $test->update($request->all());
      return redirect()->route('tests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
         $test->delete();
         Session::flash('success', 'Test Successfully deleted!');
        return redirect()->route('tests.index');
    }
}
