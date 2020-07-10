@extends('admin.layouts.app')
@section('title')
    Section
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

                                    <h2 class="panel-title">{!! $section->title !!}<br>
                                    @if($section->ar_title)
                                        {!! $section->ar_title !!}
                                        @endif
                                    </h2>
                                   
                                </header>
                                <div class="panel-body">
                                    <div class="container-fluid">
                                        @if($section->start_date)

                                            <h4><b>Start Date :</b></h4>
                                            <p class="text-muted">{{date('d-m-Y', strtotime($section->start_date))}}</p>

                                        @endif
                                        @if($section->description)

                                    <h4><b>Description :</b></h4>
                                    <p class="text-muted">{!! $section->description !!}</p>
                                            @if($section->ar_description)
                                                    <p class="text-muted">{!! $section->ar_description !!}</p>
                                                @endif

                                            @if($section->type == 4 && $instructor != null)
                                                    <div class="team">
                                                        <div class="container-fluid">

                                                            <div class="row">
                                                                <div class="col-lg-6 col-lg-offset-3 text-center">
                                                                    <h2><span class="ion-minus"></span>The Course Instructors<span class="ion-minus"></span></h2>
                                                                    <br>
                                                                </div>
                                                            </div>

                                                            <div class="row text-center">

                                                                @foreach ($instructor as $instr)

                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                        <div class="item">

                                                                            <img class="img-rounded" alt="team-photo" src="{{ asset('storage/' . $instr->image) }}" width="300px ; height="300px;>
                                                                        </div>
                                                                        <div class="team-member">

                                                                            <h4> {!! $instr->title !!}</h4>

                                                                            <p>{!! $instr->description !!}</p>

                                                                        </div>

                                                                        <p class="social">
                                                                            <a href="{{$instr->email}}"><span class="">{{$instr->email}}</span></a>
                                                                        </p>

                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <form id="submiter{{$instr->id}}" class="liner hidden-item"
                                                                                      action="{{ route('teacher.destroy',['id'=> $instr->id]) }}" method="post">
                                                                                    {{ csrf_field() }}
                                                                                    {{method_field('DELETE')}}
                                                                                    <div class="btn btn-danger" onclick="triggerDeleteAlert({{$instr->id}})">Delete Instructor</div>
                                                                                </form>
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <a class="no-style-a" href="{{route('teacher.edit' ,['id' => $instr->id])}}">
                                                                                    <div class="btn btn-warning">Update Instructor</div>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div> <!--col-lg-4 -->
                                                                @endforeach

                                                            </div>  <!-- row text-center -->

                                                        </div>
                                                    </div>

                                            <br><br><hr>@endif

                                        @endif
                                        @if (($sub) &&count($sub) > 0)
                                            <div class="row">


                                        <div class="toggle" data-plugin-toggle="">
                                            @foreach($sub as $s)
                                            <section class="toggle">
                                                <label>{!! $s->title !!}</label>
                                                <div class="toggle-content" style="display: none;">
                                                    <div class="container" style="width: inherit">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                    <p>{!! $s->description !!}</p>
                                                    </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <form id="submiter{{$s->id}}" class="liner hidden-item"
                                                              action="{{ route('sections.destroy',['section'=> $s]) }}" method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}

                                                            <div class="btn btn-danger" onclick="triggerDeleteAlert({{$s->id}})">Delete Section</div>
                                                        </form>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <a class="no-style-a" href="{{route('sections.edit' ,['section' => $s])}}">
                                                            <div class="btn btn-warning">Update Section</div>
                                                        </a>
                                                    </div>


                                                </div>
                                                </div>
                                                </div>
                                            </section>
                                                @endforeach
                                        </div>
                                            </div>
                                        @endif




                                    <div class="row">
                                        <div class="col-md-4">
                                            <form id="submiter{{$section->id}}" class="liner hidden-item"
                                                  action="{{ route('sections.destroy',['section'=> $section]) }}" method="post">
                                               {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                                <div class="btn btn-danger" onclick="triggerDeleteAlert({{$section->id}})">Delete Section</div>
                                            </form>
                                        </div>


                                        <div class="col-md-4">
                                            <a class="no-style-a" href="{{route('sections.edit' ,['section' => $section])}}">
                                                <div class="btn btn-warning">Update Section</div>
                                            </a>
                                        </div>

                                        @if($section->type != 6)

                                        <div class="col-md-4">
                                            <a class="no-style-a" >
                                                <div class="btn btn-info" data-toggle="modal" data-target="#add_sub">Add Sub Section</div>
                                            </a>
                                        </div>
                                            @endif



                                        @if($section->type == 4  )
                                            <div class="col-md-2">
                                                <a class="no-style-a" href="{{route('teacher.create' ,['course_id'=>$section->id])}}">
                                                    <div class="btn btn-success">Add Insructor</div>
                                                </a>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                </div>
                            </section>
                    </div>
</div>


   <div class="modal fade" id="add_sub" tabindex="-1" role="dialog" aria-labelledby="add_choice" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">New Sub Section</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form  id="add_choice_form" action="{{route('sections.store')}}"  enctype="multipart/form-data" method="post">
                       {{ csrf_field() }}
                       <input type="hidden" name="parent"  value="{{$section->id}}">
                       <input type="hidden" name="type" value="{{$section->type}}">
                       <div class="form-group">
                           <label class="col-form-label">Section Title:</label>
                           <textarea name="title" placeholder=" Section title " ></textarea>
                       </div>
                       <div class="form-group">
                           <label class="col-form-label">Arabic Section Title:</label>
                           <textarea name="ar_title" placeholder=" Section title " ></textarea>
                       </div>
                       <div class="row form-group">
                           <div class="col-lg-12">
                               <label  >Add an Image  for the Section  </label><br>
                               <strong>Please Upload image with at leaset width: 1000px and height: 500px </strong>
                           </div>
                       </div>


                       <div class="row form-group">
                           <div class="col-lg-12" >
                               <div class="fileupload fileupload-new" data-provides="fileupload">
                                   <div class="input-append">
                                       <div class="uneditable-input">
                                           <i class="fa fa-file fileupload-exists"></i>
                                           <span class="fileupload-preview"></span>
                                       </div>
                                       <span class="btn btn-default btn-file">
																<span class="fileupload-exists">Change</span>
																<span class="fileupload-new">Select file</span>
																<input type="file" name="image">
															</span>
                                       <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <br>

                       <div class="form-group">
                           <label class="col-form-label">Section Description :</label>
                           <textarea name="description"></textarea>
                       </div>
                       <div class="form-group">
                           <label class="col-form-label">Section Description :</label>
                           <textarea name="ar_description"></textarea>
                       </div>


                       <div class="modal-footer">

                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary" id="">Add Sub Section</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection

