@extends('admin.layouts.app')
@section('title')
    Section
@endsection

@section('style')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,900,700,600,500,300,200,100,800);

        h2 {
            color: #4C4C4C;
            word-spacing: 5px;
            font-size: 30px;
            font-weight: 700;
            margin-bottom:30px;
            font-family: 'Raleway', sans-serif;
        }

        .ion-minus{
            padding:0px 10px;
        }

        .team{
            background-color:#f6f6f6;
            padding:60px 0px;
            font-family: 'Raleway', sans-serif;
        }

        .team h4 {
            margin-top: 20px;
            color: #5db4c0;
        }

        .team .fa{
            color: #5db4c0;
            font-size: 18px;
            margin-top: 10px;
            padding: 3px;
        }
        img {
            max-width: 100%;
            height: auto;
        }

        .item {
            width: 300px;
            height: 300px;
            height: auto;
            float: left;
            margin: 3px;
            padding: 3px;
        }
    </style>
    @endsection

@section('content')
    <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('sections.create')}}?type={{$type}}&title={{$title}}">
                <div class="btn btn-primary">New {{$title}}</div>
            </a>
        </div>
    </div>
    <br>
    @if( (count($sections)) !=0 )

                    @if($type == 6)
                        <div class="team">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-lg-6 col-lg-offset-3 text-center">
                                        <h2><span class="ion-minus"></span>Our Team<span class="ion-minus"></span></h2>
                                       <br>
                                    </div>
                                </div>

                                <div class="row text-center">

                                    @foreach ($sections as $section)

                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="item">

                                        <img class="img-rounded" alt="team-photo" src="{{ asset('storage/' . $section->image_path) }}" width="300px ; height="300px;>
                                        </div>
                                        <div class="team-member">

                                            <h4> {!! $section->title !!}</h4>

                                            <p>{!! $section->description !!}</p>

                                        </div>

                                        <p class="social">
                                            <a href="{{$section->email}}"><span class="">{{$section->email}}</span></a>
                                        </p>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <form id="submiter{{$section->id}}" class="liner hidden-item"
                                                      action="{{ route('sections.destroy',['section'=> $section]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                    <div class="btn btn-danger" onclick="triggerDeleteAlert({{$section->id}})">Delete member</div>
                                                </form>
                                            </div>


                                            <div class="col-sm-4">
                                                <a class="no-style-a" href="{{route('sections.edit' ,['section' => $section])}}">
                                                    <div class="btn btn-warning">Update memeber</div>
                                                </a>
                                            </div>
                                        </div>

                                    </div> <!--col-lg-4 -->
                                        @endforeach

                                </div>  <!-- row text-center -->

                            </div>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($sections as $section)

                            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>
                            <a href="{{route('sections.show',['section' =>$section])}}"><h2
                                        class="panel-title">{!! $section->title !!}</h2></a>
                        </header>
                        <div class="panel-body">



                            @if($section->description)

                            <h4><b>Description :</b></h4>


                            <p class="text-muted">{!! $section->description !!}</p>

                            @endif

                            <div class="row">
                                <div class="col-md-2">
                                    <form id="submiter{{$section->id}}" class="liner hidden-item"
                                          action="{{ route('sections.destroy',['section'=> $section]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                        <div class="btn btn-danger" onclick="triggerDeleteAlert({{$section->id}})">Delete Section</div>
                                    </form>
                                </div>


                                <div class="col-md-2">
                                    <a class="no-style-a" href="{{route('sections.edit' ,['section' => $section])}}">
                                        <div class="btn btn-warning">Update Section</div>
                                    </a>
                                </div>


                                @if($section->type == 4)

                                    <div class="col-md-4">
                                        <a class="no-style-a" href="{{route('course.Participants' ,['section' => $section])}}">
                                            <div class="btn btn-success">Show Participants </div>
                                        </a>
                                    </div>

                                @endif



                            </div>
                        </div>

                    </section>
                </div>


            @endforeach
        </div>
                    @endif

    @else
        <div class="col-md-12 col-xl-12">
            <section class="panel">
                <div class="panel-body bg-secondary">
                    <div class="widget-summary">

                        <div class="widget-summary-col">

                                @switch($type)
                                    @case(1)

                                <strong class="text-center"> No services yet</strong>

                                    @break

                                    @case(2)

                                <strong class="text-center"> No Press Releases yet</strong>

                                    @break
                                @case(3)

                                <strong class="text-center"> No Vacancies yet</strong>

                                @break

                            @case(4)
                                <strong class="text-center"> No Training Courses yet</strong>
                            @break

                                @case(5)
                                <strong class="text-center"> No Articles yet</strong>
                                @break
                                @case(6)
                                <strong class="text-center"> No Team Members  yet</strong>
                                @break

                                    @default

                                    <span>No Sections Yet </span>

                                @endswitch

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection