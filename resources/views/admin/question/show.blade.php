@extends('admin.layouts.app')
@section('title')
    Question
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

    <div class="row">
        <div class="col-md-12">
            <section class="panel ">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Question {{$question->id}}</h2>

                </header>
                <div class="panel-body">
                    <h4><b>Question Title:</b></h4>
                    <p class="text-muted">{!! $question->title !!}</p>
                    <hr>
                    @if($question->is_paraghraph)
                       <label> <b>Question Paraghtraph : </b></label> {{$question->is_paraghraph}}
                    @else
                    <div id="Choice_show">
                            <section class="panel panel-featured panel-featured-info">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Choices  for this Questions</h2>
                                </header>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-none">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Choice Title</th>
                                                <th class="text-center">Correct</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($question->choices as $choice)
                                                <tr  class="item{{$choice->id}}">
                                                    <td class="text-center">{{$choice->id}}</td>
                                                    <td class="text-center">{!! $choice->title !!}</td>
                                                    <td class="text-center">@if($correct = $choice->is_correct)
                                                           <i class="fa  fa-check"></i>
                                                            @endif
                                                    </td>

                                                    <td class="text-center">@if($path = $choice->image_path)
                                                         <img  id="img" src="{{ asset('storage/'.$path) }}"class="thumbnail img-responsive" alt="Responsive image" >
                                                            @else
                                                        <p>no image </p>
                                                            @endif
                                                    </td>

                                                    <td class="actions text-center">

                                                        <i id="edit_{{$choice->id}}" class="fa fa-pencil" data-toggle="modal" data-target="#edit_choice" data-id="{{$choice->id}}" data-name ="{{strip_tags($choice->title)}}"></i>
                                                        <i id="delete_{{$choice->id}}" class="delete fa fa-trash-o on"  style="color: red"  data-id="{{$choice->id}}"  data-name ="{{strip_tags($choice->title)}}">
                                                        </i>
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
                    <div class="container">
                    <div class="row">
                        @if(!$question->is_paraghraph )
                        <div class="col-md-2">

                            <div class="btn btn-info" data-toggle="modal" data-target="#add_choice" >Add Choice</div>

                        </div>
                        @endif
                    </div>
                    </div>
                </div>

                        <div class="modal fade" id="add_choice" tabindex="-1" role="dialog" aria-labelledby="add_choice" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="width:880px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Choice</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form  id="add_choice_form" action="{{route('choices.store')}}"  enctype="multipart/form-data" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="question_id"  value="{{$question->id}}">
                                            <div class="form-group">
                                                <textarea name="choice" placeholder=" Choice title " class="form-control"></textarea>
                                             </div>

                                            <div class="form-group">
                                                <div class="checkbox-custom checkbox-default">
                                                        <input type="checkbox"  name="choice_correct" class="chb" >
                                                        <label for="choice_correct">is correct</label>
                                                </div> 
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col" >
                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="input-append">
                                                            <div class="uneditable-input">
                                                                <i class="fa fa-file fileupload-exists"></i>
                                                                <span class="fileupload-preview"></span>
                                                            </div>
                                                            <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input id="inptFileChoice1" type="file" name="file">
															</span>
                                                            <a href="#" id="choice1ImageRemove" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                            <button id="Preview1" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>                                              
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="ImageControle1" style="margin-top:15px;">

                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <input id="WidthText1" type="text" name="width" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange1',this.value);">
                                                        </div>

                                                        <div class="col-md-3">
                                                            <input id="WidthRange1" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange" onchange="updateValue('WidthText1',this.value);">
                                                            <label class="label label-default" for="" >Width</label>
                                                        </div>

                                                        <div class=".col-md-2 .ml-auto float-left" >
                                                            <div class="input-append">
                                                                <div class="col-md-2" style="margin-left:60px;">
                                                                    <input id="HeightText1" type="text" name="height" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange1',this.value);">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input id="HeightRange1" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange" onchange="updateValue('HeightText1',this.value);">
                                                                <label class="label label-default" for="" >Height</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>




                                                <div id="previewImage1" class="panel panel-default image-preview" >
                                                    <img id="choice1Image" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
                                                    <span id="DefultImagText1" calss="defult-imag-text">Image Preview</span>
                                                </div>
                                            </div>


                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="">Add Choice</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            </section>
        </div>
    </div>
    <!-- edit existing Choice-->
    <div class="modal fade" id="edit_choice" tabindex="-1" role="dialog" aria-labelledby="edit_choice" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Choice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="edit_group_form" action="{{route('choices.update_ajax')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Choice Title:</label>
                            <!--<input type="text" class="form-control" id="choice-title" name="title">-->
                            <textarea class="form-control" id="choice-title" name="title"></textarea>
                            <br>
                            <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox"  name="choice_correct" class="chb" >
                                    <label for="choice_correct">is correct</label>
                            </div> 
                            <input type="hidden" name="question_id" value="{{$question->id}}">
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <div class="col" >
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="input-append">
                                        <div class="uneditable-input">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="btn btn-default btn-file">
                                            <span class="fileupload-exists">Change</span>
                                            <span class="fileupload-new">Select file</span>
                                            <input id="inptFileChoice2" type="file" name="file">
                                        </span>
                                        <a href="#" id="choice2ImageRemove" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                        <button id="Preview2" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>                                              
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="ImageControle2" style="margin-top:15px;">

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <input id="WidthText2" type="text" name="width" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange2',this.value);">
                                    </div>

                                    <div class="col-md-3">
                                        <input id="WidthRange2" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange" onchange="updateValue('WidthText2',this.value);">
                                        <label class="label label-default" for="" >Width</label>
                                    </div>

                                    <div class=".col-md-2 .ml-auto float-left" >
                                        <div class="input-append">
                                            <div class="col-md-2" style="margin-left:60px;">
                                                <input id="HeightText2" type="text" name="height" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange2',this.value);">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input id="HeightRange2" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange" onchange="updateValue('HeightText2',this.value);">
                                            <label class="label label-default" for="" >Height</label>
                                        </div>
                                    </div>

                                </div>
                            </div>




                            <div id="previewImage2" class="panel panel-default image-preview" >
                                <img id="choice2Image" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
                                <span id="DefultImagText2" calss="defult-imag-text">Image Preview</span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Update Choice</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Choice</h5>
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

