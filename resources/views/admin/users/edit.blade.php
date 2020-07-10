@extends('admin.layouts.app')
@section('title')
    User
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<form class="form-material form-group" method="post" action="{{route('users.update',['user'=>$user])}}">
				{{ csrf_field() }}
				{{method_field('PATCH')}}
				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="fa fa-caret-down"></a>
							<a href="#" class="fa fa-times"></a>
						</div>
						<h2 class="panel-title">Edit User</h2>
						<p class="panel-subtitle">
							Edit  {{$user->name}} Information
						</p>
					</header>
					<div class="panel-body">
						<div class="row form-group">
							<div class="col-lg-12">
								<input type="text" name="name" value="{{$user->name}}" placeholder="User Name" class="form-control">
							</div>

							<div class="mb-md hidden-lg hidden-xl"></div>
						</div>
						<div class="row form-group">
							<div class="col-lg-12">
								<input type="email" name="email" value="{{$user->email}}" placeholder="User Email" class="form-control">
							</div>

							<div class="mb-md hidden-lg hidden-xl"></div>
						</div>


							<div class="row form-group">
								<div class="col-lg-12">
									<input type="text" id="password" name="password" placeholder="User Password" class="form-control">
								</div>

								<div class="mb-md hidden-lg hidden-xl"></div>
							</div>

						<div class="row form-group">
							<div class="col-lg-12">
								<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
									<input type="checkbox"   id="generate_password" name="generate_password">
									<label for="generate_password">Generate Password</label>
								</div></div>
							<div class="mb-md hidden-lg hidden-xl"></div>
						</div>




						<div class="row form-group">
							<div class="col-lg-12">
								<label>Attach Tests for the users </label>
							</div>

							<div class="mb-md hidden-lg hidden-xl"></div>
						</div>


                        <div class="row form-group">
                            <div class="col-lg-12">
                                <select class="select2 js-example-basic-multiple form-control" name="tests[]"
                                        multiple="multiple">
                                    @foreach($tests as $test)
                                        @if(in_array($test->id,$user->toDoTests()->pluck('tests.id')->toArray()))
                                            <option value="{{$test->id}}" selected>{{$test->name}}</option>
                                        @elseif(!in_array($test->id,$user->tests()->pluck('tests.id')->toArray()))
                                            <option value="{{$test->id}}">{{$test->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($user->doneTests()->count())
                                    <h4 class="text-info text-bold">Done Tests:
                                        @foreach($user->tests as $test)
                                            @if(!is_null($test->pivot->result))
                                                <span class="label label-info">{{ $test->name }} <i
                                                            class="fa fa-pencil"></i> {{ $test->pivot->result }}%</span>
                                            @endif
                                        @endforeach
                                    </h4>
                                @endif
                            </div>
                            <div class="mb-md hidden-lg hidden-xl"></div>
                        </div>

                    </div>
					<footer class="panel-footer">
						<button class="btn btn-primary">Update User</button>
					</footer>
				</section>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function(){

			$('#generate_password').change(function(){
				if(this.checked)
				{
					function makeid(length) {
						var text = "";
						var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

						for (var i = 0; i < length; i++)
							text += possible.charAt(Math.floor(Math.random() * possible.length));

						return text;
					}
					console.log(makeid(5));
					$('#password').val(makeid(10));
				}
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('.js-example-basic-multiple').select2();
		});
	</script>
@endsection