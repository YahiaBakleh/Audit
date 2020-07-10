@extends('admin.layouts.app')
@section('title')
    Section
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-material form-group" method="post" action="{{route('sections.store')}}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <section class="panel">
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="fa fa-caret-down"></a>
                            <a href="#" class="fa fa-times"></a>
                        </div>
                        <h2 class="panel-title">Create new {{strip_tags($title)}}</h2>
                        <p class="panel-subtitle">
                            You can modify the content of your website from here
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add English Title for the Section </label>

                                <textarea id='my_editor' name="title"></textarea>
                                <input type="hidden" name="type" value="{{$type}}">
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                        <br>
                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add Arabic Title for the Section </label>

                                <textarea id='myNicEditor' name="ar_title"></textarea>
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>
                        @if($type == 3 )

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add Career Code </label>

                                    <input class="form-control" type="text" name="code" placeholder="Career Code">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>
                        @endif

                        @if($type == 4)
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add Start Date For The Course </label>

                                    <input class="form-control" type="date" name="start_date" placeholder="Start Date">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>
                        @endif

                        @if($type == 6)
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add Email for team memeber</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>
                        @endif


                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add this section to the ads slider </label>
                                    <input class="form-control" type="checkbox" name="ads" placeholder="Make this an ad">
                                </div>
                                <div class="mb-md hidden-lg hidden-xl"></div>
                            </div>
                            <br>



                        <div class="row form-group">
                            <div class="col-lg-12">
                                <label>Add an Image for the Section </label><br>
                                @if($type == 7)
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
                        @if($type != 7)
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add Description for the Section </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <textarea id='myNicEditor' name="description"></textarea>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label>Add Arabic Description for the Section </label>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <textarea id='myNicEditor' name="ar_description"></textarea>

                                </div>
                            </div>
                        @endif
                    </div>

                    <footer class="panel-footer">
                        <button id="add_test" class="btn btn-primary">Add Section</button>
                    </footer>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('script')
  <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.getElementById('my_editor'));
    </script>
						
@endsection