@extends('admin.layouts.app')
@section('title')
    Request
@endsection

@section('content')
    <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('users.create')}}?request_job={{$request->id}}">
                <div class="btn btn-primary">Approve</div>
            </a>
        </div>
    </div>

<div class="row">
			<div class="col-md-12">
                            <section class="panel ">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>

                                    <h2 class="panel-title">{{$request->first_name}} {{$request->father_name}} {{$request->family_name}}</h2>
                                   
                                </header>
                                <div class="panel-body">

                                    <h4><b>Basic Information :</b></h4>
                                    <label><strong> First Name :  </strong> {{$request->first_name}}</label><br>
                                    <label><strong> Father Name :  </strong> {{$request->father_name}}</label><br>
                                    <label><strong> Family Name :  </strong> {{$request->family_name}}</label><br>
                                    <label><strong> Email Address :  </strong> {{$request->email}}</label><br>
                                    <label><strong> Gender :  </strong> {{$request->gender}}</label><br>
                                    <label><strong> Marital Status :  </strong> {{$request->marital_status}}</label><br>
                                    <label><strong> Military Service :  </strong> {{$request->military_service}}</label><br>
                                    <h4><b>Address :</b></h4>
                                    <label><strong> Country :  </strong> {{$request->country}}</label><br>
                                    <label><strong> Street Address :  </strong> {{$request->street_address}}</label><br>
                                    <h4><b>Phone Numbers :</b></h4>
                                    <label><strong> Home :  </strong> {{$request->phone_home}}</label><br>
                                    <label><strong> Mobile :  </strong> {{$request->phone_mobile}}</label><br><br>
                                    <label><strong>  CV  :  </strong><a href="{{ asset('storage/'.$request->cv_path) }}">Download CV</a></label><br>
                                    <div class="row">


                                    </div>
                                </div>
                            </section>
                    </div>
</div>
@endsection

