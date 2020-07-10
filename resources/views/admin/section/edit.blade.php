@extends('admin.layouts.app')
@section('title')
    Section
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-material form-group" method="post"
                  action="{{route('sections.update',['section'=>$section])}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
                        <h2 class="panel-title">Edit Section</h2>
                        <p class="panel-subtitle">
                            Edit The {{ strip_tags($section->title)}}
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <textarea name="title">{!! $section->title !!}</textarea>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Edit Arabic Title for the Section </label>

                                <textarea name="ar_title">{!! $section->ar_title !!}</textarea>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                        @if($section->type == 3 )
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Edit The Career Code </label>

                                    <input class="form-control" type="text"
                                           value="{{ isset($section->career_code)? $section->career_code : 'No Code is set' }}"
                                           name="code" placeholder="Career Code">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>
                        @endif

                        @if($section->type == 6)
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Edit Email for team memeber</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email"
                                           value="{{$section->email}}">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>
                        @endif

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add this section to the ads slider </label>
                                <input class="form-control" type="checkbox" name="ads" placeholder="Make this an ad" {{ isset($section->is_ad) ? "checked" : "" }}>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>
                        <br>

                        @if($section->type == 4)
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Edit Start Date For The Course </label>

                                    <input class="form-control" type="date" name="start_date" placeholder="Start Date"
                                           value="{{ isset($section->start_date)? $section->start_date : 'No Start Date is set yet ' }}"

                                    >
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>
                        @endif

                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Edit the Image for the Section </label><br>
                                @if($section->type == 7)
                                    <strong>Please Upload image with at leaset width: 1500px and height: 500px
                                        (RECOMMENDED) </strong>
                                @else
                                    <strong>Please Upload image with at leaset width: 300px and height: 400px
                                        (RECOMMENDED)</strong>
                                @endif
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
                        @if($section->type != 7)
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Edit Description for the Section </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <textarea id="summernote_desc"
                                              name="description">{!! $section->description !!}</textarea>
                                    <input type="hidden" name="type" value="{{$section->type}}">

                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Edit Arabic Description for the Section </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <textarea id="summernote_desc" name="ar_description">{!! $section->ar_description !!}</textarea>

                                </div>
                            </div>
                        @endif
                    </div>
                    <footer class="panel-footer">
                        <button class="btn btn-primary" id="update_test">Update Section</button>
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

