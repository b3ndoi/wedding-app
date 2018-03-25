@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col l12">
            <div class="card-panel">
                <h3>Adrese</h3>

                <div class="panel-body">
                        
                    <a class="btn btn-primary" href="{{route('adresses.create', ['event_id' => $event_id])}}"> <i class="fa fa-plus"></i>    Nova adresa</a>
                    @if($adresses->count() > 0)
                        <div class="row">
                        @foreach($adresses as $adress)
                            <div class="card col-lg-4 mt-4 ml-4">
                                <div class="card-header"><p>{{$adress->name}}</p></div>
                                <div class="card-body">
                                    <img src="{{Storage::url($adress->photo)}}" class="img-fluid" >

                                </div>
                                <div class="card-footer">
                                <a href="{{route('posts.edit',[$event_id, $adress->id])}}" class="btn btn-primary">Izmeni</a></td>
                            
                                <a href="#" class="btn btn-danger">Obriši</a></div>
                            </div>
                            
                            
                            
                            
                            
                        @endforeach
                        </div>
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
