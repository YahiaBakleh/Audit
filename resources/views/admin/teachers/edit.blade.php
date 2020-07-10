@extends('admin.layouts.app')
@section('title')
    Edit - Instructor
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-material form-group" method="post"
                  action="{{route('teacher.update',['id'=>$instructor->id])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
                        <h2 class="panel-title">Edit Instructor</h2>
                        <p class="panel-subtitle">
                            Edit The Instructor
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Edit  Title for the Instructor </label>
                                <textarea name="title">{!! $instructor->title !!}</textarea>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add Arabic Title for the Section </label>

                                <textarea name="ar_title">{!! $instructor->ar_title !!}</textarea>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>
                        <br>





                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Edit the Image for the Section </label><br>
                                <strong>Please Upload image with at leaset width: 1000px and height: 500px </strong>
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


                        <br>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Edit Description for the Instructor </label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <textarea id="summernote_desc" name="description">{!! $instructor->description !!}</textarea>
                                <input type="hidden" name="course_id" value="{{$instructor->course_id}}">

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Edit Arabic Description for the Instructor </label>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <textarea id="summernote_desc" name="ar_description">{!! $instructor->ar_description !!}</textarea>

                            </div>
                        </div>

                    </div>
                    <footer class="panel-footer">
                        <button class="btn btn-primary" id="update_test">Update Instructor</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#summernote_desc').summernote({
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname'],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
    </script>
@endsection

