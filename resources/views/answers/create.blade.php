@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-lg-2"><a href="{{route('events.show', ['id'=>$question->event->id])}}" class="btn btn-default btn-block"><i class="fas fa-chevron-circle-left"></i></a></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading text-center	"><h4 class="">Novi odgovori na pitanje: <b>{{$question->question}}</b></h4></div>
                <div class="card-body">
                    
                    {!!Form::open(['method'=>'post','action' => 'AnswersController@store'])!!}
                    {!!Form::hidden('question_id',$question->id, ['class' => 'form-control'])!!}
                    
                      <div class="col-lg-8">
                        {!!Form::label('name', 'Odgovor')!!}
                        {!!Form::text('name',null, ['class' => 'form-control', 'required', 'placeholder'=>'Upišite odgovor...'])!!}
                      </div>
                    
                      <div class="col-lg-4">
                        {!!Form::label('is_correct', 'Da li je odovor tačan')!!}
                        {!!Form::select('is_correct', ['0'=>'Ne', '1'=>'Da'], null, ['class' => 'form-control'])!!}
                      </div>
                      <div class="col-lg-12">
                        {!!Form::label('', '')!!}
                        {!!Form::submit('Dodaj odgovor',['class' => 'btn btn-success btn-block'])!!}
                      </div>
                    
                    {!!Form::close()!!}
                    
                      @if ($answers->count()>0)
                        <div class="col-lg-12 mt-3">
                          <h6>Dodati odgovor/i</h6>
                          <ul class="list-group">
                              @foreach ($answers as $answer)
                                <li class="list-group-item" id = 'answer-{{$answer->id}}' style="cursor: move;">
                                  {{$answer->name}}
                                  <span class="badge badge-{{$answer->is_correct==0?'danger':'success'}} badge-pill">{{$answer->is_correct==0?'Ne':'Da'}}</span>
                                </li>
                              @endforeach
                            </ul>
                        </div>
                      @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
