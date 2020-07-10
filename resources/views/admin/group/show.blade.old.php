@extends('admin.layouts.app')
@section('title')
    Group
@endsection
@section('style')

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
                                                  <input type="number" class="form-control" name="score">
                                              </div>

                                                      <div class="form-group">
                                                          <div class="col">
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
                                                      <div class="form-group">
                                                              <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
                                                                  <input type="checkbox"   id="is_para" name="is_paraghraph">
                                                                  <label for="is_paraghraph">is Paraghraph</label>
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
                                                                      <input type="checkbox"  name="choice1_correct">
                                                                      <label for="choice1_correct">is correct</label>
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
																<input type="file" name="file_1">
															</span>
                                                                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                          </div>
                                                                      </div>

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
                                                                          <input type="checkbox"  name="choice2_correct">
                                                                          <label for="choice1_correct">is correct</label>
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
																<input type="file" name="file_2">
															</span>
                                                                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          </div>
                                              <br>




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
        <div class="modal-dialog" role="document">
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
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Question Title:</label>
                            <!--<input type="text" class="form-control" id="question-title" name="title">-->
                            <textarea class="form-control" name="title" rows="5" placeholder="Question Title" id="question-title"></textarea>
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="form-group">
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
																<input type="file" name="file">
															</span>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
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
                $('#question-title').val('Asma');
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
    </script>
    @endsection