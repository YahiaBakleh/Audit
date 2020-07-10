<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Test;
use App\Models\Choice;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    
      public function create_question(Test $test)
    {
        return view('admin.question.create', compact('test'));
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
            'title'=>'required',
            'score' =>'required|numeric'
        ]);
    
        $question = new Question();
        $question->title = $request->get('title') ;
        $question->group_id = $request->get('group_id');
        $question->score = $request->get('score');
        $question->save();

        if($request->hasfile('question_upload'))
        {
            $path  = $request->file("question_upload")->store('images', 'public');
            $question->image_path = $path;
            $question->save();
        }

        if($request->has('is_paraghraph'))
        {
            $question->is_paraghraph = 1 ;
            $question->save();
        }
        $valiedChoicel = !empty($request->get('choice1')) && $request->get('choice1')!=null;
        $valiedChoice2 = !empty($request->get('choice2')) && $request->get('choice2')!=null;
        // else {
        if ($valiedChoicel && $valiedChoice2) 
        {
            //Add Choices
            
                //Add Choices1
                if($valiedChoicel)
                {  
                    $choice1 = new Choice();
                    $choice1->question_id = $question->id;
                    $choice1->title = $request->get('choice1');
                    if($request->hasfile('file_1'))
                    {
                        $path  = $request->file("file_1")->store('images', 'public');
                        $choice1->image_path = $path;
                    }
                    if ($request->get('choice1_correct')) {
                        $choice1->is_correct = 1;
                    }
                    $choice1->save();
                }
            //Add Choices2
            if($valiedChoice2)
            {
                $choice2 = new Choice();
                $choice2->question_id = $question->id;
                $choice2->title = $request->get('choice2');
                if($request->hasfile('file_2'))
                {
                    $path  = $request->file("file_2")->store('images', 'public');
                    $choice2->image_path = $path;
                }
                if ($request->get('choice2_correct')) {
                    $choice2->is_correct = 1;
                }
                $choice2->save(); 
            }
        }

        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.question.edit' , compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

    }

    public function update_ajax(Request $request)
    {

        $question = Question::find($request->get('id'));
        $question->title = $request->get('title');
         if($request->hasfile('file')) {
             $path  = $request->file("file")->store('images', 'public');
             $question->image_path = $path;
         }

         $question->save();

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
        $question = Question::find($id);
        if ($question->is_paraghraph != null)
        {
            $question->delete();
        }
        else 
        {
            $question->choices()->delete();
            $question->delete();
        }

        return response()->json($id);

    }
}
