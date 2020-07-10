@extends('admin.layouts.app')
@section('title')
    Test
@endsection

@section('content')
<div class="row">
		<div class="col-md-12">
			 <form class="form-material form-group" method="post" action="{{route('tests.update',['test'=>$test])}}">
				 {{ csrf_field() }}
				 {{method_field('PATCH')}}
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
								<a href="#" class="fa fa-times"></a>
									</div>
							<h2 class="panel-title">Edit Test</h2>
										<p class="panel-subtitle">
											Edit The {{$test->name }}
										</p>
									</header>
									<div class="panel-body">
									<div class="row form-group">
										<div class="col-lg-12">
									<input type="text" name="name" value="{{$test->name}}" placeholder="Test Name" class="form-control">
												</div>
												<div class="mb-md hidden-lg hidden-xl"></div>
											</div>
										
									<div class="row">
										<div class="col-lg-12">
										<div class="form-group">
											<label class="col-md-3 control-label">Pick the test time </label>
												<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
	<input type="text" name="time" value="11:21"  data-plugin-timepicker="" class="form-control" data-plugin-options="{ &quot;showMeridian&quot;: false }">
													
												</div>
											</div>
									</div>
								</div><br>
										<div class="row">
											<div class="col-lg-12">
												<div class="form-group">
													<label class="col-md-3 control-label">Add Test Description </label>
												</div>
											</div>
										</div>

												<div class="row form-group">
														<div class="col-lg-12">
															<textarea id="summernote_desc" name="description">{{$test->description}}</textarea>

														</div>

											</div>
										<div class="row form-group">
											<div class="col-lg-12">
												<label  >Add Instructions for the test </label>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-lg-12">
												<textarea id="summernote_ins" name="instructions" >{{$test->instructions}}</textarea>

											</div>

										</div>
										</div>
										<footer class="panel-footer">
											<button class="btn btn-primary" id="update_test">Update Test</button>
										</footer>
								</section>
							</form>
						</div>
</div>
@endsection

@section('script')
@endsection

