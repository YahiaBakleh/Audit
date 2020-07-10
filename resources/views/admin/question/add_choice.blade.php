@extends('admin.layouts.app')
@section('title')
    Add Choice

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-material form-group" method="post" action="{{route('store_choice')}}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>

                        <h2 class="panel-title">Add Choice to : {{$question->title}}</h2>
                    </header>

                    <div class="panel-body">


                                <input type="hidden" name="question_id" value="{{$question->id}}">

                            <div class="row form-group">
                                <div class="col-lg-2">
                                    <input type="text" name="choice" placeholder="Choice" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="file">
															</span>
                                            <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <footer class="panel-footer">
                        <button class="btn btn-primary">Add Question</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
    @endsection