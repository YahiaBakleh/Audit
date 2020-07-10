<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $title = '';

        $sections = Section::where('type', $request->get('type'))->where('parent_id', null)->get();
        switch ($type) {
            case 1:
                $title = 'service';
                break;
            case 2:
                $title = 'press release';
                break;
            case 3:
                $title = 'vacancy';
                break;
            case 4:
                $title = 'courses';
                break;

            case 5:
                $title = 'article';
                break;

            case 6:
                $title = 'team member';
                break;

            case 7:
                $title = 'Slides';
                break;
        }

        return view('admin.section.index', compact('sections', 'title', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->get('type');
        $title = $request->get('title');
        return view('admin.section.create', compact('type', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(['title' => 'required']);
        $section = new Section();
        if($request->has('ar_title'))
        {
            $section->ar_title = $request->get('ar_title');
        }
        else
        {
        $section->ar_title = " " ;
        }

        if($request->has('ar_description'))
        {
            $section->ar_description = $request->get('ar_description');
        }
        else{
        $section->ar_description = " ";
        }

        $section->title = $request->get('title');
        $section->description = $request->get('description');
        $section->type = $request->get('type');
        if ($request->hasfile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $section->image_path = $path;
        }

        if ($request->has('parent')) {
            $section->parent_id = $request->get('parent');
        }

        if ($request->has('code')) {
            $section->career_code = $request->code;
        }

        if ($request->has('start_date')) {
            $section->start_date = $request->start_date;
        }

        if ($request->has('email')) {
            $section->email = $request->email;
        }

        if($request->has('ads'))
        {
            $section->is_ad = 1;
        }
        $section->name = strip_tags($request->title);
        $section->save();
        return redirect()->route('sections.index', ['type' => $request->type]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $instructor = null;
        $sub = Section::where('parent_id', $section->id)->get();
        if ($section->type == 4) {
            $instructor = \DB::table('teacher')->where('course_id', $section->id)->get();
        }
        return view('admin.section.show', compact(
            'section',
            'sub',
            'instructor'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $types = ['service', 'vacancy', 'news'];
        return view('admin.section.edit', compact('section', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $section->title = $request->get('title');
        $section->description = $request->get('description');
        if($request->has('ar_title'))
        {
            $section->ar_title = $request->get('ar_title');
        }
        else{
         $section->ar_title = " " ;
        }
        if($request->has('ar_description'))
        {
            $section->ar_description = $request->get('ar_description');
        }

        else{
         $section->ar_description = " " ;
        }
//        $section->type = $request->get('type');
        if ($request->hasfile('image')) {
            $path = $request->file("image")->store('images', 'public');
            $section->image_path = $path;
        }

        if ($request->has('code')) {
            $section->career_code = $request->code;
        }
        if ($request->has('start_date')) {
            $section->start_date = $request->start_date;
        }

        if ($request->has('email')) {
            $section->email = $request->email;
        }

        if($request->has('ads'))
        {
            $section->is_ad = 1;
        }
        else
        {
            $section->is_ad = NULL;
        }
        $section->name= strip_tags($request->title);
        $section->save();
        $type = $request->type;

        return redirect()->route('sections.index', ['type' => $section->type]);
    }

    public function Participants(Section $section)
    {
        $Participants = \DB::table('participants')->where('course_id', $section->id)->get();

        return view('admin.section.participants', compact('Participants'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $type = $section->type;
        $section->delete();
        return redirect()->route('sections.index', ['type' => $type]);
    }
}
