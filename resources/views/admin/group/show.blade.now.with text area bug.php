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
						 <div class="col-md-2">

								<div class="btn btn-info" data-toggle="modal" data-target="#add_question" >Add Question</div>
						 </div>

					  <div class="modal fade" id="add_question" tabindex="-1" role="dialog" aria-labelledby="add_question" aria-hidden="true">
						  <div class="modal-dialog modal-lg" role="document">
							  <div class="modal-content">
								  <div class="modal-header">
									  <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
									  </button>
								  </div>
								  <div class="modal-body">
										  <form  id="add_question_form" action="{{route('questions.store')}}"  enctype="multipart/form-data" method="post">
											  {{ csrf_field() }}
											  <div class="form-group">
												  <input type="hidden" name="group_id" value="{{$group->id}}">

  <textarea class="form-control" name="title" rows="5" placeholder="Question Title"></textarea>
											  </div>

						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Question Score:</label>
							<input  type="number" min =0 value="20" class="form-control" name="score">
						</div>

														<div class="form-group">
															<div class="col">
																<div div class="fileupload fileupload-new" data-provides="fileupload">
																	<div class="input-append">
																		<div div class="uneditable-input">
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

												<div id="autoUpdate">
													<div class="row">
														<div class="form-group">
															<div class="col-md-4">
																<input type="text" name="choice1" placeholder="First Choice" class="form-control">
															</div>

															<div class="col-md-2">
																<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	<input type="checkbox"  name="choice1_correct" class="chb" >
																	<label for="choice1_correct">is correct</label>
																</div>
															</div>

															<div class=".col-md-4 .ml-auto fileupload fileupload-new float-left" data-provides="fileupload">
																<div class="input-append">
																		<div class="uneditable-input">
																			<i class="fa fa-file fileupload-exists"></i>
																			<span class="fileupload-preview"></span>
																		</div>
																	<span class="btn btn-default btn-file">
																		<span class="fileupload-exists">Change</span>
																		<span class="fileupload-new">Select file</span>
																		<input id="inptFileChoice1" type="file" name="file_1">
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
																	<input id="WidthText1" type="text" name="Width1" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange1',this.value);">
																</div>

																<div class="col-md-3">
																	<input id="WidthRange1" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange1" onchange="updateValue('WidthText1',this.value);">
																	<label class="label label-default" for="" >Width</label>
																</div>

																<div class=".col-md-2 .ml-auto float-left" >
																	<div class="input-append">
																		<div class="col-md-2" style="margin-left:60px;">
																			<input id="HeightText1" type="text" name="height1" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange1',this.value);">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<input id="HeightRange1" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange1" onchange="updateValue('HeightText1',this.value);">
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


														  <br>


														  <div class="row">
															  <div class="form-group">
																  <div class="col-md-4">
																	  <input type="text" name="choice2" placeholder="Second Choice" class="form-control">
																  </div>

																  <div class="col-md-2">
																	  <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																		  <input type="checkbox"  name="choice2_correct" class="chb">
																		  <label for="choice2_correct">is correct</label>
																	  </div></div>


																  <div class=".col-md-6 .ml-auto">
																	  <div class="fileupload fileupload-new" data-provides="fileupload">
																		  <div class="input-append">
																			  <div class="uneditable-input">
																				  <i class="fa fa-file fileupload-exists"></i>
																				  <span class="fileupload-preview"></span>
																			  </div>
																			  	<span class="btn btn-default btn-file">
																				<span class="fileupload-exists">Change</span>
																				<span class="fileupload-new">Select file</span>
																				<input id="inptFileChoice2" type="file" name="file_2">
				</span>
																				<a href="#" id="choice2ImageRemove" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
																				<button id="Preview2" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>
																			  
																		  </div>
																	  </div>
																  </div>
															  </div>
														  </div>

														<div id="ImageControle2" style="margin-top:15px;">

															<div class="row">
																<div class="form-group">
																	<div class="col-md-2">
																		<input id="WidthText2" type="text" name="Width2" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange2',this.value);">
																	</div>

																	<div class="col-md-3">
																		<input id="WidthRange2" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange2" onchange="updateValue('WidthText2',this.value);">
																		<label class="label label-default" for="" >Width</label>
																	</div>

																	<div class=".col-md-2 .ml-auto float-left" >
																		<div class="input-append">
																			<div class="col-md-2" style="margin-left:60px;">
																				<input id="HeightText2" type="text" name="height2" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange2',this.value);">
																			</div>
																		</div>
																		<div class="col-md-3">
																			<input id="HeightRange2" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange2" onchange="updateValue('HeightText2',this.value);">
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

											  <br>

