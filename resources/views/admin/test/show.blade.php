@extends('admin.layouts.app')
@section('title')
    Test
 
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

<div class="row">
			<div class="col-md-12">
                            <section class="panel ">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>

                                    <h2 class="panel-title">{{$test->name}}</h2>
                                   
                                </header>
                                <div class="panel-body">
                                    <h4><b>Test Time :</b></h4>
                                    <p class="text-muted">{{$test->time}}</p>


                                    <h4><b>Description :</b></h4>
                                    <p class="text-muted">{!! $test->description !!}</p>

                                    <h4><b>Instructions :</b></h4>
                                    <p class="text-muted">{!! $test->instructions !!}</p>

                                    <hr>
                                    @if(count($test->groups) > 0 )
                                    <div id="groups_show">

                                        <section class="panel panel-featured panel-featured-info">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Groups for this Test</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table mb-none">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($test->groups as $group)
                                                            <tr   class="item{{$group->id}}">
                                                                <td>{{$group->id}}</td>
                                                                <td id="name_{{$group->id}}">{{$group->name}}</td>

                                                                <td class="actions">

                                                                    <a href="{{route('groups.show' , ['group' => $group])}}"><i class="fa fa-cubes"></i></a>
                                                                    <i id="edit_{{$group->id}}" class="fa fa-pencil" data-toggle="modal" data-target="#edit_group" data-id="{{$group->id}}" data-name ="{{$group->name}}"></i>
                                                                    <i id="delete_{{$group->id}}" class="delete fa fa-trash-o on"  style="color: red"  data-id="{{$group->id}}"  data-name ="{{$group->name}}">
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
                                    <div class="container-fluid">
                  <div class="row">
            <div class="col col-lg-2">
   <form id="submiter{{$test->id}}" class="liner hidden-item" action="{{ route('tests.destroy',['test'=> $test]) }}" method="post">
       {{ csrf_field() }}
       {{method_field('DELETE')}}
                              <div class="btn btn-danger" onclick="triggerDeleteAlert({{$test->id}})">Delete Test </div>
                            </form>
                            </div>

                           
 
 <div class="col col-lg-2">
                            <a class="no-style-a" href="{{route('tests.edit' ,['test' => $test])}}">
                                <div class="btn btn-warning">Update Test</div>
                            </a>
                        </div>
                         <div class="col col-lg-2">

                                <div class="btn btn-info" data-toggle="modal" data-target="#add_group" >Add Group</div>
                         </div>
                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>


    <!-- Modals -->
   <!--Create new Group -->
   <div class="modal fade" id="add_group" tabindex="-1" role="dialog" aria-labelledby="add_group" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">New Group</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form  id="add_group_form" action="{{route('groups.store')}}" >
                       {{ csrf_field() }}
                       <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Group Name:</label>
                           <input type="text" class="form-control" id="recipient-name" name="name">
                           <input type="hidden" name="test_id" value="{{$test->id}}">
                       </div>


                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" id="add_group">Add Group</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>

    <!-- edit existing group-->
   <div class="modal fade" id="edit_group" tabindex="-1" role="dialog" aria-labelledby="edit_group" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Update Group</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form  id="edit_group_form" action="{{route('groups.update_ajax')}}" method="post">
                       {{ csrf_field() }}
                       <div class="form-group">
                           <label for="recipient-name" class="col-form-label">Group Name:</label>
                           <input type="text" class="form-control" id="group-name" name="name">
                           <input type="hidden" name="test_id" value="{{$test->id}}">
                           <input type="hidden" id="id" name="id">
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" id="edit_group">Update Group</button>
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
                   <h5 class="modal-title" id="exampleModalLongTitle">Delete Group</h5>
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
    <script type="text/javascript">
        $(function() {
            $('#add_group_form').on('submit', function(e) {
                var form = $(this);
                var url = form.prop('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(response) {
                        $('#add_group').modal('hide');
                        location.reload(true);
                    },
                    error: function() {
                        alert('Error');

                    }
                });
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#edit_group_form').on('submit', function(e) {
                var form = $(this);
                var url = form.prop('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    success: function(response) {
                        $('#edit_group').modal('hide');
                        $('#name_' + response.id).text(response.name);
                        $('#edit_' + response.id).data('name' ,response.name);
                        $('#delete_' + response.id).data('name' ,response.name);
                        console.log(response);
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
                $('#group-name').val($(this).data('name'));
            } );
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '.delete', function (e) {
            $('.did').val($(this).data('id'));
            $('.dname').text("Are you sure you want to delete "+$(this).data('name') + ' Group ?');
            $('#myModal').modal('show');
        });
        $('.modal-footer').on('click', '#yes', function() {
            $('#myModal').modal('hide');
            var id = $('.did').val();
            var url = '/admin/groups/'+id;
            var token = '{{ csrf_token() }}';
            $.ajax({
                type: 'DELETE',
                url:url,
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    $('.item' + data).remove();
                        var hide = true;

                        $('.table td').each(function(){
                            var td_content = $(this).text();

                            if(td_content!=""){
                                hide = false;
                            }
                        })

                        if(hide){

                            $('#groups_show').hide();
                        }
                    console.log(data);
                }
            });
        });
    </script>
    @endsection