@endsection

@section('script')
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#is_para').change(function(){
                if(this.checked)
                    $('#autoUpdate').fadeOut('slow');
                else
                    $('#autoUpdate').fadeIn('slow');

            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#add_choice_form').on('submit', function(e) {
                var form = $(this);
                var data = new FormData(form);
                var url = form.prop('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        $('#add_choice').modal('hide');
                    },
                    error: function() {
                        alert('Error');

                    }
                });
                return false;
            });
        });


    </script>
    <script>
        $(document).ready(function(){
            $('.fa-pencil').on('click' , function (e) {
                $('#id').val($(this).data('id'));
                $('#choice-title').val($(this).data('name'));
            } );
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '.delete', function (e) {
            $('.did').val($(this).data('id'));
            $('.dname').text("Are you sure you want to delete "+$(this).data('name') + ' Choice ?');
            $('#myModal').modal('show');
        });
        $('.modal-footer').on('click', '#yes', function() {
            $('#myModal').modal('hide');
            var id = $('.did').val();
            var url = '/admin/choices/'+id;
            var token = '{{ csrf_token() }}';
            $.ajax({
                type: 'DELETE',
                url:url,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    console.log('success0');
                    $('.item' + data).remove();
                    var hide = true;

                    $('.table td').each(function(){
                        var td_content = $(this).text();

                        if(td_content!=""){
                            hide = false;
                        }
                    })

                    if(hide){

                        $('#Choice_show').hide();
                    }
                    console.log(data);
                }
            });
        });
    </script>
    <script>
    function updateValue(id,val){
        document.getElementById(id).value=val;
    }
