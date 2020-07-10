@extends('admin.layouts.app')
@section('title')
  User
@endsection

@section('content')
   <!--<div class="row p-b-20">
        <div class="col-md-10"></div>
        <div class="col-md-2 pull-right">
            <a class="no-style-a" href="{{route('users.create')}}">
                <div class="btn btn-primary">New USer</div>
            </a>
        </div>
    </div>-->

   <div class="row">
       <div class="col-md-12">
           <section class="panel ">
               <header class="panel-heading">
                   <div class="panel-actions">
                       <a href="#" class="fa fa-caret-down"></a>
                       <a href="#" class="fa fa-times"></a>
                   </div>

                   <h2 class="panel-title">{{$user->name}}</h2>

               </header>
               <div class="panel-body">
                   <p class="text-muted">
                   <h4> <b>Email :</b></h4>
                   <p>{{$user->email}}</p>
                   </p>
                   @if($user->doneTests()->count())
                   @foreach($user->tests as $test)
                       @if(!is_null($test->pivot->result))
                               <h4 class="text-info text-bold">Done Tests:

                      <span class="label label-info"><a href="{{route('users.show_result')}}?user_id={{$user->id}}&test_id={{$test->id}}">{{ $test->name }}</a> <i
                                  class="fa fa-pencil"></i> {{ $test->pivot->result }}%</span>
                       </h4>
                           @endif
                       @endforeach
                   @endif
                               @if($user->toDoTests()->count())
                                   @foreach($user->tests as $test)
                           @if(is_null($test->pivot->result))

                               <h4 class="text-info text-bold">Remaning Tests:

                                   <span class="label label-info">{{ $test->name }}<i
                                               class="fa fa-pencil"></i> 0%</span>
                               </h4><br>
                           @endif
                                   @endforeach
                                   @endif
                   <hr>



                       <div class="row">
                       <div class="col-md-2">
                           <form id="submiter{{$user->id}}" class="liner hidden-item" action="{{ route('users.destroy',['user'=> $user]) }}" method="post">
                               {{ csrf_field() }}
                               {{method_field('DELETE')}}
                               <div class="btn btn-danger" onclick="triggerDeleteAlert({{$user->id}})">Delete User </div>
                           </form>
                       </div>

                       <div class="col-md-2">
                           <a class="no-style-a" href="{{route('users.edit' ,['user' => $user])}}">
                               <div class="btn btn-warning">Update User</div>
                           </a>
                       </div>
                   </div>
               </div>
           </section>
       </div>
   </div>
@endsection

