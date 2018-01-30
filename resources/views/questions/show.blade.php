@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$question->question}}</div>

                <div class="panel-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ispitanik</th>
                                <th>Odgovor</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($question->qtype->name == 'Fotografija')
                                @foreach($question->gusetsMedia as $guest)
                                    <tr>
                                        <th class="col-lg-4">{{$guest->guest->name}}</th>
                                        <th class="col-lg-4"><img src="{{Storage::url('public/'.$guest->path)}}" class="img-responsive"></th>
                                        <th class="col-lg-2"></th>
                                        <th class="col-lg-2">
                                            {!!Form::open('')!!}
                                                <button type="submit" class="btn btn-danger">Obriši</button>
                                            {!!Form::close()!!}
                                        </th>
                                    </tr>
                                @endforeach
                            @endif
                            @if($question->qtype->name == 'Tekst')
                                @foreach($question->gusetsText as $guest)
                                    <tr>
                                        <th class="col-lg-4">{{$guest->guest->name}}</th>
                                        <th class="col-lg-4">{{$guest->answer}}</th>
                                        <th class="col-lg-2"></th>
                                        <th class="col-lg-2"></th>
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
                            @if($question->qtype->name == 'Checkbox button')
                                @foreach($question->answers as $answer)
                                   
                                    @if($answer->guests)
                                    
                                        @foreach($answer->guests as $guest)
                                        <tr>
                                            <th class="col-lg-4">{{$guest->name}}</th>
                                            <th class="col-lg-4">{{$answer->name}} ({{$answer->is_correct?'Tačan':'Netačan'}})</th>
                                            <th class="col-lg-2"></th>
                                            <th class="col-lg-2"></th>
                                        </tr>
                                        @endforeach
                                    
                                    @endif
                                    
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
