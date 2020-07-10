<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Choice;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'choice'=>'required'
        ]);
        $result='Blocked';
        $request->get('choice_correct')?$result='Passed':$result;
        
        if($request->get('choice_correct')){
            Choice::where('question_id',$request->get('question_id'))
                    ->where('is_correct', 1)
                    ->update(['is_correct' => 0]);
        }
        
        $choice = new Choice();
        $choice->question_id= $request->get('question_id');
        $choice->title =  $request->get('choice');
        $request->get('choice_correct')?$choice->is_correct=1 : $choice->is_correct= 0 ; 

        if($request->hasfile('file'))
        {
            $path  = $request->file("file")->store('images', 'public');
            $choice->image_path = $path;
        }
        $choice->save();


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update_ajax(Request $request)
    {
        $choice = Choice::find($request->get('id'));
        $choice->question_id = $request->get('question_id');
        $choice->title = $request->get('title');
        if($request->hasfile('file'))
        {
            $path  = $request->file("file")->store('images', 'public');
            $choice->image_path = $path;
        }
        if($request->has('choice_correct'))
        {
            $choice->is_correct = 1;
        }
        else {
            $choice->is_correct = null;
        }
        $choice->save();
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $choice = Choice::find($id);
        $choice->delete();
        return  response()->json($id);
    }
}
