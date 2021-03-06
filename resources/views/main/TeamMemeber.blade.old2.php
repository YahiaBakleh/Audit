@extends('main.layouts.layout')
@section('style')
    <style>
    /*    .imag {*/
    /*        position: relative;*/
    /*        float: left;*/
    /*        width:  320px;*/
    /*        height: 379px;*/
    /*        background-position: 50% 50%;*/
    /*        background-repeat:   no-repeat;*/
    /*        background-size:     cover;*/
    /*    }*/

    /*    @media all and (max-width: 767px) {*/
    /*        .imag{*/
    /*            padding-right: 30px;*/
    /*            width:  200px;*/
    /*            height: 300px;*/
    /*        }*/
    /*    }*/


    /*    .team-boxed {*/
    /*        color:#313437;*/
    /*        background-color:#e9ebee;*/
    /*    }*/

    /*    .team-boxed p {*/
    /*        color:#7d8285;*/
    /*    }*/

    /*    .team-boxed h2 {*/
    /*        font-weight:bold;*/
    /*        margin-bottom:40px;*/
    /*        padding-top:40px;*/
    /*        color:inherit;*/
    /*    }*/

    /*    @media (max-width:767px) {*/
    /*        .team-boxed h2 {*/
    /*            margin-bottom:25px;*/
    /*            font-size:24px;*/
    /*        }*/
    /*    }*/

    /*    .team-boxed .intro {*/
    /*        font-size:16px;*/
    /*        max-width:500px;*/
    /*        margin:0 auto;*/
    /*    }*/

    /*    .team-boxed .intro p {*/
    /*        margin-bottom:0;*/
    /*    }*/

    /*    .team-boxed .people {*/
    /*        padding:50px 0;*/
    /*    }*/

    /*    .team-boxed .item {*/
    /*        text-align:center;*/
    /*    }*/

    /*    .team-boxed .item .box {*/
    /*        text-align:center;*/
    /*        padding:30px;*/
    /*        background-color:#e9ebee;*/
    /*        margin-bottom:30px;*/
    /*    }*/

    /*    .team-boxed .item .name {*/
    /*        font-weight:bold;*/
    /*        margin-top:28px;*/
    /*        margin-bottom:8px;*/
    /*        color:inherit;*/
    /*    }*/

    /*    .team-boxed .item .title {*/
    /*        text-transform:uppercase;*/
    /*        font-weight:bold;*/
    /*        color:#d0d0d0;*/
    /*        letter-spacing:2px;*/
    /*        font-size:13px;*/
    /*    }*/

    /*    .team-boxed .item .description {*/
    /*        font-size:15px;*/
    /*        margin-top:15px;*/
    /*        margin-bottom:20px;*/
    /*    }*/

    /*    .team-boxed .item img {*/
    /*        width:  300px;*/
    /*        height: 400px;*/
    /*    }*/

    /*    .team-boxed .social {*/
    /*        font-size:18px;*/
    /*        color:#a2a8ae;*/
    /*    }*/

    /*    .team-boxed .social a {*/
    /*        color:inherit;*/
    /*        margin:0 10px;*/
    /*        display:inline-block;*/
    /*        opacity:0.7;*/
    /*    }*/

    /*    .team-boxed .social a:hover {*/
    /*        opacity:1;*/
    /*    }*/
    /*[data-tooltip] {*/
    /*    position: relative;*/
    /*    margin: 20px 0px 0px 0px;*/
    /*}*/

        /*.row span{*/
        /*    margin-left:240px;*/
            
        /*}      */
        
        /*.row span p.hyphenate.text:first-child{*/
        /*    margin-left:0px;*/
        /*}*/
        /*.row span p.hyphenate.text:last-child{*/
        /*    margin-left:90px;*/
        /*}  
    */
    #title{
        margin-top:20px;
    }   
    #info{
           margin-left:240px;
        }
    #info ul li {
        text-align: justify;
        margin-left:50px
    }
        @media (max-width:767px) {
        
        #info{
           margin-left:0px;
        }
        #title{
            margin-top:0px;
        }
        #info ul li {
            text-align: none;
            margin-left:25px
        }
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
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                    <h2>@lang('team.title')</h2>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
        <div class="container">
            <div class="row">
                <article >
                    <div>
                    <img class="col-sm-4" alt="Pic" src="{{ asset('storage/' . $memeber->image_path) }}">
                    {{--<div id="title" class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">--}}
                    <div id="title" class="col-sm-7">
                        <span id="title">
                            @if(app()->getLocale() == 'ar' )
                                {!! $memeber->ar_title !!}
                            @else
                                {!! $memeber->title !!}
                            @endif
                        </span>
                    </div>
                    </div>
                    <div id="info">
                                    <p>
                                            @if(app()->getLocale() == 'ar' )
                                            {!!$memeber->ar_description!!}
                                            @else
                                            {!!$memeber->description!!}
                                            @endif
                                    </p>
                                                                        <div >                                    
<p>E-Mail : <a href="mailto:{{$memeber->email}}?subject=Your inquiry" class="link-underline">{{$memeber->email}}</a></p>
                                    </div>
                    </div>

                </article>
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
@endsection
