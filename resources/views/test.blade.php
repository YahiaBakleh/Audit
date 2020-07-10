@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test: <strong class="text-info">{{ $test->name }}</strong></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <form action="{{ action('HomeController@gradeTest') }}" method="post">
                        {{csrf_field()}}
                        <input type="text" style="display: none;" name="test_id" value="{{ $test->id }}">
                        @foreach($test->questions as $question)
                            <div class="form-group">
                                <div class="col-md-12" style="margin-top: 1em">
                                    <h3><span class="text-muted">{{ $loop->index + 1 }})</span> {{ $question->title }}
                                        <span
                                                class="badge">{{ $question->score }} marks</span></h3>
                                    @if($q_image = $question->image_path)
                                        <img src="{{ asset('images/' . $q_image) }}" alt="" width="500px"
                                             class="center">
                                    @endif
                                </div>
                                @if($question->is_paraghraph)
                                    <div class="col-md-12">
                                    <textarea name="{{ $question->id }}" class="form-control"
                                              placeholder="your answer..." style="width: 100%;" rows="4"></textarea>
                                    </div>
                                @else
                                    <div class="col-md-12 form-check">
                                        @foreach($question->choices as $key => $choice)
                                            <div class="col-md-3">
                                                <input {{ !$key ? 'required' : '' }} class="form-check-input"
                                                       type="radio"
                                                       name="{{ $question->id }}"
                                                       value="{{ $choice->id }}">{{ $choice->title }}
                                                @if($path = $choice->image_path)
                                                    <img src="{{ asset('images/'.$path) }}" alt="" width="300px">
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <hr style="margin: 2em">
                        @endforeach

                        <div class="col-md-12 form-group" style="margin-top: 1em">
                            <button type="submit" class="btn btn-success" style="right: 0">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
