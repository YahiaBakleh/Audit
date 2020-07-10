@extends('admin.layouts.app')
@section('title')
    Welcome Admin 

@endsection

@section('content')

    <div class="col-md-6 col-lg-6 col-xl-3">
        <section class="panel panel-horizontal">
            <header class="panel-heading bg-primary">
                <div class="panel-heading-icon">
                    <i class="fa  fa-bank (alias)"></i>
                </div>
            </header>
            <div class="panel-body p-lg">
                <h3 class="text-semibold mt-sm">Welcome </h3>
                <p>This admin panel is for BASSEL SALEH & CO website , you can modify the website content as well as creating tests and admins.</p>
            </div>
        </section>
    </div>

    <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('create')}}">
                <div class="btn btn-primary">New admin</div>
            </a>
        </div>
    </div>
    <br>
@if( (count($admins)) !=0)
	<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
					<div class="panel-actions">`
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Admins</h2>
			</header>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table mb-none">
						<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
						@foreach($admins as $admin)
						<tr>
							<td>{{$loop->index + 1}}</td>
				      		<td>{{$admin->name}}</td>
				      		<td>{{$admin->username}}</td>
							<td>{{$admin->email}}</td>
							

							<td class="actions">
							
					<a href="/admin/admins/{{$admin->id}}"><i class="fa fa-user"></i></a>
					<a href="/admin/admins/{{$admin->id}}/edit"><i class="fa fa-pencil"></i></a>
					<a href="#"> <i class="fa fa-trash-o on"  style="color: red"
					onclick="delete_admin({{$admin->id}})">
<form id="submiter_admin{{$admin->id}}" class="liner hidden-item" action="/admin/admins/{{$admin->id}}" method="post">
	{{ csrf_field() }}
	{{method_field('DELETE')}}
								</form>
								</i></a>
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
														<strong style="text-center"> No admins yet</strong>
														
													</div>
												</div>
											</div>
										</section>
									</div>
						@endif

						
@endsection

@section('script')
	<script type="text/javascript">
		function delete_admin(id) {
			var h = false;
			Swal.fire({
				title: 'Are you sure ?',
				type: 'warning',
				focusConfirm: false,
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, cancel!',
				preConfirm: () => {
					$("#submiter_admin" + id).submit();
		}
		})
		}
	</script>
	@endsection