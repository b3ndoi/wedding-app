@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$event->name}}</div>

                <div class="panel-body">
                  @foreach ($questions as $question)
                    @if ($question->qtype->name != 'Image')
                      <div class="row">
                        <div class="col-lg-12">
                          <h4>{{$question->question}}</h4>
                          @foreach ($question->answers as $answer)
                            <div class="radio">
                              <label><input type="radio" name="answers_for_{{$question->id}}">{{$answer->name}}</label>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    @endif
                  @endforeach
                  <div class="row">
                    <div class="col-lg-12">
                      <button class="btn btn-success btn-block">Potvrdi anketu</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
