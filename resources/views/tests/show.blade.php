@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$event->name}}</div>

                <div class="panel-body">
                  <form class="" action="{{route('tests.save_answers', $guest->id)}}" method="post">
                    {{ csrf_field() }}
                    @foreach ($questions as $question)
                      @if ($question->qtype->name == 'Radio button')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            @foreach ($question->answers as $answer)
                              <div class="radio">
                                  <label><input type="radio" name="answers_for_{{$question->id}}" value="{{$answer->id}}">{{$answer->name}}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      @endif
                      @if ($question->qtype->name == 'Checkbox button')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            @foreach ($question->answers as $answer)
                              <div class="checkbox">
                                  <label><input type="checkbox" name="answers_for_{{$question->id}}" value="{{$answer->id}}">{{$answer->name}}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      @endif
                      @if ($question->qtype->name == 'Fotografija')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            <input type="file" name="answers_for_{{$question->id}}" value="">
                          </div>
                        </div>
                      @endif
                      @if ($question->qtype->name == 'Teskt')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                          </div>
                        </div>
                      @endif
                    @endforeach

                    <div class="row">
                      <div class="col-lg-12">
                        <input type="submit" value="Potvrdi anketu" class="btn btn-success btn-block">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
