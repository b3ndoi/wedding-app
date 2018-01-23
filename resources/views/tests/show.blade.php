@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$event->name}}</div>

                <div class="panel-body">
                  
                  {!!Form::open(['method'=>'post','action' => ['TestsController@save_answers',$guest->id], 'files' => true])!!}
                    @foreach ($questions as $question)
                      @if ($question->qtype->name == 'Radio button')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            @foreach ($question->answers as $answer)
                              <div class="radio">
                                  <label><input type="radio" name="radio_{{$question->id}}" value="{{$answer->id}}">{{$answer->name}}</label>
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
                                  <label><input type="checkbox" name="check_{{$question->id}}[]" value="{{$answer->id}}">{{$answer->name}}</label>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      @endif
                      @if ($question->qtype->name == 'Fotografija')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            <input type="file" name="image_{{$question->id}}" value="">
                          </div>
                        </div>
                      @endif
                      @if ($question->qtype->name == 'Video snimak')
                      <div class="row">
                        <div class="col-lg-12">
                          <h4>{{$question->question}}</h4>
                          <input type="file" name="video_{{$question->id}}" value="">
                        </div>
                      </div>
                    @endif
                      @if ($question->qtype->name == 'Teskt')
                        <div class="row">
                          <div class="col-lg-12">
                            <h4>{{$question->question}}</h4>
                            <textarea name="text_{{$question->id}}" id="" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                        </div>
                      @endif
                    @endforeach

                    <div class="row">
                      <div class="col-lg-12">
                        <input type="submit" value="Potvrdi anketu" class="btn btn-success btn-block">
                      </div>
                    </div>
                  {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
