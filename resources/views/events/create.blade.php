@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-lg-12">
                <div class="card-heading mt-3"><h3>Dodaj dogadjaj</h3></div>
                <div class="card-body">
                    {!!Form::open(['method'=>'post','action' => 'EventsController@store', 'enctype' => 'multipart/form-data'])!!}
                    {!!Form::hidden('user_id',Auth::user()->id)!!}
                    {!!Form::label('name', 'Ime događaja')!!}
                    {!!Form::text('name',null, ['class' => 'form-control'])!!}
                    
                    {!!Form::label('name_of_bride', 'Ime i prezime mlade')!!}
                    {!!Form::text('name_of_bride',null, ['class' => 'form-control'])!!}
                    {!!Form::label('bride_cover', 'Izaberite sliku mlade')!!}
                    {!!Form::file('bride_cover',['class' => 'form-control-file'])!!}
                    {!!Form::label('bride_about', 'Kratak tekst')!!}
                    {!!Form::text('bride_about',null,['class' => 'form-control'])!!}
                    {!!Form::label('name_of_groom', 'Ime i prezime mladoženje')!!}
                    {!!Form::text('name_of_groom', null,['class' => 'form-control'])!!}
                    {!!Form::label('groom_cover', 'Izaberite sliku mladoženje')!!}
                    {!!Form::file('groom_cover',['class' => 'form-control-file'])!!}
                    {!!Form::label('groom_about', 'Kratak tekst')!!}
                    {!!Form::text('groom_about',null,['class' => 'form-control'])!!}

                    {!!Form::label('location', 'Lokacija')!!}
                    {!!Form::text('location',null, ['class' => 'form-control'])!!}
                    {!!Form::label('date', 'Datum venčanja')!!}
                    {!!Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
                    {!!Form::label('cover_image', 'Izaberite sliku')!!}
                    {!!Form::file('cover_image',['class' => 'form-control-file'])!!}
                    {!!Form::submit('Dodaj',['class' => 'btn btn-success mt-3'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
    </div>
</div>
@endsection
