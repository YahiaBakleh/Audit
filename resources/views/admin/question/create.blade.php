@extends('admin.layouts.app')
@section('title')
    Question
@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			 <form class="form-material form-group" method="post" action="{{route('questions.store')}}"  enctype="multipart/form-data">
				 {{ csrf_field() }}
				 {{method_field('POST')}}
							<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Add Question to {{$test->name}}</h2>
									</header>

										<div class="panel-body">
											<div class="row form-group">
												<div class="col-lg-12">


							<textarea class="form-control" name="title" rows="5" placeholder="Question Title"></textarea>
													<input type="hidden" name="test_id" value="{{$test->id}}">
												</div>


								<div class="mb-md hidden-lg hidden-xl"></div>
									</div>

									<div class="row form-group">
										<div class="col-lg-12">
											<input type="number" name="score" placeholder="Question Score" class="form-control">
										</div>
										<div class="mb-md hidden-lg hidden-xl"></div>
												</div>

												<div class="row form-group">
												<label class="col-md-12 control-label">File Upload</label>
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
													<input type="file" name="question_upload">
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
											</div>

											<div class="mb-md hidden-lg hidden-xl"></div>
												<div class="row form-group">
													<div class="col-lg-12">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type="checkbox"   id="is_para" name="is_paraghraph">
											<label for="is_paraghraph">is Paraghraph</label>
										</div></div>
												</div>
												<div id="autoUpdate">
												<div class="row form-group">
												<div class="col-lg-2">
													<input type="text" name="choice1" placeholder="Firs Choice" class="form-control">
												</div>
												<div class="col-lg-2">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type="checkbox"  name="choice1_correct">
											<label for="choice1_correct">is correct</label>
										</div></div>
												<div class="mb-md hidden-lg hidden-xl"></div>
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
																<input type="file" name="file_1">
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
														</div>
													</div>
												</div>
												</div>
												<div class="row form-group">
												<div class="col-lg-2">
													<input type="text" name="choice2" placeholder="Second Choice" class="form-control">
												</div>
												<div class="col-lg-2">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type="checkbox"  name="choice2_correct">
											<label for="choice2_correct">is correct</label>
										</div></div>

												<div class="mb-md hidden-lg hidden-xl"></div>
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
				<input type="file" name="file_2">
			</span>
			<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
		</div>
	</div>
</div></div></div></div>
										<footer class="panel-footer">
											<button class="btn btn-primary">Add Question</button>
										</footer>
								</section>
							</form>
</div>
</div>
@endsection

@section('script')
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
@endsection

