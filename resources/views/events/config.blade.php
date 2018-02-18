@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$event->name}}</div>

                <div class="panel-body">
                        <div class="col-lg-12">
                        @if($event->cover_image)
                            <img src="{{Storage::url('public/'.$event->cover_image)}}" class="img-responsive col-lg-12" alt="">
                        @endif
                            <h1 class="display-3 text-center text-white mt-4">{{$event->name}}</h1>
                        </div>
                <div class="question_display">
                    @foreach($event->questions->sortBy('sort') as $question)
                        @if($question->qtype->name == 'Fotografija')
                            <div class="row"  id = 'question-{{$question->id}}'>
                                <h4>{{$question->question}}</h4>
                                <div id="" class = "sortable square-container">

                                    @foreach($question->gusetsMedia->sortBy('sort') as $guestAnswer)
                                    <div class="square" id = 'photo-{{$guestAnswer->id}}' >
                                        <!-- {{$guestAnswer->guest->name}} -->
                                        <div class="content">
                                        <img src="{{Storage::url('public/'.$guestAnswer->path)}}" class="">
                                        </div>
                                    </div>
                                    @endforeach                    
                                </div>
                            </div>
                        @endif
                        @if($question->qtype->name == 'Teskt')
                            <div class="row"  id = 'question-{{$question->id}}'>
                                <h4>{{$question->question}}</h4>
                                <div id="" class = "sortable">

                                    @foreach($question->gusetsText as $guestAnswer)
                                    <div id = 'text-{{$guestAnswer->id}}' >
                                        <div class="panel col-lg-3">
                                            <div class="panel-heading">
                                                {{$guestAnswer->guest->name}}
                                            </div>
                                            <div class="panel-body">
                                                {{$guestAnswer->answer}}
                                            </div>
                                        </div>
                                            
                                            
                                    </div>
                                    @endforeach                    
                                </div>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
                <h3>Venčanje se održalo:</h3>
                <div id="map" ></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqL5KA1gyzSokPyaptOF23wUgjiU7oKm8&callback=initMap"
    type="text/javascript"></script>
    <script>
        function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>

@endsection
