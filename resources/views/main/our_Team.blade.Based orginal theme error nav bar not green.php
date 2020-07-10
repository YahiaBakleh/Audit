@extends('main.layouts.layout')
@section('style')
        <meta charset="utf-8">
        <title>Partner HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300%7CSource+Sans+Pro:400,300,600,400italic' rel='stylesheet' type='text/css'>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/et-line.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/socicon.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/flexslider.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
    <div class="gradient--active">

        <section class="page-title section--pullup bg--secondary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <ol class="breadcrumb">
                                <li>
                                <a href="{{route('website')}}">@lang('nav.home')</a>
                                </li>
                                <li>
                                <a href="#">@lang('nav.team')</a>
                                </li>
                            </ol>
                            <hr>
                        </div>
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1>
                                @lang('team.title')
                            </h1>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        @if(count($team_memebers) > 0)
            <section class="section-team-small" >
                <div class="container">
                    <div class="row">
                    @foreach ($team_memebers as $team) 
                        <div class="col-sm-4 col-xs-6">
                            <div class="team-member team-member--small">
                                <a href="/teamMember/{{$team->id}}">
                                    <img alt="Image" id='image' class="imag" src="{{ asset('storage/' . $team->image_path) }}" style="">
                                </a>
                                <span class="team-member__role">
                                    @if(app()->getLocale() == 'ar' )
                                        {!! $team->ar_title !!}
                                    @else
                                        {!! $team->title !!}
                                    @endif
                                </span>
                            </div>
                            <!--end of small team member-->
                        </div>
                    @endforeach
                    </div>

                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        @endif

    </div>
@endsection
@section('script')
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/flexslider.min.js"></script>
<script src="js/scripts.js"></script>
<script type="text/javascript">
$(function(){
    function log(val){
        console.log(val);
    }
    var image= $('.col-sm-4.col-xs-6 img');
        image.bind('click',function(){
           var container= this.closest('.team-member.team-member--small') ;
           var text = container.children('p');
           log(text);
        });
});
      
    
      
    
</script>
@endsection