<?php //add choice 3 and 4 ?>
<?php //add choice 3?>
														<div class="row">
														  <div class="form-group">
															  <div class="col-md-4">
																  <input type="text" name="choice3" placeholder="Third  Choice" class="form-control">
															  </div>

															  <div class="col-md-2">
																  <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	  <input type="checkbox"  name="choice3_correct" class="chb">
																	  <label for="choice3_correct">is correct</label>
																  </div></div>



																	  <div class=".col-md-4 .ml-auto fileupload fileupload-new float-left" data-provides="fileupload">
																		  <div class="input-append">
																			  <div class="uneditable-input">
																				  <i class="fa fa-file fileupload-exists"></i>
																				  <span class="fileupload-preview"></span>
																			  </div>
																			  <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input id="inptFileChoice3" type="file" name="file_3">
															</span>
																				<a href="#" id="choice3ImageRemove" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
																				<button id="Preview3" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>
																		  </div>
																	  </div>

														  </div>
													</div>
													<div id="ImageControle3" style="margin-top:15px;">

														<div class="row">
															<div class="form-group">
																<div class="col-md-2">
																	<input id="WidthText3" type="text" name="Width3" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange3',this.value);">
																</div>

																<div class="col-md-3">
																	<input id="WidthRange3" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange3" onchange="updateValue('WidthText3',this.value);">
																	<label class="label label-default" for="" >Width</label>
																</div>

																<div class=".col-md-2 .ml-auto float-left" >
																	<div class="input-append">
																		<div class="col-md-2" style="margin-left:60px;">
																			<input id="HeightText3" type="text" name="height3" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange3',this.value);">
																		</div>
																	</div>
																	<div class="col-md-3">
																		<input id="HeightRange3" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange3" onchange="updateValue('HeightText3',this.value);">
																		<label class="label label-default" for="" >Height</label>
																	</div>
																</div>

															</div>
														</div>




														<div id="previewImage3" class="panel panel-default image-preview" >
															<img id="choice3Image" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
															<span id="DefultImagText3" calss="defult-imag-text">Image Preview</span>
														</div>
													</div>								
													</br>
