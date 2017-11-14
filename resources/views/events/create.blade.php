@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Dodaj dogadjaj</div>
                <a href="{{route('events.index')}}" class="btn btn-default">Nazad</a>
                <div class="panel-body">
                    {!!Form::open(['method'=>'post','action' => 'EventsController@store', 'enctype' => 'multipart/form-data'])!!}
                    {!!Form::hidden('user_id','1')!!}
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
                    {!!Form::label('cover_image', 'Izaberite sliku')!!}
                    {!!Form::file('cover_image',['class' => 'form-control-file'])!!}
                    {!!Form::submit('Click Me!',['class' => 'btn btn-primary'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
    </div>
</div>
@endsection
