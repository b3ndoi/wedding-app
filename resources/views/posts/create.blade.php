@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
            <div class="card col-lg-12">
                <div class="card-heading mt-4"><h3 class="text-center">Dodaj objavu</h3></div>
                <div class="card-body">
                    {!!Form::open(['method'=>'post','action' => ['PostsController@store', $event_id], 'enctype' => 'multipart/form-data'])!!}
                        {!!Form::label('title', 'Naslov objave')!!}
                        {!!Form::text('title',null, ['class' => 'form-control'])!!}
                        {!!Form::label('category_id', 'Kategorija objave')!!}
                        {!!Form::select('category_id', [] + $categories, null,['class' => 'form-control'])!!}
                        {!!Form::label('body', 'Opis')!!}
                        {!!Form::textarea('body',null, ['class' => 'form-control', 'rows' => 4])!!}
                        {!!Form::label('date', 'Datum dešavanja objave')!!}
                        {!!Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])!!}
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
