<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Section;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
    }
    public function create(Request $request)
    {
        $course_id = $request->get('course_id');
        return view('admin.teachers.create' , compact('course_id'));
    }

    public function store(Request $request)
    {
        $request->validate(['title'=>'required' , 'image'=>'required' , 'description' =>'required']);
        $email = null;
        $image_path = null;
        $ar_title = null;
        $ar_description=null;
        if ($request->has('email'))
        {
            $email = $request->email;
        }
        if($request->hasfile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image_path = $path;
        }
            if($request->has('ar_title'))
                {
                    $ar_title= $request->get('ar_title');
                }
                else{
                $ar_title= " " ;
                }
                if($request->has('ar_description'))
                {
                      $ar_description = $request->get('ar_description');
                }

                else {

                $ar_description =  " ";
                }

        $teacher = \DB::table('teacher')->insert(
            [
                'course_id' => $request->get('course_id'),
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'email' => $email,
                'image' => $image_path,
                'ar_title'=>  $ar_title,
                'ar_description'=>  $ar_description
            ]
        );

        return redirect()->route('sections.index',['type'=>4]);
    }


    public function edit($id)
    {
        $instructor = \DB::table('teacher')->find($id);
        return view('admin.teachers.edit' , compact('instructor'));
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
        $instructor = \DB::table('teacher')->find($id);

        $email = null;
        $image_path = null;
          $ar_title = null;
                $ar_description=null;
        if ($request->has('email'))
        {
            $email = $request->email;
        }
        if($request->hasfile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image_path = $path;
        }
    if($request->has('ar_title'))
                    {
                        $ar_title= $request->get('ar_title');
                    }
                    else{
                    $ar_title= " " ;
                    }
                    if($request->has('ar_description'))
                    {
                          $ar_description = $request->get('ar_description');
                    }

                    else {

                    $ar_description =  " ";
                    }


        \DB::table('teacher')->where('id',$id)->update(array(
            'course_id' => $request->get('course_id'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'email' => $email,
            'image' => $image_path,
               'ar_title'=>  $ar_title,
                            '  $ar_description'=>  $ar_description
        ));

        return redirect()->route('sections.index',['type'=>4]);
    }

    public function destroy($id)
    {
        \DB::table('teacher')->where('id',$id)->delete();

        return redirect()->route('sections.index',['type'=>4]);

    }

}