<?php //add choice 4?>
														<div class="row">
														  <div class="form-group">
															  <div class="col-md-4">
																  <input type="text" name="choice4" placeholder="fourth  Choice" class="form-control">
															  </div>

															  <div class="col-md-2">
																  <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	  <input type="checkbox"  name="choice4_correct" class="chb">
																	  <label for="choice4_correct">is correct</label>
																  </div></div>



																	  <div class=".col-md-4 .ml-auto fileupload fileupload-new float-left" data-provides="fileupload">
																		  <div class="input-append">
																			  <div class="uneditable-input">
																				  <i class="fa fa-file fileupload-exists"></i>
																				  <span class="fileupload-preview"></span>
																			  </div>
																			  <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input id="inptFileChoice4" type="file" name="file_4">
															</span>
																				<a href="#" id="choice4ImageRemove" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
																				<button id="Preview4" type="button" class="btn btn-success" style="margin-left:5px;">Preview</button>
																		  </div>
																	  </div>

														  </div>
														</div>
											</div>

											<div id="ImageControle4" style="margin-top:15px;">

												<div class="row">
													<div class="form-group">
														<div class="col-md-2">
															<input id="WidthText4" type="text" name="Width4" placeholder="Width" class="form-control" value="200" onchange="updateValue('WidthRange4',this.value);">
														</div>

														<div class="col-md-3">
															<input id="WidthRange4" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="widthRange4" onchange="updateValue('WidthText4',this.value);">
															<label class="label label-default" for="" >Width</label>
														</div>

														<div class=".col-md-2 .ml-auto float-left" >
															<div class="input-append">
																<div class="col-md-2" style="margin-left:60px;">
																	<input id="HeightText4" type="text" name="height4" placeholder="Height" class="form-control" value="200"  onchange="updateValue('HeightRange4',this.value);">
																</div>
															</div>
															<div class="col-md-3">
																<input id="HeightRange4" style=" margin-bottom:5px;" type="range" min="0" max="850" value="200" name="heightRange4" onchange="updateValue('HeightText4',this.value);">
																<label class="label label-default" for="" >Height</label>
															</div>
														</div>

													</div>
												</div>




												<div id="previewImage4" class="panel panel-default image-preview" >
													<img id="choice4Image" src="" alt="Image Preview" width="" height="" style="width:100%; height:100%;padding:2px;display:none;">
													<span id="DefultImagText4" calss="defult-imag-text">Image Preview</span>
												</div>
											</div>	
													</br>

								  <div class="modal-footer">
									  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									  <button type="submit" class="btn btn-primary" id="">Add Question</button>
								  </div>
								  </form>
								  </div>
							  </div>
						  </div>
					  </div>
						</div>
								</div>

							</section>
						</div>
					</div>


	<!--Modal -->
	<!-- edit existing group-->
	<div class="modal fade" id="edit_question" tabindex="-1" role="dialog" aria-labelledby="edit_question" aria-hidden="true">
		<div class="modal-dialog" role="document" style="width:900px;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Update Question</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form  id="edit_question_form" action="{{route('questions.update_ajax')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-gذroup">
							<label for="recipient-name" class="col-form-label">Question Title:</label>
							<!--<input type="text" class="form-control" id="question-title" name="title">-->
							<textarea class="form-control" name="title" rows="5" placeholder="Question Title" id="question-title"></textarea>
							<input type="hidden" id="id" name="id" >
						</div>
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Question Score:</label>
							<input  type="number" min =0 value="20" class="form-control" name="score">
						</div>
						<div class="form-group" style="margin-top:10px;">
							<div class=".col-md-12 .ml-auto">
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

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="edit_question">Update Question</button>
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

@endsection

@section('script')
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#is_para').attr('checked', 'checked');
			$('#autoUpdate').fadeOut();
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
			$('#add_question_form').on('submit', function(e) {
				var form = $(this);
				var data = new FormData(form);
				var url = form.prop('action');
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: function(response) {
						$('#add_question').modal('hide');
						location.reload(true);
					},
					cache: false,

					error: function() {
						alert('Error');

					}
				});
				return false;
			});
		});


	</script>

	<!--<script type="text/javascript">
		$(function() {
			$('#edit_question_form').on('submit', function(e) {
				var form = $(this);
				var data = new FormData(form);
				var url = form.prop('action');
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: function(response) {
						$('#edit_question').modal('hide');
						$('#name_' + response.id).text(response.title);
						$('#edit_' + response.id).data('name' ,response.title);
						$('#delete_' + response.id).data('name' ,response.title);
						console.log(response);
					},
					error: function() {
						alert('Error');

					}
				});
				return false;
			});
		});
	</script>-->

	<script>
		$(document).ready(function(){
			$('.fa-pencil').on('click' , function (e) {
				$('#id').val($(this).data('id'));
				$('#question-title').val('');
				
			} );
		});
	</script>
	<script type="text/javascript">
		$(document).on('click', '.delete', function (e) {
			$('.did').val($(this).data('id'));
			$('.dname').text("Are you sure you want to delete "+$(this).data('name') + ' Question ?');
			$('#myModal').modal('show');
		});
		$('.modal-footer').on('click', '#yes', function() {
			$('#myModal').modal('hide');
			var id = $('.did').val();
			var url = '{{route('questions.destroy' , ":id")}}';
			url = url.replace(':id', id);
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

						$('#question_show').hide();
					}
					console.log(data);
				}
			});
		});

		// Yahia
		// this foloing code will allow for checkboxs to behave as radio button
		// so on check box will be selected
		// if we want to behave like that from serve we need to change them to radio button

		// this function to change the value in width & hight when changed on textbox and range
		function updateValue(id,val){
			document.getElementById(id).value=val;
		}

		//this code to preview the image be#fore uplaod
		// id = ImageControl conatn image , rezsie controle (range inputs)
		//
		//$('#autoUpdate').fadeOut('slow');
		 var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
		 var ImageControle = $("#ImageControle");
		 var WidthText = $("#WidthText");
		 var WidthRange = $("#WidthRange");
		 var HeightText = $("#HeightText");
		 var HeightRange =$("#HeightRange");
		 var Preview = $('#Preview'); // button
		 var previewImage= $('#previewImage'); // div
		 var questionImage= $('#questionImage'); //img tag had src attr
		 var inptFileQuestion = $('#inptFileQuestion'); // img input for question
		 var DefultImagText = $('#DefultImagText');
		 var questionImageRemove = $('#questionImageRemove');
		 ImageControle.hide('slow');
		//  setImgAttr('display','none');

		Preview.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle.show('slow');
				// setImgAttr('display',null);
				Preview.html('Hide');
				state=2;
			}else{
				ImageControle.hide('slow');
				Preview.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
		});

		$( "#previewImage" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText').value=width;
			document.getElementById('WidthRange').value=width;
			document.getElementById('HeightText').value=height;
			document.getElementById('HeightRange').value=height;
			previewImage.css('width',width);
			previewImage.css('height',height);
			$("#questionImage").attr('width',width);
			$("#questionImage").css('width',width);
			$("#questionImage").attr('height',height);
			$("#questionImage").css('height',height);

		}});

		$(WidthRange).change(function(){
			$( "#previewImage" ).css('width',WidthRange.val());
			$( "#questionImage" ).attr('width',WidthRange.val());
			$( "#questionImage" ).css('width',WidthRange.val());

		});
		$(WidthText).change(function(){
			document.getElementById('WidthText').value>850?document.getElementById('WidthText').value=850:document.getElementById('WidthText').value;
			document.getElementById('WidthText').value<0?document.getElementById('WidthText').value=0:document.getElementById('WidthText').value;
			document.getElementById('WidthText').value==""||null?document.getElementById('WidthText').value=0:document.getElementById('WidthText').value;
			$( "#previewImage" ).css('width',WidthText.val());
			$( "#questionImage" ).attr('width',WidthText.val());
			$( "#questionImage" ).css('width',WidthText.val());
		});
		$(HeightRange).change(function(){
			$( "#previewImage" ).css('height',HeightRange.val());
			$( "#questionImage" ).attr('height',HeightRange.val());
			$( "#questionImage" ).css('height',HeightRange.val());

		});
		$(HeightText).change(function(){
			document.getElementById('HeightText').value>850?document.getElementById('HeightText').value=850:document.getElementById('HeightText').value;
			document.getElementById('HeightText').value<0?document.getElementById('HeightText').value=0:document.getElementById('HeightText').value;
			document.getElementById('HeightText').value==""||null?document.getElementById('HeightText').value=0:document.getElementById('HeightText').value;
			$( "#previewImage" ).css('height',HeightText.val());
			$( "#questionImage" ).attr('height',HeightText.val());
			$( "#questionImage" ).css('height',HeightText.val());
		});

		inptFileQuestion.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText.css('display','none');
				questionImage.css('display','block');
				reader.addEventListener('load',function(){
					questionImage.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
		});
		questionImageRemove.on('click',function(){
			// restore defult 
			DefultImagText.css('display','block');
			questionImage.css('display','none');
			questionImage.attr('src',null);
			document.getElementById('WidthText').value=500;
			document.getElementById('WidthRange').value=500;
			document.getElementById('HeightText').value=300;
			document.getElementById('HeightRange').value=300;
			$("#questionImage").attr('width',500);
			$("#questionImage").css('width',500);
			$("#questionImage").attr('height',300);
			$("#questionImage").css('height',300);
			previewImage.attr('width',500);
			previewImage.css('width',500);
			previewImage.attr('height',300);
			previewImage.css('height',300);
		});

