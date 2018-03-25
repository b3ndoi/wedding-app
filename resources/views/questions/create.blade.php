@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Novo pitanje</h3></div>
                <div class="panel-body">
                    {!!Form::open(['method'=>'POST','action' => 'QuestionsController@store'])!!}
                    {!!Form::hidden('event_id',$event_id)!!}
                    {!!Form::label('question')!!}
                    {!!Form::text('question',null, ['class' => 'form-control'])!!}
                    {!!Form::label('Question Type')!!}
                    {!!Form::select('qtype_id',$qtypes ,null, ['class' => 'form-control'])!!}
                    {!!Form::label('status')!!}
                    {!!Form::select('status',['0'=>'Neaktivno', '1'=>'Aktivno'] ,null, ['class' => 'form-control'])!!}
                    {!!Form::submit('Dodaj pitanje',['class' => 'btn btn-success mt-3'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
