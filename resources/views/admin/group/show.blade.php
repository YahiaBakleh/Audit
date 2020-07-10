@extends('admin.layouts.app')
@section('title')
    Group
@endsection
@section('style')
<style>
.image-preview{
	width:500;
	margin-top:20px;
	height:300; 
	border:4px #cccc solid;
	display:flex; 
	align-items:center; 
	justify-content:center; 
	font-weight:bold; 
	color:#dddd;
}
</style>
@endsection
@section('content')
    <br>

<div class="row">
	<div class="col-md-12">
        <section class="panel ">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>
                                    <h2 class="panel-title">{{$group->name}}</h2>
                                </header>

                                <div class="panel-body">
                                    <h4><b>Group Name :</b></h4>
                                    <p class="text-muted">{{$group->name}}</p>
                                    <hr>
                                    @if(count($group->questions) > 0 )
                                        <div id="question_show">
                                            <section class="panel panel-featured panel-featured-info">
                                                <header class="panel-heading">
                                                    <h2 class="panel-title">Questions for this Group</h2>
                                                </header>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-none">
                                                            <thead>
                                                                <tr >
                                                                    <th class="text-center">#</th>
                                                                    <th class="text-center">Question Title</th>
                                                                    <th class="text-center">Question Image</th>
                                                                    <th class="text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($group->questions as $question)
                                                                    <tr  class="item{{$question->id}}">
                                                                        <td class="text-center">{{$question->id}}</td>
                                                                        <td id="name_{{$question->id}}" class="text-center">{!! $question->title !!}</td>
                                                                        <td  class="text-center">@if($path = $question->image_path)
                                                                                <img id="img" src="{{ asset('storage/'.$path) }}"class="thumbnail img-responsive" alt="Responsive image" >
                                                                            @else
                                                                                <p>no image </p>
                                                                            @endif
                                                                        </td>

                                                                        <td class="actions text-center">

                                                                            <a href="{{route('questions.show' , ['question' => $question])}}"><i class="fa fa-cube"></i></a>
                                                                            <i id="edit_{{$question->id}}" class="fa fa-pencil" data-toggle="modal" data-target="#edit_question" data-id="{{$question->id}}" data-name ="{{strip_tags($question->title)}}"></i>
                                                                            <i id="delete_{{$question->id}}" class="delete fa fa-trash-o on"  style="color: red"  data-id="{{$question->id}}"  data-name ="{{strip_tags($question->title)}}"></i>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    @endif
                                    <div class="row">
                                        {{-- add question botton : to open add question dialog markup --}}
                                            <div class="col-md-2">
                                                <div class="btn btn-info" data-toggle="modal" data-target="#add_question" >Add Question</div>
                                            </div>
                                        {{-- add question botton--}}

                                        {{-- dialog markup--}}
                                        {{-- add question : dialog markup --}}
                                            <div class="modal fade" id="add_question" tabindex="-1" role="dialog" aria-labelledby="add_question" aria-hidden="true">
                                                {{-- modal dialog--}} 
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        {{-- modal content--}} 
                                                            <div class="modal-content">
                                                                {{-- modal header :contain dialog title and close 'x' --}} 
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                {{-- end modal header--}} 
                                                                
                                                                {{-- modal body : contain add/insert form --}} 
                                                                    <div class="modal-body">
                                                                        {{-- add question form --}}
                                                                            <form  id="add_question_form" action="{{route('questions.store')}}"  enctype="multipart/form-data" method="post">
                                                                                {{ csrf_field() }}
                                                                                    {{-- textarea --}} 
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" name="group_id" value="{{$group->id}}">
                                                                                            <textarea class="form-control" name="title" rows="5" placeholder="Question Title"></textarea>
                                                                                        </div>
                                                                                    {{-- end textarea --}} 
                                                                                    {{-- score/marks --}} 
                                                                                        <div class="form-group">
                                                                                            <label for="recipient-name" class="col-form-label">Question Score:</label>
                                                                                            <input type="number" min="0" value="20" class="form-control" name="score">
                                                                                        </div>
                                                                                    {{-- end score/marks --}} 
                                                                                    {{-- file upload --}} 
                                                                                        <div class="form-group">
                                                                                            <div class="col">
                                                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                                                    <div class="input-append">
                                                                                                        <div class="uneditable-input">
                                                                                                            <i class="fa fa-file fileupload-exists"></i>
                                                                                                            <span class="fileupload-preview"></span>
                                                                                                        </div>
                                                                                                        <span class="btn btn-default btn-file">
                                                                                                            <span class="fileupload-exists">Change</span>
                                                                                                            <span class="fileupload-new">Select file</span>
                                                                                                            <input type="file" name="question_upload" id="inptFileQuestion">
                                                                                                        </span>
                                                                                                        <a href="#" class="btn btn-default fileupload-exists" id="questionImageRemove" data-dismiss="fileupload">Remove</a>
																		                                <button id="Preview" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    {{-- end file upload --}}
                                                                                    {{--image preview & resize controles--}}
                                                                                    <div id="ImageControle">
                                                                                        <div class="row">
                                                                                            <div class="form-group">
                                                                                                <div class="col-md-2">
                                                                                                    <input id="WidthText" type="text" name="Width" placeholder="Width" class="form-control" value="500" onchange="updateValue('WidthRange',this.value);">
                                                                                                </div>

                                                                                                <div class="col-md-3">
                                                                                                    <input id="WidthRange" style=" margin-bottom:5px;" type="range" min="0" max="850" value="500" name="widthRange" onchange="updateValue('WidthText',this.value);">
                                                                                                    <label class="label label-default" for="" >Width</label>
                                                                                                </div>

                                                                                                <div class=".col-md-2 .ml-auto float-left" >
                                                                                                    <div class="input-append">
                                                                                                        <div class="col-md-2">
                                                                                                            <input id="HeightText" type="text" name="height" placeholder="Height" class="form-control" value="300"  onchange="updateValue('HeightRange',this.value);">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-3">
                                                                                                        <input id="HeightRange" style=" margin-bottom:5px;" type="range" min="0" max="850" value="300" name="heightRange" onchange="updateValue('HeightText',this.value);">
                                                                                                        <label class="label label-default" for="" >Height</label>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>


                                                                                        <div id="previewImage" class="panel panel-default image-preview" >
                                                                                            <img id="questionImage" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
                                                                                            <span id="DefultImagText" calss="defult-imag-text">Image Preview</span>
                                                                                        </div>

                                                                                    </div>
                                                                                    {{--end image preview & resize controles--}}
                                                                                    {{-- is Paraghraph/Answer Has Attachment --}} 
                                                                                        <div class="form-group ">
                                                                                        
                                                                                                <div class="checkbox-custom checkbox-default mt-sm ml-md mr-md">
                                                                                                    <input type="checkbox"   id="is_para" name="is_paraghraph">
                                                                                                    <label for="is_paraghraph">is Paraghraph</label>
                                                                                                </div>
                                                                                                <div class="checkbox-custom checkbox-default mt-sm ml-md mr-md">
                                                                                                    <input type="checkbox"   id="answer_attachment" name="answer_attachment">
                                                                                                    <label for="answer_attachment">Answer Has Attachment</label>
                                                                                                </div>
                                                                                        </div>
                                                                                    {{-- end is Paraghraph/Answer Has Attachment --}} 
                                                                                    {{-- Answers Checkbox --}} 
                                                                                        <div id="autoUpdate">
                                                                                            @php 
                                                                                                $i= [1,2,3,4];
                                                                                            @endphp
                                                                                            @each('admin.group.partial.part',$i,'i')
                                                                                        </div>
                                                                                    {{-- end Answers Checkbox --}} 
                                                                                    {{-- Add/close --}}         
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary" id="">Add Question</button>
                                                                                        </div>
                                                                                    {{-- end Add/close --}} 
                                                                            </form>
                                                                        {{-- end add question form --}}
                                                                    </div>
                                                                {{-- emodal body--}} 
                                                            </div>
                                                        {{-- end modal content--}} 
                                                    </div>
                                                {{-- end modal dialog--}} 
                                            </div>
                                        {{-- end add question --}}
                                    </div>
                                 </div>
                        
        </section>
    </div>
