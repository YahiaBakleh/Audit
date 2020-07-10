@extends('main.layouts.layout')
@section('style')
    <style>
        article p{
            width: 85%;
            margin-left: 100px;
            padding: 0;
            margin-right: 100px;
        }
        article ul {
            width: 85%;
            margin-left: 9%;
            padding: 0 15px;
        }
        #img{
            width:1180px; 
            height:500px;
            margin:auto 200px auto 0px;
        }
        @media (max-width:767px) {
            html{
                overflow-x: hidden;
            }
            #img{
            width:auto; 
            height:auto;
            margin:auto;
            }
            article p{
            width:auto; 
            height:auto;
            margin:auto 25px auto 25px;    
            }
        }
    </style>
@endsection
@section('content')
    <section class="page-title section--pullup bg--secondary">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{ Breadcrumbs::render('article' , $article) }}
                    <hr>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                    <h1>{!! $article->title !!}</h1>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section>
        <div class="container">
            <div class="row">
                <article>
                    <img id="img" class="col-sm-12"  alt="Pic" src="{{ asset('storage/' . $article->image_path) }}" >

                    <p>
                        {!! $article->description !!}
                    </p>
                </article>
                <hr>

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
@endsection