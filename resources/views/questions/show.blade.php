@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>{{$question->question}}</h3></div>

                <div class="panel-body">
                    @if($question->qtype->name == 'Fotografija')
                    <div id="sortable" class = "grid-photos">
                    
                        @foreach($question->gusetsMedia as $guestAnswer)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{$guestAnswer->guest->name}}
                                {!!Form::open(['method'=>'DELETE', 'action'=>['AnswersController@deleteAnswerMedia', $guestAnswer->id]])!!}
                                    <button type="submit" class="btn btn-danger"></button>
                                {!!Form::close()!!}
                            </div>
                            <div class="panel-body">
                                <img src="{{Storage::url('public/'.$guestAnswer->path)}}" class="img-responsive col-lg-12" height='337'>
                            </div>
                        </div>
                        @endforeach
                    
                    </div>
                    @else
                    <table class="table mt-5">
                            <thead  class="thead-dark">
                                <tr>
                                    <th>Ime Ispitanika</th>
                                    <th>Odgovor</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @if($question->qtype->name == 'Teskt')
                                    @foreach($question->gusetsText as $guest)
                                        <tr>
                                            <th >{{$guest->guest->name}}</th>
                                            <th>{{$guest->answer}}</th>
                                            <th ></th>
                                            <th></th>
                                        </tr>
                                    @endforeach
                                @endif
                                @if($question->qtype->name == 'Radio button')
                                    @foreach($question->guestRadio as $guest)
                                        <tr>
                                            <th class="col-lg-4">{{$guest->guest->name}}</th>
                                            <th class="col-lg-4">{{$guest->answer->name}} ({{$guest->answer->is_correct?'Tačan':'Netačan'}})</th>
                                            <th class="col-lg-2"></th>
                                            <th class="col-lg-2"></th>
                                        </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    @endif
                    @if($question->qtype->name == 'Checkbox button')
                        
                        @foreach($question->answers as $answer) 
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>{{$answer->name}}</h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{$answer->guests()->count()/8*100}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$answer->guests()->count()/8*100}}%;">
                                        <span class="sr-only">{{$answer->guests()->count()/8*100}} Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
