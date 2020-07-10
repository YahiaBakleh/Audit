@extends('admin.layouts.app')
@section('title')
    Test
    @section('style')
    <style type="text/css">
    div.b {
  
 right: 150px;
  
} 
</style>
    @endsection
@endsection

@section('content')
   <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('tests.create')}}">
                <div class="btn btn-primary">New Test</div>
            </a>
        </div>
    </div>
    <br>
@if( (count($tests)) !=0)
<div class="row">
@foreach ($tests as $test)

							<div class="col-md-6">
							<section class="panel panel-tertiary">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<a href="{{route('tests.show',['test' =>$test])}}"><h2 class="panel-title">{{$test->name}}</h2></a>
									<p class="panel-subtitle">{{$test->type}}</p>
								</header>
								<div class="panel-body">
									<p class="text-muted">
										<code>Description</code>
										<br>{{$test->description}}
									</p>
									 <div class="row">
            <div class="col-md-4">
   <form id="submiter" class="liner hidden-item" action="{{ route('tests.destroy',['test'=> $test]) }}" method="post">
	   {{ csrf_field() }}
	   {{method_field('DELETE')}}
                              <div class="btn btn-danger" onclick="triggerDeleteAlert()">Delete Test </div>
                            </form>
                            </div>

                           
 
 <div class="col-md-4">
                            <a class="no-style-a" href="{{route('tests.edit' ,['test' => $test])}}">
                                <div class="btn btn-warning">Update Test</div>
                            </a>
                        </div>
                        </div>
									
								</div>
							</section>
						</div>
										

						@endforeach
						</div>
						@else
						<div class="col-md-12 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-secondary">
												<div class="widget-summary">
												
													<div class="widget-summary-col">
														
															<strong style="text-center"> No Tests yet</strong>
														
													</div>
												</div>
											</div>
										</section>
									</div>
						@endif

						
@endsection