// preview image for edit  question form 
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var	ImageControleEdit = $("#ImageControleEdit");
	var	WidthText0 = $("#WidthText0");
	var	WidthRange0 = $("#WidthRange0");
	var	HeightText0 = $("#HeightText0");
	var	HeightRange0 =$("#HeightRange0");
	var	Preview0 = $('#Preview0'); // button
	var	previewImage0= $('#previewImage0'); // div
	var	questionImage0= $('#questionImage0'); //img tag had src attr
	var	inptFile = $('#inptFile'); // img input for question
	var	DefultImagText0 = $('#DefultImagText0');
	var	questionImageRemove0 = $('#questionImageRemove0');
	ImageControleEdit.hide('slow'); 

	Preview0.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControleEdit.show('slow');
				// setImgAttr('display',null);
				Preview0.html('Hide');
				state=2;
			}else{
				ImageControleEdit.hide('slow');
				Preview0.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
		});

		$( "#previewImage0" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText0').value=width;
			document.getElementById('WidthRange0').value=width;
			document.getElementById('HeightText0').value=height;
			document.getElementById('HeightRange0').value=height;
			previewImage0.css('width',width);
			previewImage0.css('height',height);
			$("#questionImage0").attr('width',width);
			$("#questionImage0").css('width',width);
			$("#questionImage0").attr('height',height);
			$("#questionImage0").css('height',height);

		}});

		$(WidthRange0).change(function(){
			$( "#previewImage0" ).css('width',WidthRange0.val());
			$( "#questionImage0" ).attr('width',WidthRange0.val());
			$( "#questionImage0" ).css('width',WidthRange0.val());

		});
		
		$(WidthText0).change(function(){
			document.getElementById('WidthText0').value>850?document.getElementById('WidthText0').value=850:document.getElementById('HeightText0').value;
			document.getElementById('WidthText0').value<0?document.getElementById('WidthText0').value=0:document.getElementById('HeightText0').value;
			document.getElementById('WidthText0').value==""||null?document.getElementById('WidthText0').value=0:document.getElementById('WidthText0').value;
			$( "#previewImage0" ).css('width',WidthRange0.val());
			$( "#questionImage0" ).attr('width',WidthRange0.val());
			$( "#questionImage0" ).css('width',WidthRange0.val());
		});
		
		$(HeightRange0).change(function(){
			$( "#previewImage0" ).css('height',HeightRange0.val());
			$( "#questionImage0" ).attr('height',HeightRange0.val());
			$( "#questionImage0" ).css('height',HeightRange0.val());

		});
		$(HeightText0).change(function(){
			document.getElementById('HeightText0').value>850?document.getElementById('HeightText0').value=850:document.getElementById('HeightText0').value;
			document.getElementById('HeightText0').value<0?document.getElementById('HeightText0').value=0:document.getElementById('HeightText0').value;
			document.getElementById('HeightText0').value==""||null?document.getElementById('HeightText0').value=0:document.getElementById('HeightText0').value;
			$( "#previewImage0" ).css('height',HeightText0.val());
			$( "#questionImage0" ).attr('height',HeightText0.val());
			$( "#questionImage0" ).css('height',HeightText0.val());
		});

		inptFile.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText0.css('display','none');
				questionImage0.css('display','block');
				reader.addEventListener('load',function(){
					questionImage0.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
		});
		questionImageRemove0.on('click',function(){
			// restore defult 
			DefultImagText0.css('display','block');
			questionImage0.css('display','none');
			questionImage0.attr('src',null);
			document.getElementById('WidthText0').value=500;
			document.getElementById('WidthRange0').value=500;
			document.getElementById('HeightText0').value=300;
			document.getElementById('HeightRange0').value=300;
			$("#questionImage0").attr('width',500);
			$("#questionImage0").css('width',500);
			$("#questionImage0").attr('height',300);
			$("#questionImage0").css('height',300);
			previewImage0.attr('width',500);
			previewImage0.css('width',500);
			previewImage0.attr('height',300);
			previewImage0.css('height',300);
		});
		 
