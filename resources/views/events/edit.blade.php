@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Izmeni dogadjaj</div>
                <div class="panel-body">
                    {!!Form::model($event, ['method'=>'patch','action' => ['EventsController@update', $event->id]])!!}
                    {!!Form::hidden('user_id',null)!!}
                    {!!Form::label('name', 'Ime događaja')!!}
                    {!!Form::text('name',null, ['class' => 'form-control'])!!}
                    {!!Form::label('name_of_groom', 'Ime i prezime mladoženje')!!}
                    {!!Form::text('name_of_groom', null,['class' => 'form-control'])!!}
                    {!!Form::label('name_of_bride', 'Ime i prezime mlade')!!}
                    {!!Form::text('name_of_bride',null, ['class' => 'form-control'])!!}
                    {!!Form::label('location', 'Lokacija')!!}
                    {!!Form::text('location',null, ['class' => 'form-control'])!!}
                    {!!Form::label('date', 'Datum venčanja')!!}
                    {!!Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
                    {!!Form::submit('Izmeni',['class' => 'btn btn-success'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
    </div>
</div>
@endsection
