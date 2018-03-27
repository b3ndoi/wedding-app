@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col l12">
            <div class="card-panel">
                <h3>Objave</h3>

                <div class="panel-body">
                        
                    <a class="btn btn-primary" href="{{route('posts.create', ['event_id' => $event_id])}}"> <i class="fa fa-plus"></i>    Nova objava</a>
                    @if($posts->count() > 0)
                    <table class="table mt-3">
                        <thead class="thead-dark">
                            <tr>
                                <th>Slika</th>
                                <th>Kategorija</th>
                                <th>Naslov</th>
                                <th>Datum dešavanja</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <th>
                                    <img src="{{Storage::url($post->image)}}" class="img-responsive" width="150px">
                                </th>
                                <td> {{$post->category->name}}</td>
                                <td> {{$post->title}}</td>
                                <td> {{$post->date->format('d.m.Y.')}}</td>
                                <td><a href="{{route('posts.edit',[$event_id, $post->id])}}" class="btn btn-primary">Izmeni</a></td>
                                <td>
                                    <a href="#" class="btn btn-danger">Obriši</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->links()}}
                    @else
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Trenutno nema nijedne objave na stranici</h3>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
