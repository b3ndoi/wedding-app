@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Venčanja</div>

                <div class="panel-body">
                    <a href="{{route('events.create')}}" class="btn btn-primary">Dodaj venčanje</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Naziv venčanja</th>
                                <th>Ime i prezime mladoženje</th>
                                <th>Ime i prezime malde</th>
                                <th>Lokacija</th>
                                <th>Datum</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$event->name}}</td>
                                <td>{{$event->name_of_groom}}</td>
                                <td>{{$event->name_of_bride}}</td>
                                <td>{{$event->location}}</td>
                                <td>{{$event->date->format('d.m.Y.')}}</td>
                                <td><a href="{{route('events.show',$event->id)}}" class="btn btn-default">Dodaj ankete</a></td>
                                <td><a href="{{route('events.edit',$event->id)}}" class="btn btn-primary">Izmeni</a></td>
                                {{-- <td><button class="btn btn-danger" onClick="deleteEvent({{$event->id}})">Obriši</button></td> --}}
                                <td><a href="{{route('tests.create',$event->id)}}" class="btn btn-success">Testiraj ankete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
