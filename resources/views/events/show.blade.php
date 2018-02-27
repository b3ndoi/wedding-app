@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col l12">
            <div class="card-panel">
                <h4>{{$event->name}}</h4>

                <div class="panel-body">
                        
                    <a class="btn btn-primary" href="{{route('questions.create', ['event_id' => $event->id])}}">Novo pitanje</a>
                    <!-- {!!Form::open(['action'=>['EventsController@destroy', $event->id],'method'=>'DELETE'])!!}

                    {!!Form::submit('Obriši',["class"=>"btn btn-danger pull-right"])!!}

                    {!!Form::close()!!} -->
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Broj odgovora</th>
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
                                <th>
                                    @if($question->qtype->name == 'Fotografija')
                                    {{$question->gusetsMedia()->count()}}
                                    @endif
                                    @if($question->qtype->name == 'Teskt')
                                    {{$question->gusetsText()->count()}}
                                    @endif
                                    @if($question->qtype->name == 'Radio button')
                                    {{$question->guestRadio()->count()}}
                                    @endif
                                </th>
                                <td>
                                    <a href="{{route('questions.show', $question->id)}}">{{$question->question}}</a>
                                </td>
                                <td>{{$question->qtype->name}}</td>
                                <td>
                                  @if ($question->qtype->name == 'Checkbox button' || $question->qtype->name == 'Radio button' )
                                    {{$question->answers()->count()}}
                                  @else
                                    Nema
                                  @endif
                                </td>
                                <td>{!!$question->status=='0'?"<span class='btn btn-danger'>Neaktivna</span>":"<span class='btn btn-success'>Aktivna</span>"!!}</td>
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
@endsection
