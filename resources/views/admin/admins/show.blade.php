@extends('admin.layouts.app')
@section('title')
  Admin
@endsection

@section('content')
   <div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('create')}}">
                <div class="btn btn-primary">New Admin</div>
            </a>
        </div>
    </div>

   <div class="row">
       <div class="col-md-12">
           <section class="panel ">
               <header class="panel-heading">
                   <div class="panel-actions">
                       <a href="#" class="fa fa-caret-down"></a>
                       <a href="#" class="fa fa-times"></a>
                   </div>

                   <h2 class="panel-title">{{$admin->name}}</h2>

               </header>
               <div class="panel-body">
                   <p class="text-muted">
                   <h4> <b>User Name :</b></h4>
                   <p>{{$admin->username}}</p>
                   </p>
                   <p class="text-muted">
                   <h4> <b>Email :</b></h4>
                   <p>{{$admin->email}}</p>
                   </p>
        
                   
                       <div class="row">
                       <div class="col-md-2">
                       <form id="submiter_admin{{$admin->id}}" class="liner hidden-item" action="/admin/admins/{{$admin->id}}" method="post">

                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                               <div class="btn btn-danger" onclick="delete_admin({{$admin->id}})">Delete Admin </div>
                           </form>
                       </div>

                       <div class="col-md-2">
                           <a class="no-style-a" href="/admin/$admin->id/edit">
                               <div class="btn btn-warning">Update Admin</div>
                           </a>
                       </div>
                   </div>
               </div>
           </section>
       </div>
   </div>
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