@extends('admin.layouts.app')
@section('title')
    Participants -
@endsection

@section('content')

    @if(count($Participants) == 0 )
        <div class="col-md-12 col-xl-12">
            <section class="panel">
                <div class="panel-body bg-secondary">
                    <div class="widget-summary">

                        <div class="widget-summary-col">

                            <strong class="text-center"> No Participans for This course   yet</strong>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @else

    <div class="container">

        @foreach($Participants as $participant)
            <div class="row">

        <div class="col-md-10">

    <section class="panel">
        <header class="panel-heading bg-primary">
            <div class="panel-heading-profile-picture">

            </div>
        </header>
        <div class="panel-body">
            <h4 class="text-semibold mt-sm">{{$participant->first_name}} {{$participant->last_name}}</h4>
            <h5><b>Email : </b>{{$participant->email}}</h5>
            <h5><b>Phone Number : </b>{{$participant->phone_number}}</h5>
            <p><b>Work Experience : </b>{{$participant->work ? : 'No Work Experience '}} </p>
            <hr class="solid short">
            @if($participant->undergraduate)

                <p><a href="{{ asset('storage/'.$participant->undergraduate) }}"><i class="fa fa-university mr-xs"></i>Undergraduate Certificate</a></p>
                @endif
                @if($participant->postgraduate)
            <p><a href="{{ asset('storage/'.$participant->postgraduate) }}"><i class="fa fa-graduation-cap mr-xs"></i> Postgraduate Certificate</a></p>
                @endif
                    @if($participant->professional)
            <p><a href="{{ asset('storage/'.$participant->professional) }}"><i class="fa fa-bank mr-xs"></i> Professional International Certificate</a></p>
                 @endif
        </div>
    </section>

        </div>
        </div>

            @endforeach
    </div>

    @endif

@endsection