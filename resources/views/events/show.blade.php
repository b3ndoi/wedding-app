@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$event->name}}</div>

                <div class="panel-body">
                        @foreach($event->guests as $guest)
                        {{$guest->name}}
                            @foreach($guest->media as $media)
                                
                                    <img src="{{Storage::url('public/'.$media->path)}}" class="img-responsive col-lg-3" alt="">
                                
                            @endforeach
                        @endforeach
                    <a class="btn btn-primary" href="{{route('questions.create', ['event_id' => $event->id])}}">Novo pitanje</a>
                    {!!Form::open(['action'=>['EventsController@destroy', $event->id],'method'=>'DELETE'])!!}

                    {!!Form::submit('Obriši',["class"=>"btn btn-danger pull-right"])!!}

                    {!!Form::close()!!}
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Pitanje</th>
                                <th>Tip pitanja</th>
                                <th>Broj ponuđenih odgovora</th>
                                <th>Status pitanja</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($event->questions as $question)
                            <tr>
                                <td> {{$question->question}}</td>
                                <td>{{$question->qtype->name}}</td>
                                <td>
                                  @if ($question->qtype->name == 'Checkbox button' || $question->qtype->name == 'Radio button' )
                                    {{$question->answers()->count()}}
                                  @else
                                    Nema
                                  @endif
                                </td>
                                <td>{!!$question->status=='0'?"<span class='alert-danger'>Neaktivna</span>":"<span class='alert-success'>Aktivna</span>"!!}</td>
                                <td><a href="{{route('questions.edit',[$question->id])}}" class="btn btn-default">Izmeni</a></td>
                                <td>
                                  @if ($question->qtype->name == 'Checkbox button' || $question->qtype->name == 'Radio button' )
                                    <a href="{{route('answers.create',['question_id'=>$question->id])}}" class="btn btn-primary">Dodaj odgovore</a>
                                  @endif
                                </td>
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
