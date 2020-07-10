@extends('admin.layouts.app')
@section('title')
    Test
@section('style')
    <style type="text/css">
        div.b {

            right: 150px;

        }
    </style>
@endsection
@endsection

@section('content')
    <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('tests.create')}}">
                <div class="btn btn-primary">New Test</div>
            </a>
        </div>
    </div>
    <br>
    @if( (count($tests)) !=0)
        <div class="row">
            @foreach ($tests as $test)
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>
                            <a href="{{route('tests.show',['test' =>$test])}}"><h2
                                        class="panel-title">{{$test->name}}</h2></a>
                        </header>
                        <div class="panel-body">

                            <h4><b>Description :</b></h4>
                            <p class="text-muted">{!! $test->description !!}</p>


                            <h4><b>Instructions :</b></h4>
                            <p class="text-muted">{!! $test->instructions !!}</p>


                            <div class="row">
                                <div class="col-md-2">
                                    <form id="submiter{{$test->id}}" class="liner hidden-item"
                                          action="{{ route('tests.destroy',['test'=> $test]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                        <div class="btn btn-danger" onclick="triggerDeleteAlert({{$test->id}})">Delete Test</div>
                                    </form>
                                </div>


                                <div class="col-md-2">
                                    <a class="no-style-a" href="{{route('tests.edit' ,['test' => $test])}}">
                                        <div class="btn btn-warning">Update Test</div>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </section>
                </div>


            @endforeach
        </div>
    @else
        <div class="col-md-12 col-xl-12">
            <section class="panel">
                <div class="panel-body bg-secondary">
                    <div class="widget-summary">

                        <div class="widget-summary-col">
                            <strong style="text-center"> No Tests yet</strong>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif


@endsection

@section('script')
    <script type="text/javascript">

        function delete_question(question) {
            Swal.fire({
                title: 'Are you sure ?',
                type: 'warning',
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                preConfirm: () => {
                    $("#submiter_question").submit();
                }
            })
        }
    </script>
@endsection