// preview image for add new choice  
    var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle1 = $("#ImageControle1");
	var WidthText1 = $("#WidthText1");
	var WidthRange1 = $("#WidthRange1");
	var HeightText1 = $("#HeightText1");
	var HeightRange1 =$("#HeightRange1");
	var Preview1 = $('#Preview1'); // button
	var previewImage1= $('#previewImage1'); // div
	var choice1Image= $('#choice1Image'); //img tag had src attr
	var inptFileChoice1 = $('#inptFileChoice1'); // img input for question
	var DefultImagText1 = $('#DefultImagText1');
	var choice1ImageRemove = $('#choice1ImageRemove');
	ImageControle1.hide('slow');
	$("#choice1Image").attr('width',200);
	$("#choice1Image").css('width',200);
	$("#choice1Image").attr('height',200);
	$("#choice1Image").css('height',200);
	previewImage1.attr('width',200);
	previewImage1.css('width',200);
	previewImage1.attr('height',200);
	previewImage1.css('height',200);

	Preview1.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle1.show('slow');
				// setImgAttr('display',null);
				Preview1.html('Hide');
				state=2;
			}else{
				ImageControle1.hide('slow');
				Preview1.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage1" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText1').value=width;
			document.getElementById('WidthRange1').value=width;
			document.getElementById('HeightText1').value=height;
			document.getElementById('HeightRange1').value=height;
			previewImage1.css('width',width);
			previewImage1.css('height',height);
			$("#choice1Image").attr('width',width);
			$("#choice1Image").css('width',width);
			$("#choice1Image").attr('height',height);
			$("#choice1Image").css('height',height);

	}});

	$(WidthRange1).change(function(){
			$( "#previewImage1" ).css('width',WidthRange1.val());
			$( "#choice1Image1" ).attr('width',WidthRange1.val());
			$( "#choice1Image1" ).css('width',WidthRange1.val());

		});
	$(WidthText1).change(function(){
		document.getElementById('WidthText1').value>850?document.getElementById('WidthText1').value=850:document.getElementById('WidthText1').value;
		document.getElementById('WidthText1').value<0?document.getElementById('WidthText1').value=0:document.getElementById('WidthText1').value;
		document.getElementById('WidthText1').value==""||null?document.getElementById('WidthText1').value=0:document.getElementById('WidthText1').value;
		$( "#previewImage1" ).css('width',WidthText1.val());
		$( "#choice1Image1" ).attr('width',WidthText1.val());
		$( "#choice1Image1" ).css('width',WidthText1.val());
	});
	$(HeightRange1).change(function(){
		$( "#previewImage1" ).css('height',HeightRange1.val());
		$( "#choice1Image1" ).attr('height',HeightRange1.val());
		$( "#choice1Image1" ).css('height',HeightRange1.val());

	});
	$(HeightText1).change(function(){
		document.getElementById('HeightText1').value>850?document.getElementById('HeightText1').value=850:document.getElementById('HeightText1').value;
		document.getElementById('HeightText1').value<0?document.getElementById('HeightText1').value=0:document.getElementById('HeightText1').value;
		document.getElementById('HeightText1').value==""||null?document.getElementById('HeightText1').value=0:document.getElementById('HeightText1').value;
		$( "#previewImage1" ).css('height',HeightText1.val());
		$( "#choice1Image" ).attr('height',HeightText1.val());
		$( "#choice1Image" ).css('height',HeightText1.val());
	});
	inptFileChoice1.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText1.css('display','none');
				choice1Image.css('display','block');
				reader.addEventListener('load',function(){
					choice1Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice1ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText1.css('display','block');
		choice1Image.css('display','none');
		choice1Image.attr('src',null);
		document.getElementById('WidthText1').value=200;
		document.getElementById('WidthRange1').value=200;
		document.getElementById('HeightText1').value=200;
		document.getElementById('HeightRange1').value=200;
		$("#choice1Image").attr('width',200);
		$("#choice1Image").css('width',200);
		$("#choice1Image").attr('height',200);
		$("#choice1Image").css('height',200);
		previewImage1.attr('width',200);
		previewImage1.css('width',200);
		previewImage1.attr('height',200);
		previewImage1.css('height',200);
	});