// preoview choice 1 image 
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
			$( "#choice1Image" ).attr('width',WidthRange1.val());
			$( "#choice1Image" ).css('width',WidthRange1.val());

		});
	$(WidthText1).change(function(){
		document.getElementById('WidthText1').value>850?document.getElementById('WidthText1').value=850:document.getElementById('WidthText1').value;
		document.getElementById('WidthText1').value<0?document.getElementById('WidthText1').value=0:document.getElementById('WidthText1').value;
		document.getElementById('WidthText1').value==""||null?document.getElementById('WidthText1').value=0:document.getElementById('WidthText1').value;
		$( "#previewImage1" ).css('width',WidthText1.val());
		$( "#choice1Image" ).attr('width',WidthText1.val());
		$( "#choice1Image" ).css('width',WidthText1.val());
	});
	$(HeightRange1).change(function(){
		$( "#previewImage1" ).css('height',HeightRange1.val());
		$( "#choice1Image" ).attr('height',HeightRange1.val());
		$( "#choice1Image" ).css('height',HeightRange1.val());

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

// preoview choice 2 image 
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

//choice 3 image preview 
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle3 = $("#ImageControle3");
	var WidthText3 = $("#WidthText3");
	var WidthRange3 = $("#WidthRange3");
	var HeightText3 = $("#HeightText3");
	var HeightRange3 =$("#HeightRange3");
	var Preview3 = $('#Preview3'); // button
	var previewImage3= $('#previewImage3'); // div
	var choice3Image= $('#choice3Image'); //img tag had src attr
	var inptFileChoice3 = $('#inptFileChoice3'); // img input for question
	var DefultImagText3 = $('#DefultImagText3');
	var choice3ImageRemove = $('#choice3ImageRemove');
	ImageControle3.hide('slow');
	$("#choice3Image").attr('width',200);
	$("#choice3Image").css('width',200);
	$("#choice3Image").attr('height',200);
	$("#choice3Image").css('height',200);
	previewImage3.attr('width',200);
	previewImage3.css('width',200);
	previewImage3.attr('height',200);
	previewImage3.css('height',200);

	Preview3.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle3.show('slow');
				// setImgAttr('display',null);
				Preview3.html('Hide');
				state=2;
			}else{
				ImageControle3.hide('slow');
				Preview3.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage3" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText3').value=width;
			document.getElementById('WidthRange3').value=width;
			document.getElementById('HeightText3').value=height;
			document.getElementById('HeightRange3').value=height;
			previewImage3.css('width',width);
			previewImage3.css('height',height);
			$("#choice3Image").attr('width',width);
			$("#choice3Image").css('width',width);
			$("#choice3Image").attr('height',height);
			$("#choice3Image").css('height',height);

	}});

	$(WidthRange3).change(function(){
			$( "#previewImage3" ).css('width',WidthRange3.val());
			$( "#choice3Image" ).attr('width',WidthRange3.val());
			$( "#choice3Image" ).css('width',WidthRange3.val());

		});
	$(WidthText3).change(function(){
		document.getElementById('WidthText3').value>850?document.getElementById('WidthText3').value=850:document.getElementById('WidthText3').value;
		document.getElementById('WidthText3').value<0?document.getElementById('WidthText3').value=0:document.getElementById('WidthText3').value;
		document.getElementById('WidthText3').value==""||null?document.getElementById('WidthText3').value=0:document.getElementById('WidthText3').value;
		$( "#previewImage3" ).css('width',WidthText3.val());
		$( "#choice3Image" ).attr('width',WidthText3.val());
		$( "#choice3Image" ).css('width',WidthText3.val());
	});
	$(HeightRange3).change(function(){
		$( "#previewImage3" ).css('height',HeightRange3.val());
		$( "#choice3Image" ).attr('height',HeightRange3.val());
		$( "#choice3Image" ).css('height',HeightRange3.val());

	});
	$(HeightText3).change(function(){
		document.getElementById('HeightText3').value>850?document.getElementById('HeightText3').value=850:document.getElementById('HeightText3').value;
		document.getElementById('HeightText3').value<0?document.getElementById('HeightText3').value=0:document.getElementById('HeightText3').value;
		document.getElementById('HeightText3').value==""||null?document.getElementById('HeightText3').value=0:document.getElementById('HeightText3').value;
		$( "#previewImage3" ).css('height',HeightText3.val());
		$( "#choice3Image" ).attr('height',HeightText3.val());
		$( "#choice3Image" ).css('height',HeightText3.val());
	});
	inptFileChoice3.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText3.css('display','none');
				choice3Image.css('display','block');
				reader.addEventListener('load',function(){
					choice3Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice3ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText3.css('display','block');
		choice3Image.css('display','none');
		choice3Image.attr('src',null);
		document.getElementById('WidthText3').value=200;
		document.getElementById('WidthRange3').value=200;
		document.getElementById('HeightText3').value=200;
		document.getElementById('HeightRange3').value=200;
		$("#choice3Image").attr('width',200);
		$("#choice3Image").css('width',200);
		$("#choice3Image").attr('height',200);
		$("#choice3Image").css('height',200);
		previewImage3.attr('width',200);
		previewImage3.css('width',200);
		previewImage3.attr('height',200);
		previewImage3.css('height',200);
	});

