@extends('admin.layouts.app')
@section('title')
    Add Instructor
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-material form-group" method="post" action="{{route('teacher.store')}}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
                        <h2 class="panel-title">Add New Instructor</h2>
                        <p class="panel-subtitle">
                            You can modify the content of your website from here
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add Title for the Instructor </label>

                                <textarea name="title"></textarea>
                                <input type="hidden" name="course_id" value="{{$course_id}}">
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                        <br>
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add Arabic Title for the Section </label>

                                <textarea name="ar_title"></textarea>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>
                        <br>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add Email for Instructor</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>


                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add an Image for the Instructor </label><br>
                                <strong>Please Note that all images will resized to 300*400 px</strong>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-lg-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="image">
															</span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add Description for the Instructor </label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <textarea id="summernote_desc" name="description"></textarea>

                            </div>
                        </div>

                    <div class="row form-group">
                        <div class="col-lg-12">
                            <label>Add Arabic Description for the Instructor </label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-12">
                            <textarea id="summernote_desc" name="ar_description"></textarea>

                        </div>
                    </div>
                    </div>

                    <footer class="panel-footer">
                        <button id="add_test" class="btn btn-primary">Add Instructor</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection