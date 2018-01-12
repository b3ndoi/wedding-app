@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Molimo vas unesite vase ime</div>
                <div class="panel-body">
                  <div class="col-lg-12">
                    {!!Form::open(['method'=>'post','action' => 'TestsController@save_guest'])!!}
                    {!!Form::hidden('event_id', $event_id)!!}
                    {!!Form::label('name', 'Ime')!!}
                    {!!Form::text('name',null, ['class' => 'form-control'])!!}
                    {!!Form::submit('Započni',['class' => 'btn btn-primary btn-block'])!!}
                    {!!Form::close()!!}
                  </div>
                </div>
            </div>
    </div>
</div>
@endsection
