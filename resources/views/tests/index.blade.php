@extends('layouts.app')

@section('content')
<div class="container">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$event->name}}</td>
                                <td>{{$event->name_of_groom}}</td>
                                <td>{{$event->name_of_bride}}</td>
                                <td>{{$event->location}}</td>
                                <td>{{$event->date}}</td>
                                <td><a href="{{route('events.show',$event->id)}}" class="btn btn-default">Vidi</a></td>

                                <td><button class="btn btn-danger" onClick="deleteEvent({{$event->id}})">Obriši</button></td>
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
