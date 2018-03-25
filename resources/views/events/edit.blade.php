@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-lg-12">
                <div class="card-heading mt-3"><h3>Izmeni dogadjaj</h3></div>
                <div class="card-body">
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
                    {!!Form::submit('Izmeni',['class' => 'btn btn-success mt-3'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
    </div>
</div>
@endsection