// preoview image for editchoice 
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle2 = $("#ImageControle2");
	var WidthText2 = $("#WidthText2");
	var WidthRange2 = $("#WidthRange2");
	var HeightText2 = $("#HeightText2");
	var HeightRange2 =$("#HeightRange2");
	var Preview2 = $('#Preview2'); // button
	var previewImage2= $('#previewImage2'); // div
	var choice2Image= $('#choice2Image'); //img tag had src attr
	var inptFileChoice2 = $('#inptFileChoice2'); // img input for question
	var DefultImagText2 = $('#DefultImagText2');
	var choice2ImageRemove = $('#choice2ImageRemove');
	ImageControle2.hide('slow');
	$("#choice2Image").attr('width',200);
	$("#choice2Image").css('width',200);
	$("#choice2Image").attr('height',200);
	$("#choice2Image").css('height',200);
	previewImage2.attr('width',200);
	previewImage2.css('width',200);
	previewImage2.attr('height',200);
	previewImage2.css('height',200);

	Preview2.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle2.show('slow');
				// setImgAttr('display',null);
				Preview2.html('Hide');
				state=2;
			}else{
				ImageControle2.hide('slow');
				Preview2.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage2" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText2').value=width;
			document.getElementById('WidthRange2').value=width;
			document.getElementById('HeightText2').value=height;
			document.getElementById('HeightRange2').value=height;
			previewImage2.css('width',width);
			previewImage2.css('height',height);
			$("#choice2Image").attr('width',width);
			$("#choice2Image").css('width',width);
			$("#choice2Image").attr('height',height);
			$("#choice2Image").css('height',height);

	}});

	$(WidthRange2).change(function(){
			$( "#previewImage2" ).css('width',WidthRange2.val());
			$( "#choice2Image" ).attr('width',WidthRange2.val());
			$( "#choice2Image" ).css('width',WidthRange2.val());

		});
	$(WidthText2).change(function(){
		document.getElementById('WidthText2').value>850?document.getElementById('WidthText2').value=850:document.getElementById('WidthText2').value;
		document.getElementById('WidthText2').value<0?document.getElementById('WidthText2').value=0:document.getElementById('WidthText2').value;
		document.getElementById('WidthText2').value==""||null?document.getElementById('WidthText2').value=0:document.getElementById('WidthText2').value;
		$( "#previewImage2" ).css('width',WidthText2.val());
		$( "#choice2Image" ).attr('width',WidthText2.val());
		$( "#choice2Image" ).css('width',WidthText2.val());
	});
	$(HeightRange2).change(function(){
		$( "#previewImage2" ).css('height',HeightRange2.val());
		$( "#choice2Image" ).attr('height',HeightRange2.val());
		$( "#choice2Image" ).css('height',HeightRange2.val());

	});
	$(HeightText2).change(function(){
		document.getElementById('HeightText2').value>850?document.getElementById('HeightText2').value=850:document.getElementById('HeightText2').value;
		document.getElementById('HeightText2').value<0?document.getElementById('HeightText2').value=0:document.getElementById('HeightText2').value;
		document.getElementById('HeightText2').value==""||null?document.getElementById('HeightText2').value=0:document.getElementById('HeightText2').value;
		$( "#previewImage2" ).css('height',HeightText2.val());
		$( "#choice2Image" ).attr('height',HeightText2.val());
		$( "#choice2Image" ).css('height',HeightText2.val());
	});
	inptFileChoice2.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText2.css('display','none');
				choice2Image.css('display','block');
				reader.addEventListener('load',function(){
					choice2Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice2ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText2.css('display','block');
		choice2Image.css('display','none');
		choice2Image.attr('src',null);
		document.getElementById('WidthText2').value=200;
		document.getElementById('WidthRange2').value=200;
		document.getElementById('HeightText2').value=200;
		document.getElementById('HeightRange2').value=200;
		$("#choice2Image").attr('width',200);
		$("#choice2Image").css('width',200);
		$("#choice2Image").attr('height',200);
		$("#choice2Image").css('height',200);
		previewImage2.attr('width',200);
		previewImage2.css('width',200);
		previewImage2.attr('height',200);
		previewImage2.css('height',200);
	});
    </script>
@endsection