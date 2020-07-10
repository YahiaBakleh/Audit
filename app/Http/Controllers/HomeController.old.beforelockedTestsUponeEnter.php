<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('agreement', [
            'except' => [
                'agreementForm',
                'agreementPost'
            ]
        ]);
    }

    public function agreementForm()
    {
        return view('agreement');
    }

    public function agreementPost()
    {
        auth()->user()->agreement_accepted = 1;
        auth()->user()->save();
        return redirect(route('home'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showStart(Test $test)
    {
        if (is_null(auth()->user()->doneTests()->find($test->id))) {
            return view('start_page', compact('test'));
        }
         return redirect(route('home'))->with('status', 'are you lost ?!');
    }

    public function showTest(Test $test)//update 
    {
        // $style to fix multi choice answer style on view depend on if answer had image or not  
        // should remove it and depend on css only with condition php 
        // $style = ['displayBlock'=>'block','displayFlex'=>'flex','width1200'=>'1200px','width200'=>'200px'];
        if (is_null(auth()->user()->doneTests()->find($test->id))) {
            return view('Test_Example', compact('test'));
        }

        return redirect(route('home'))->with('status', 'are you lost ?!');
    }

    public function gradeTest(Request $request)
    {
        $test = Test::find($request->test_id);
        $mark = 0;
        foreach (array_keys($request->except('_token', 'test_id')) as $question_id) {
            $question = Question::find($question_id);
            if ($question->is_paraghraph) {
                DB::table('answer__tests')->insert([
                    'user_id' => auth()->id(),
                    'question_id' => $question->id,
                    'paragraph' => $request->get($question_id)
                ]);
            } else {
                DB::table('answer__tests')->insert([
                    'user_id' => auth()->id(),
                    'question_id' => $question->id,
                    'choice_id' => $request->get($question_id)
                ]);
                $ch = Choice::find($request->get($question_id));
                if (Choice::find($request->get($question_id))->is_correct) {
                    $mark += $ch->question->score;
                }
            }
        }
        $testTotalMark = $test->questions()->whereNull('is_paraghraph')->sum('score');
        if ($testTotalMark != 0) {
            $percentageMark = $mark * 100 / $testTotalMark;
        } else {
            $percentageMark = 0;
        }
        auth()->user()->toDoTests()->find($test->id)->pivot->update(['result' => $percentageMark]);


        Mail::send('email.test_completed', ['user' => auth()->user()], function ($m) {
            $m->from('careers@basselsalehco.com', 'BASSEL SALEH & CO');

            $m->to('info@basselsalehco.com', 'Bassel Saleh')->subject('New test Has been completed from'.auth()->user()->name.'  !');
        });

        return redirect(route('home'))->with('status', 'Thanks, we will contact with you soon ');
        //return redirect(route('home'))->with('status','Thanks, you got ' . number_format((float)$percentageMark, 2, '.', '') . '% without paragraphs!');
    }

    public function test(Request $request)
    {
        return response()->json('Done !');
    }
}
