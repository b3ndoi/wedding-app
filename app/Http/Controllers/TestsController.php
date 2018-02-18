<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Guest;
use App\GuestMedia;
use App\GuestRadio;
use App\GuestText;
use App\Question;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('user_id',Auth::user()->id)->get();
        return view('tests.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('tests.create', ['event_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_guest(Request $request)
    {
        $input = $request->all();

        $guest = Guest::create($input);

        return redirect('tests/questions/'.$guest->id);

    }

    public function save_answers(Request $request, $id)
    {
        $inputs = $request->all();
        // return $inputs;
        unset($inputs['_token']);
        foreach($inputs as $key => $single){
            $single_array = explode('_', $key);
            $type = $single_array[0];
            $single_id = $single_array[1];
            if($type == 'video'&& $single){
                $new_video = new GuestMedia;
                $new_video->guest_id = $id;
                $new_video->question_id = $single_id;
                $new_video->type = $type;
                $path = substr($single->store('public/events/videos'), 7);

                $new_video->path = $path;
                $new_video->save();
            }
            if($type == 'image'&& $single){
                $new_image = new GuestMedia;
                $new_image->guest_id = $id;
                $new_image->question_id = $single_id;
                $new_image->type = $type;
                // return $single;
                $path = substr($single->store('public/events/images'), 7);
                
                $new_image->path = $path;
                $new_image->save();
            }
            // Saves text answer
            if($type == 'text'&& $single){
                $new_text_answer = new GuestText;
                $new_text_answer->question_id = $single_id;
                $new_text_answer->guest_id = $id;
                $new_text_answer->answer = $single;
                $new_text_answer->save();
                
            }
            // Saves radio button answer
            if($type == 'radio'&& $single){
                $new_radio_answer = new GuestRadio;
                $new_radio_answer->guest_id = $id;
                $new_radio_answer->answer_id = $single;
                $new_radio_answer->question_id = $single_id;
                $new_radio_answer->save();
                
            }
            // Saves checkbox answers
            if($type == 'check'&& $single){
                $guest = Guest::findOrFail($id);
                foreach($single as $check){
                    $guest->answers()->attach($check);
                }
                
            }
        }
        return redirect('events');
        // $guest = Guest::find($id)->answers()->attach($request->id_odgovora);

        // return redirect('tests/questions/'.$guest->id);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $guest = Guest::findOrFail($id);
      $event = Event::findOrFail($guest->event->id);
      $questions = Question::where('event_id',$event->id)->where('status', '1')->get();
      return view('tests.show', compact('guest', 'event', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
