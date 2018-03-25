@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-lg-12">
                <div class="card-heading mt-4"><h3 class="text-center">Dodaj lokaciju događaja</h3></div>
                <div class="card-body">
                    {!!Form::open(['method'=>'post','action' => ['AdressesController@store', $event_id], 'enctype' => 'multipart/form-data'])!!}
                        {!!Form::label('name', 'Tip objekta')!!}
                        {!!Form::text('name',null, ['class' => 'form-control'])!!}
                        {!!Form::label('location', 'Adresa')!!}
                        {!!Form::text('location',null, ['class' => 'form-control'])!!}
                        {!!Form::label('image', 'Izaberite sliku')!!}
                        {!!Form::file('image',['class' => 'form-control-file'])!!}
                        <p>*slike treba da imaju rezoluciju 790x600</p>
                        {!!Form::submit('Dodaj',['class' => 'btn btn-success mt-4 col-md-4 offset-md-4'])!!}
                    {!!Form::close()!!}
                </div>
            </div>
    </div>
</div>
@endsection