</div>


    <!--Modal -->
    <!-- edit existing question-->
    {{-- edit question : dialog markup --}}
        <div class="modal fade" id="edit_question" tabindex="-1" role="dialog" aria-labelledby="edit_question" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width:900px;">
                <div class="modal-content">
                    {{-- modal header : contain dialog title and close 'x' --}}
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    {{-- end modal header --}}
                    {{-- modal body : contain edit form --}}
                        <div class="modal-body">
                            {{-- edit question form --}} 
                                <form  id="edit_question_form" action="{{route('questions.update_ajax')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Question Title:</label>
                                        <!--<input type="text" class="form-control" id="question-title" name="title">-->
                                        <textarea class="form-control" name="title" rows="5" placeholder="Question Title" id="question-title"></textarea>
                                        <input type="hidden" id="id" name="id">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Question Score:</label>
                                        <input  type="number" min =0 value="20" class="form-control" name="score">
                                    </div>
                                    <div class="form-group">
                                        <div class=".col-md-12 .ml-auto" style="margin-top:10px;">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-append">
                                                    <div class="uneditable-input">
                                                        <i class="fa fa-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileupload-exists">Change</span>
                                                        <span class="fileupload-new">Select file</span>
                                                        <input type="file" name="file" id="inptFile">
                                                        </span>
                                                        <a href="#" class="btn btn-default fileupload-exists" id="questionImageRemove0" data-dismiss="fileupload">Remove</a>
										                <button id="Preview0" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="ImageControleEdit">

                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <input id="WidthText0" type="text" name="Width" placeholder="Width" class="form-control" value="500" onchange="updateValue('WidthRange0',this.value);">
                                                </div>

                                                <div class="col-md-3">
                                                    <input id="WidthRange0" style=" margin-bottom:5px;" type="range" min="0" max="850" value="500" name="widthRange" onchange="updateValue('WidthText0',this.value);">
                                                    <label class="label label-default" for="" >Width</label>
                                                </div>

                                                <div class=".col-md-2 .ml-auto float-left" >
                                                    <div class="input-append">
                                                        <div class="col-md-2">
                                                            <input id="HeightText0" type="text" name="height" placeholder="Height" class="form-control" value="300"  onchange="updateValue('HeightRange0',this.value);">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input id="HeightRange0" style=" margin-bottom:5px;" type="range" min="0" max="850" value="300" name="heightRange" onchange="updateValue('HeightText0',this.value);">
                                                        <label class="label label-default" for="" >Height</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div id="previewImage0" class="panel panel-default image-preview" >
                                            <img id="questionImage0" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
                                            <span id="DefultImagText0" calss="defult-imag-text">Image Preview</span>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <div class="checkbox-custom checkbox-default mt-sm ml-md mr-md">
                                            <input type="checkbox"   id="answer_attachment" name="answer_attachment">
                                            <label for="answer_attachment">Answer Has Attachment</label>
                                        </div>
                                    </div>
                                    {{-- Update/close--}} 
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="edit_question">Update Question</button>
                                        </div>
                                    {{-- end Update/close--}} 
                                </form>
                            {{-- end edit question form --}} 
                        </div>
                    {{-- end modal body--}}
                </div>
            </div>
        </div>
    {{-- end edit question --}}
    <!-- Delete Modal -->

    {{-- delete question : dialog markup --}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="dname" ></label>
                        <input class="did" type="hidden">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="yes">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- end delete question --}}

@endsection

@section('script')
    @include('admin.group.partial.script')
@endsection