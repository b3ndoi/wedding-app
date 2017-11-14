@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo pitanje</div>
                <div class="panel-body">
                    {!!Form::model($question, ['method'=>'patch','action' => ['QuestionsController@update', $question->id]])!!}
                    {!!Form::hidden('event_id',$question->event->id)!!}
                    {!!Form::label('question')!!}
                    {!!Form::text('question',null, ['class' => 'form-control'])!!}
                    {!!Form::label('Question Type')!!}
                    {!!Form::select('qtype_id',$qtypes ,null, ['class' => 'form-control'])!!}
                    {!!Form::label('status')!!}
                    {!!Form::select('status',['0'=>'Neaktivno', '1'=>'Aktivno'] ,null, ['class' => 'form-control'])!!}
                    {!!Form::submit('Izmeni pitanje',['class' => 'btn btn-success'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
