@extends('admin.layouts.app')
@section('title')
    Question
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel ">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Question {{$question->id}}</h2>

                </header>
                <div class="panel-body">
                    <h4><b>Question Title:</b></h4>
                    <p class="text-muted">{!! $question->title !!}</p>
                    <hr>
                    @if($question->is_paraghraph)
                       <label> <b>Question Paraghtraph : </b></label> {{$question->is_paraghraph}}
                    @else
                    <div id="Choice_show">
                            <section class="panel panel-featured panel-featured-info">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Choices  for this Questions</h2>
                                </header>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-none">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Choice Title</th>
                                                <th class="text-center">Correct</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($question->choices as $choice)
                                                <tr  class="item{{$choice->id}}">
                                                    <td class="text-center">{{$choice->id}}</td>
                                                    <td class="text-center">{!! $choice->title !!}</td>
                                                    <td class="text-center">@if($correct = $choice->is_correct)
                                                           <i class="fa  fa-check"></i>
                                                            @endif
                                                    </td>

                                                    <td class="text-center">@if($path = $choice->image_path)
                                                         <img  id="img" src="{{ asset('storage/'.$path) }}"class="thumbnail img-responsive" alt="Responsive image" >
                                                            @else
                                                        <p>no image </p>
                                                            @endif
                                                    </td>

                                                    <td class="actions text-center">

                                                        <i id="edit_{{$choice->id}}" class="fa fa-pencil" data-toggle="modal" data-target="#edit_choice" data-id="{{$choice->id}}" data-name ="{{strip_tags($choice->title)}}"></i>
                                                        <i id="delete_{{$choice->id}}" class="delete fa fa-trash-o on"  style="color: red"  data-id="{{$choice->id}}"  data-name ="{{strip_tags($choice->title)}}">
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
                    <div class="container">
                    <div class="row">
                        @if(!$question->is_paraghraph )
                        <div class="col-md-2">

                            <div class="btn btn-info" data-toggle="modal" data-target="#add_choice" >Add Choice</div>

                        </div>
                        @endif
                    </div>
                    </div>
                </div>

                        <div class="modal fade" id="add_choice" tabindex="-1" role="dialog" aria-labelledby="add_choice" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Choice</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form  id="add_choice_form" action="{{route('choices.store')}}"  enctype="multipart/form-data" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="question_id"  value="{{$question->id}}">
                                            <div class="form-group">
                                                            <!--<input type="text" name="choice" placeholder=" Choice title " class="form-control">-->
                                                <textarea name="choice" placeholder=" Choice title " class="form-control"></textarea>
                                                        </div>

                                            <div class="form-group">
                                                <div class="col" >
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
                                                <button type="submit" class="btn btn-primary" id="">Add Choice</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            </section>
        </div>
    </div>
    <!-- edit existing Choice-->
    <div class="modal fade" id="edit_choice" tabindex="-1" role="dialog" aria-labelledby="edit_choice" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Choice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="edit_group_form" action="{{route('choices.update_ajax')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Choice Title:</label>
                            <!--<input type="text" class="form-control" id="choice-title" name="title">-->
                            <textarea class="form-control" id="choice-title" name="title"></textarea>
                            <br>
                            <input type="file" class="form-control" name="file">
                            <input type="hidden" name="question_id" value="{{$question->id}}">
                            <input type="hidden" id="id" name="id">
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
                                <input type="checkbox"  name="choice_correct">
                                <label for="choice1_correct">is correct</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Update Choice</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Choice</h5>
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
            $('#add_choice_form').on('submit', function(e) {
                var form = $(this);
                var data = new FormData(form);
                var url = form.prop('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(response) {
                        $('#add_choice').modal('hide');
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
                $('#choice-title').val($(this).data('name'));
            } );
        });
    </script>
    <script type="text/javascript">
        $(document).on('click', '.delete', function (e) {
            $('.did').val($(this).data('id'));
            $('.dname').text("Are you sure you want to delete "+$(this).data('name') + ' Choice ?');
            $('#myModal').modal('show');
        });
        $('.modal-footer').on('click', '#yes', function() {
            $('#myModal').modal('hide');
            var id = $('.did').val();
            var url = '/admin/choices/'+id;
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

                        $('#Choice_show').hide();
                    }
                    console.log(data);
                }
            });
        });
    </script>
@endsection