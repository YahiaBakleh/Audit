@extends('admin.layouts.app')
@section('title')
    User
@endsection

@section('content')
   <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('users.create')}}">
                <div class="btn btn-primary">New User</div>
            </a>
        </div>
    </div>
    <br>
@if( (count($users)) !=0)
	<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<a href="#" class="fa fa-times"></a>
				</div>

				<h2 class="panel-title">Users</h2>
			</header>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table mb-none">
						<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>

							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$loop->index + 1}}</td>
				      		<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>

							<td class="actions">

					<a href="{{route('users.show' , ['user' => $user])}}"><i class="fa fa-user"></i></a>

					<a href="{{route('users.edit' , ['user' => $user])}}"><i class="fa fa-pencil"></i></a>
					<i class="fa fa-trash-o on"  style="color: red"
					onclick="delete_user({{$user->id}})">
<form id="submiter_user{{$user->id}}" class="liner hidden-item" action="{{ route('users.destroy',['user'=> $user]) }}" method="post">
	{{ csrf_field() }}
	{{method_field('DELETE')}}
								</form>
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
	</div>

						@else
						<div class="col-md-12 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-secondary">
												<div class="widget-summary">
													<div class="widget-summary-col">
														<strong style="text-center"> No Users yet</strong>
														
													</div>
												</div>
											</div>
										</section>
									</div>
						@endif

						
@endsection

@section('script')
	<script type="text/javascript">
		function delete_user(id) {
			var h = false;
			Swal.fire({
				title: 'Are you sure ?',
				type: 'warning',
				focusConfirm: false,
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				preConfirm: () => {
					$("#submiter_user" + id).submit();
		}
		})
		}
	</script>
	@endsection