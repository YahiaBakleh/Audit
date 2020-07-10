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
        // dd($request);
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
            $question->width=$request->get('Width');
            $question->height=$request->get('height');
            $path  = $request->file("question_upload")->store('images', 'public');
            $question->image_path = $path;
            $question->save();
        }
            
        if($request->has('is_paraghraph'))
        {
            $question->is_paraghraph = 1 ;
            $question->save();
        }        
        if($request->has('answer_attachment'))
        {
            $question->answer_attachment = 1;
            $question->save();
        }else{
            $question->answer_attachment = 0 ;
            $question->save();
        }
        $valiedChoicel = !empty($request->get('choice1')) && $request->get('choice1')!=null;
        $valiedChoice2 = !empty($request->get('choice2')) && $request->get('choice2')!=null;
        $valiedChoice3 = !empty($request->get('choice3')) && $request->get('choice3')!=null;
        $valiedChoice4 = !empty($request->get('choice4')) && $request->get('choice4')!=null;
        // else {
        // if ($valiedChoicel && $valiedChoice2) 
        // {
            //Add Choices
            //choice1
                //Add Choices1
                if($valiedChoicel)
                {  
                    $choice1 = new Choice();
                    $choice1->question_id = $question->id;
                    $choice1->title = $request->get('choice1');
                    if($request->hasfile('file_1'))
                    {
                        $choice1->width=$request->get('Width1');
                        $choice1->height=$request->get('height1');
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
                        $choice2->width=$request->get('Width2');
                        $choice2->height=$request->get('height2');
                        $path  = $request->file("file_2")->store('images', 'public');
                        $choice2->image_path = $path;
                    }
                    if ($request->get('choice2_correct')) {
                        $choice2->is_correct = 1;
                    }
                    $choice2->save(); 
                }
        // }
            // Add Choices3
                if($valiedChoice3)
                {
                    $choice3 = new Choice();
                    $choice3->question_id = $question->id;
                    $choice3->title = $request->get('choice3');
                    if($request->hasfile('file_3'))
                    {
                        $choice3->width=$request->get('Width3');
                        $choice3->height=$request->get('height3');
                        $path  = $request->file("file_3")->store('images', 'public');
                        $choice3->image_path = $path;
                    }
                    if ($request->get('choice3_correct')) {
                        $choice3->is_correct = 1;
                    }
                    $choice3->save(); 
                }
            //Add Choices4
                if($valiedChoice4)
                {
                    $choice4 = new Choice();
                    $choice4->question_id = $question->id;
                    $choice4->title = $request->get('choice4');
                    if($request->hasfile('file_4'))
                    {
                        $choice4->width=$request->get('Width4');
                        $choice4->height=$request->get('height4');
                        $path  = $request->file("file_4")->store('images', 'public');
                        $choice3->image_path = $path;
                    }
                    if ($request->get('choice4_correct')) {
                        $choice4->is_correct = 1;
                    }
                    $choice4->save(); 
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
        $question->score = $request->get('score');
         if($request->hasfile('file')) {
            $question->width=$request->get('Width');
            $question->height=$request->get('height');
            $path  = $request->file("file")->store('images', 'public');
            $question->image_path = $path;
         }else{
            $question->width=null;
            $question->height=null;
            $question->image_path = null;
         }
        if($request->has('answer_attachment'))
        {
            $question->answer_attachment = 1;
            $question->save();
        }else{
            $question->answer_attachment = 0 ;
            $question->save();
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
