@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Novi odgovori na pitanje: <b>{{$question->question}}</b></h4></div>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-6"><a href="{{route('events.show', ['id'=>$question->event->id])}}" class="btn btn-default btn-block">Nazad</a></div>
                    </div>
                    {!!Form::open(['method'=>'post','action' => 'AnswersController@store'])!!}
                    {!!Form::hidden('question_id',$question->id, ['class' => 'form-control'])!!}
                    <div class="row">
                      <div class="col-lg-12">
                        {!!Form::label('name', 'Odgovor')!!}
                        {!!Form::text('name',null, ['class' => 'form-control', 'required'])!!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        {!!Form::label('is_correct', 'Da li je odovor tačan')!!}
                        {!!Form::select('is_correct', ['0'=>'Ne', '1'=>'Da'], null, ['class' => 'form-control'])!!}
                      </div>
                      <div class="col-lg-6">
                        {!!Form::label('', '')!!}
                        {!!Form::submit('Dodaj odgovor',['class' => 'btn btn-success btn-block'])!!}
                      </div>
                    </div>
                    {!!Form::close()!!}
                    <div class="row">
                      @if ($answers->count()>0)
                        <div class="col-lg-12">
                          <h6>Dodati odgovor/i</h6>
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Odgovor</th>
                                <th>Tačan</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($answers as $answer)
                                <tr id = 'answer-{{$answer->id}}' style="cursor: move;">
                                  <td class="col-lg-6">{{$answer->name}}</td>
                                  <td class="col-lg-6">{{$answer->is_correct==0?'Ne':'Da'}}</td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
