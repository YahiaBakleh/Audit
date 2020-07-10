@extends('admin.layouts.app')
@section('title')
    Section
@endsection

@section('content')

    <br>
    @if( (count($careers)) !=0)
        @foreach ($careers as $career)

            @foreach($career->sub_section as $sub)
                @if(count($sub->requests) > 0 )

        <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>
                            <a href=""><h2
                                        class="panel-title">{{strip_tags($sub->title)}}</h2></a>
                        </header>
                        <div class="panel-body">
                            <div class="container" style="width: inherit">



                            <h4><strong>Applicants for this job</strong></h4>
                            <div class="panel-group" id="accordionPrimary" >
                                @foreach($sub->requests as $request)



                                <div class="panel panel-accordion panel-accordion-primary" >
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionPrimary" href="#collapse{{$request->id}}" aria-expanded="false"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                        {{$request->first_name}} {{$request->father_name}} {{$request->family_name}}
                                                    </font></font></a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$request->id}}" class="accordion-body collapse" aria-expanded="false">
                                        <div class="panel-body">
                                           <a href="{{route('requests.show', ['request'=>$request])}}"> {{$request->first_name}} {{$request->father_name}} {{$request->family_name}}</a>
                                            <h4 ><b>Basic Information</b></h4><br>
                                            <label><strong> First Name :  </strong> {{$request->first_name}}</label><br>
                                            <label><strong> Father Name :  </strong> {{$request->father_name}}</label><br>
                                            <label><strong> Family Name :  </strong> {{$request->family_name}}</label><br>
                                            <label><strong> Email Address :  </strong> {{$request->email}}</label><br>
                                            <label><strong> Gender :  </strong> {{$request->gender}}</label><br>
                                            <label><strong> Marital Status :  </strong> {{$request->marital_status}}</label><br>
                                            <label><strong> Military Service :  </strong> {{$request->military_service}}</label><br>
                                            <h4 ><b>Address</b></h4><br>
                                            <label><strong> Country :  </strong> {{$request->country}}</label><br>
                                            <label><strong> Street Address :  </strong> {{$request->street_address}}</label><br>
                                            <h4 ><b>Phone Numbers</b></h4><br>
                                            <label><strong> Home :  </strong> {{$request->phone_home}}</label><br>
                                            <label><strong> Mobile :  </strong> {{$request->phone_mobile}}</label><br><br>
                                            <label><strong>  CV  :  </strong><a href="{{ asset('storage/'.$request->cv_path) }}">Download CV</a></label><br>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <form id="submiter{{$request->id}}" class="liner hidden-item"
                                                          action="{{ route('requests.destroy',['request'=> $request]) }}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}

                                                        <div class="btn btn-danger" onclick="triggerDeleteAlert({{$request->id}})">Delete Request</div>
                                                    </form>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        </div>

                    </section>
                </div>

        </div>
        @endif
        @endforeach
            @endforeach
    @else
        <div class="col-md-12 col-xl-12">
            <section class="panel">
                <div class="panel-body bg-secondary">
                    <div class="widget-summary">

                        <div class="widget-summary-col">
                                <strong class="text-center"> No Requests yet</strong>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
@endsection