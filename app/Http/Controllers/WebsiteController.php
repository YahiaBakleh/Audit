<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Section;
use App\Models\Request as Request_;
use App\Models\Messages;
use App\Models\Participant;
use Carbon\Carbon;
use Validator;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ads = Section::where('is_ad' ,1)->get();

       $courses = Section::where('type' ,4)->where('parent_id' ,null)->get();
       $slides = Section::where('type' ,7)->get();

        return view ('main.index',compact('courses', 'slides'  , 'ads'));
    }

    public function our_services(){
        $services = Section::where('type' ,1)->where('parent_id' ,null)->orderBy('created_at', 'desc')->get();

        return view ('main.our_services',compact('services' ));
    }

    public function our_careers(){

        $careers = Section::where('type' ,3)->where('parent_id' ,null)->get();

        return view ('main.our_careers',compact('careers' ));

    }

    public function our_team(){


        $team_memebers = Section::where('type' , 6)->where('parent_id' , null)->orderBy('created_at' , 'asc')->get();

        return view ('main.our_Team' , compact('team_memebers'));
    }


    public function team_memeber($id){


        $memeber = Section::findOrFail($id);
        return view ('main.TeamMemeber' , compact('memeber'));
    }

    public function about()
    {
        $services = Section::where('type' ,1)->where('parent_id' ,null)->get();
        $team = Section::where('type' ,6)->where('parent_id' ,null)->get();
        return view ('main.about',compact('services', 'team') );
    }

    public function contact()
    {
        $services = Section::where('type' ,1)->where('parent_id' ,null)->get();
        return view ('main.contact',compact('services' ));
    }

    public function training_courses()
    {
        $courses = Section::where('type' ,4)->where('parent_id' ,null)->get();
        return view ('main.courses',compact('courses' ));
    }

    public function courseDesc(Section $course)
    {

        $instructors = \DB::table('teacher')->where('course_id', $course->id)->get();


        return view ('main.courseDesc',compact('course'  , 'instructors'));

    }

    public function register_course(Request $request)
    {
        $rules =
            [
                'first_name' => 'required',
                'last_name' => 'required',
                 'email' =>'required|unique:participants',
                'phone_number' =>'required',
                'under' => 'file|max:10240|mimes:pdf,docx',
                'post' => 'file|max:10240|mimes:pdf,docx',
                'pro' => 'file|max:10240|mimes:pdf,docx',
            ] ;


        $niceNames = array (
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'under' => 'Undergraduate Certificate',
            'post' => 'Postgraduate Certificate',
            'pro' => 'Professional International Certificate',
        );


        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($niceNames);
        $validator->validate();


        $participant = new Participant();
        $participant->course_id = $request->course_id;
        $participant->first_name = $request->first_name;
        $participant->last_name = $request->last_name;
        $participant->email = $request->email;
        $participant->phone_number = $request->phone_number;
        if($request->hasfile('under'))
        $participant->undergraduate = $request->file('under')->store('under', 'public');
        if($request->hasfile('post'))
        $participant->postgraduate = $request->file('post')->store('post', 'public');
        if($request->hasfile('pro'))
        $participant->professional = $request->file('pro')->store('pro', 'public');
        $participant->work = $request->work_ex;
        $participant->save();
        return back()->with('success' , 'You registered Successfully !');
    }

    public function Messages_Mail(Request $request)
    {
        $message = new Messages();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone_number =$request->phone ;
        $message->message =$request->message;
        $message->save();

        Mail::send('email.message', ['letter' => $message], function ($m) {
            $m->from('careers@basselsalehco.com', 'BASSEL SALEH & CO');

            $m->to('info@basselsalehco.com', 'Bassel Saleh')->subject('New Message !');
        });

        return back()->with('success', 'Thanks for your Time !');
    }

    public function show_career(Section $section)
    {

        $sub_section = Section::where('parent_id' , $section->id)
            ->where('type' , 3)
            ->orderBy(\DB::raw('RAND()'))->get();
         $careers = Section::where('type' ,3)->where('parent_id' , null)->get();
        return view ('main.career' , compact('section' , 'sub_section' , 'careers'));
    }

    public function show_service(Section $section , Section $sub)
    {

        $parent_id = $section->parent_id;
        $parent = $section;
        $services = $section->sub_section;
        return view ('main.service' , compact('sub'  , 'services' ,'parent'));

    }

    public function press_releases(){
        $press_releases = Section::where('type' ,2)->where('parent_id' , null)->get();
        return view ('main.press_release' ,compact('press_releases'));
    }

    public function show_press_release(Section $press_release){



        return view ('main.press_release_Desc' ,compact('press_release'));
    }

    public function articles(){
        $articles = Section::where('type' ,5)->where('parent_id' , null)->get();


        return view ('main.articles' ,compact('articles'));
    }

    public function show_article(Section $article){

        return view ('main.articleDesc' , compact('article'));
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
    public function apply(Request $request)
    {
        $flag = false;
        $request->validate(['cv' => 'required|file|max:10240|mimes:pdf,docx',
            'gender' => 'required',
            'marital_status' => 'required',
            'military_service' => 'required'

        ]);


        $request_job = Request_::where('career_id',$request->career_id)
            ->where('first_name', $request->first_name)
            ->where('family_name', $request->family_name)
            ->Orwhere(function($q) use ($request){
                $q->where('career_id',$request->career_id)
                    ->where('email', $request->email);
            })
            ->first();



 if ($request_job) {
     $flag = true;

     $date_sent = Carbon::parse($request_job->created_at)->addMonths(3);
     $today = Carbon::now('EEST');
 }


        if ($flag && is_null($request_job->approved) && $today < $date_sent )
        {
            return back()->with('error', 'you submit your application before that! Please re apply after 3 months');

        }
        else {
            $job = Section::where('id', $request->career_id)->first();
            $request_job = new Request_();
            $request_job->career_id = $request->career_id;
            $request_job->first_name = $request->first_name;
            $request_job->father_name = $request->father_name;
            $request_job->family_name = $request->family_name;
            $request_job->birth_date = $request->date;
            $request_job->gender = $request->gender;
            $request_job->email = $request->email;
            $request_job->marital_status = $request->get('marital_status');
            $request_job->military_service = $request->get('military_service');
            $request_job->country = $request->country;
            $request_job->street_address = $request->street_address;
            $request_job->phone_home = $request->number_home;
            $request_job->phone_mobile = $request->number_mobile;

            $path = $request->file('cv')->store('CV', 'public');
            $request_job->cv_path = $path;
            $request_job->save();


            Mail::send('email.welcome', ['user' => $request_job], function ($m) use ($request) {
                $m->subject('BASSEL SALEH & CO ');
                $m->from('careers@basselsalehco.com', 'BASSEL SALEH & CO');

                $m->to($request->email, $request->first_name)->subject('Welcome !');
            });

            Mail::send('email.admin_mail_notification', array('request' => $request_job), function ($message)
            use ($request_job, $job) {
                $message->subject('Apply for a Job With code ' . $job->career_code);

                $message->from('careers@basselsalehco.com', 'BASSEL SALEH & CO ');

                $message->to('info@basselsalehco.com');

            });
            return back()->with('success', 'you submit your application successfully , we sent you an email please check your inbox and we will contact with you soon!');
        }
    }


    public function terms(){
        return view('main.terms');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
