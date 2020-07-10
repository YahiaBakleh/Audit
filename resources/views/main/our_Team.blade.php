@extends('main.layouts.layout')
@section('style')
<style>
  /*.row .team-member.team-member--small a img{*/
  /*      -webkit-filter: sepia(1);*/
  /*      filter: sepia(1);*/
  /*      transition:-5% ease-in-out;*/
  /*  } */
  /*  .row .team-member.team-member--small a img:hover{*/
  /*      -webkit-filter: sepia(0);*/
  /*      filter: sepia(0);*/
  /*  }*/
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
    
    @if(count($team_memebers) > 0)
        <section class="section-team-small">
            <div class="container">
                <div class="row">
                    @foreach ($team_memebers as $team) 
                        <div class="col-sm-4 col-xs-6">
                            <div class="team-member team-member--small">
                                 <a href="/teamMember/{{$team->id}}">
                                    <img alt="Image" id='image' class="imag" src="{{ asset('storage/' . $team->image_path) }}">
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
{{--delete this--}}

{{--end delete this--}}

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