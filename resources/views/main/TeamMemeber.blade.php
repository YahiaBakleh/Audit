@extends('main.layouts.layout')
@section('style')
<style>
    #email{
        margin-bottom:30px;
        margin-top:0px;
    }
    #title p:last-child{
         margin-bottom:0px;
    }
    #info p{
        margin-left:-40px;
    }
        #info {
        width: 550px;
    }
    /*mobile*/ 
        @media (max-width:767px) {
        #info {
            width: auto;
        }  
         #info p{
            margin-left:0px;
        }
        #info ul li{
            text-align: none;
            margin-left:20px
        }
        /*#info{*/
        /*   margin-left:25px;*/
        /*}*/
        /*#title{*/
        /*    margin-top:0px;*/
        /*}*/
        /*#info ul li {*/
        /*    text-align: none;*/
        /*    margin-left:25px*/
        /*}*/
    }
</style>
@endsection
@section('content')
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
    
    {{--the fllowin section is the 3 imag from our team but empty to prevent next section to play and go away right---}}
    <section class="section-team-small">
        <div class="container">
            <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div class="team-member team-member--small">
                            <span class="team-member__role">
                            </span>
                        </div>
                        <!--end of small team member-->
                    </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    {{--end section---}}
     <section class="cta-text" >
                <div class="container">
                    <div class="row">
                        <div class="team-member team-member--large">
                            <div class="col-md-5 col-md-offset-1 col-sm-7 text-center">
                                <img alt="Image" src="{{ asset('storage/' . $memeber->image_path) }}">
                            </div>
                            <div id="title" class="col-md-4 col-sm-5">
                                <span id="title">
                                    @if(app()->getLocale() == 'ar' )
                                        {!! $memeber->ar_title !!}
                                    @else
                                        {!! $memeber->title !!}
                                    @endif
                                </span>
                                <p id="email"><a href="mailto:{{$memeber->email}}?subject=Your inquiry" class="link-underline">{{$memeber->email}}</a></p>
                                <div id="info">
                                    <p>
                                            @if(app()->getLocale() == 'ar' )
                                            {!!$memeber->ar_description!!}
                                            @else
                                            {!!$memeber->description!!}
                                            @endif
                                    </p>
                                </div>
                              
                            </div>
                        </div>
                        <!--end of large team member-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
@endsection

@section('script')
    <script type="text/javascript">
        $( "#nav" ).removeClass( "nav--absolute nav--transparent bg--dark" );
        $("#nav").addClass(' bg--primary');
    </script>
    <script>
        $(function(){
            $('.truncate').succinct({
                size: 200
            });
        });
    </script>

    <script>
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var desc = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            var description  = button.data('name');
            var d = modal.find('#des').val(description);
            var des = modal.find('#desc').val(desc).scroll();
            des.te

        })
    </script> 
    <script>

    </script>
@endsection
