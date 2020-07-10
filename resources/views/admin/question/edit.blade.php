@extends('admin.layouts.app')
@section('title')
    Question
@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			 <form class="form-material form-group" method="post" action="{{route('questions.store')}}">
				 {{ csrf_field() }}
							<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
									<h2 class="panel-title">Update Question to {{$question->test->name}} Test</h2>
									</header>

										<div class="panel-body">
											<div class="row form-group">
												<div class="col-lg-12">
									<input type="text" name="title" value="{{$question->title}}" placeholder="Question Title" class="form-control">
													
												</div>


												<div class="mb-md hidden-lg hidden-xl"></div>
												</div>

												<div class="row form-group">
												<div class="col-lg-12">
										<input type="number" name="score" value="{{$question->score}}" placeholder="Question Score" class="form-control">
													
												</div>


												<div class="mb-md hidden-lg hidden-xl"></div>
												</div>

												<div class="row form-group">
													<div class="col-lg-12">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
													@if($question->is_paraghraph != null)
											<input type="checkbox"   id="is_para" name="is_paraghraph" checked>
											@else
											<input type="checkbox"   id="is_para" name="is_paraghraph" >
											@endif
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

												<div class="mb-md hidden-lg hidden-xl"></div></div>
												<div class="row form-group">

												<div class="col-lg-2">
													<input type="text" name="choice2" placeholder="Second Choice" class="form-control">
												</div>
												<div class="col-lg-2">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type="checkbox"  name="choice2_correct">
											<label for="choice2_correct">is correct</label>
										</div></div>

												<div class="mb-md hidden-lg hidden-xl"></div></div>
												<div class="row form-group">

												<div class="col-lg-2">
													<input type="text" name="choice3" placeholder="Third Choice" class="form-control">
												</div><div class="col-lg-2">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type="checkbox"  name="choice3_correct">
											<label for="choice3_correct">is correct</label>
										</div></div></div>
									</div>
											</div>
											
										</div>
										<footer class="panel-footer">
											<button class="btn btn-primary">Add Question</button>
										</footer>
								</section>
							</form>
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