// Preview image chice 4
var state=1 ; // state = 1 hide/fadeOut state = 2 show/fade in
	var ImageControle4 = $("#ImageControle4");
	var WidthText4 = $("#WidthText4");
	var WidthRange4 = $("#WidthRange4");
	var HeightText4 = $("#HeightText4");
	var HeightRange4 =$("#HeightRange4");
	var Preview4 = $('#Preview4'); // button
	var previewImage4= $('#previewImage4'); // div
	var choice4Image= $('#choice4Image'); //img tag had src attr
	var inptFileChoice4 = $('#inptFileChoice4'); // img input for question
	var DefultImagText4 = $('#DefultImagText4');
	var choice4ImageRemove = $('#choice4ImageRemove');
	ImageControle4.hide('slow');
	$("#choice4Image").attr('width',200);
	$("#choice4Image").css('width',200);
	$("#choice4Image").attr('height',200);
	$("#choice4Image").css('height',200);
	previewImage4.attr('width',200);
	previewImage4.css('width',200);
	previewImage4.attr('height',200);
	previewImage4.css('height',200);

	Preview4.on('click',function(e){
			e.preventDefault();
			// state = state==1?2:1; // togel ths state on click
			if(state==1){
				ImageControle4.show('slow');
				// setImgAttr('display',null);
				Preview4.html('Hide');
				state=2;
			}else{
				ImageControle4.hide('slow');
				Preview4.html('Preview')
				// setImgAttr('display','none');
				state=1;
			}
	});

	$( "#previewImage4" ).resizable({stop: function(event, ui){
			var width = $(event.target).width();
			var height = $(event.target).height();
			width>850  ? width  = 850 : width  = $(event.target).width();
			height>850 ? height = 850 : height = $(event.target).height();
			document.getElementById('WidthText4').value=width;
			document.getElementById('WidthRange4').value=width;
			document.getElementById('HeightText4').value=height;
			document.getElementById('HeightRange4').value=height;
			previewImage4.css('width',width);
			previewImage4.css('height',height);
			$("#choice4Image").attr('width',width);
			$("#choice4Image").css('width',width);
			$("#choice4Image").attr('height',height);
			$("#choice4Image").css('height',height);

	}});

	$(WidthRange4).change(function(){
			$( "#previewImage4" ).css('width',WidthRange4.val());
			$( "#choice4Image" ).attr('width',WidthRange4.val());
			$( "#choice4Image" ).css('width',WidthRange4.val());

		});
	$(WidthText4).change(function(){
		document.getElementById('WidthText4').value>850?document.getElementById('WidthText4').value=850:document.getElementById('WidthText4').value;
		document.getElementById('WidthText4').value<0?document.getElementById('WidthText4').value=0:document.getElementById('WidthText4').value;
		document.getElementById('WidthText4').value==""||null?document.getElementById('WidthText4').value=0:document.getElementById('WidthText4').value;
		$( "#previewImage4" ).css('width',WidthText4.val());
		$( "#choice4Image" ).attr('width',WidthText4.val());
		$( "#choice4Image" ).css('width',WidthText4.val());
	});
	$(HeightRange4).change(function(){
		$( "#previewImage4" ).css('height',HeightRange4.val());
		$( "#choice4Image" ).attr('height',HeightRange4.val());
		$( "#choice4Image" ).css('height',HeightRange4.val());

	});
	$(HeightText4).change(function(){
		document.getElementById('HeightText4').value>850?document.getElementById('HeightText4').value=850:document.getElementById('HeightText4').value;
		document.getElementById('HeightText4').value<0?document.getElementById('HeightText4').value=0:document.getElementById('HeightText4').value;
		document.getElementById('HeightText4').value==""||null?document.getElementById('HeightText4').value=0:document.getElementById('HeightText4').value;
		$( "#previewImage4" ).css('height',HeightText4.val());
		$( "#choice4Image" ).attr('height',HeightText4.val());
		$( "#choice4Image" ).css('height',HeightText4.val());
	});
	inptFileChoice4.change(function(){
			var file = this.files[0];
			if(file){
				var reader = new FileReader();
				DefultImagText4.css('display','none');
				choice4Image.css('display','block');
				reader.addEventListener('load',function(){
					choice4Image.attr('src',this.result);
				});
				reader.readAsDataURL(file);
			}
	});

	choice4ImageRemove.on('click',function(){
		// restore defult 
		DefultImagText4.css('display','block');
		choice4Image.css('display','none');
		choice4Image.attr('src',null);
		document.getElementById('WidthText4').value=200;
		document.getElementById('WidthRange4').value=200;
		document.getElementById('HeightText4').value=200;
		document.getElementById('HeightRange4').value=200;
		$("#choice4Image").attr('width',200);
		$("#choice4Image").css('width',200);
		$("#choice4Image").attr('height',200);
		$("#choice4Image").css('height',200);
		previewImage4.attr('width',200);
		previewImage4.css('width',200);
		previewImage4.attr('height',200);
		previewImage4.css('height',200);
	});
</script>
<script>
		$(".chb").change(function(){
			$(".chb").prop('checked',false);
			$(this).prop('checked',true);
		});
</script>
	@endsection.
