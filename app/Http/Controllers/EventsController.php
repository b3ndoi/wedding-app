<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Event;
use App\GuestMedia;
use App\Question;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('user_id', Auth::user()->id)->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    public function config($id){
        
        $event = Event::findOrFail($id);

        return view('events.config', compact('event'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        // $user = Auth::user();
        // $user->charge(100); Stripe Charge
        // if($file = $request->file('cover_image')){
        //   $name = time().'.'.$file->getClientOriginalExtension();
        //   $tip = explode('/', $file->getMimeType());
        //   $file->move('vencanja/'.date("Y").'/'.date("m").'/'.date("d").'/'.$tip[0], $name);
        //   $event->cover_image = 'vencanja/'.date("Y").'/'.date("m").'/'.date("d").'/'.$tip[0].'/'.$name;
        // }

        $path = substr($request->file('cover_image')->store('public/events/covers'), 7);

        $event->cover_image = $path;
        $event->user_id = Auth::user()->id;
        $event->name =$request->name;
        $event->name_of_groom = $request->name_of_groom;
        $event->name_of_bride =$request->name_of_bride;
        $event->location = $request->location;
        $event->date = $request->date;
        $event;
        $event->save();
        return redirect('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::findOrFail($id);
      return view('events.edit', compact('event'));
    }

    public function sortPhotos(Request $request){
        $i = 0;
        // return response($request->photo, 201);
        foreach($request->photo as $id_answer){
            $answer = GuestMedia::findOrFail($id_answer);
            $i++;
            $answer->sort = $i;
            $answer->save();
        }
        return response(null, 201);
    //   Answer::create($request->all());
    //   return redirect('/answers/create?question_id='.$request->question_id);
    }

    public function sortQuestions(Request $request){
        $i = 0;
        // return response($request->photo, 201);
        foreach($request->question as $id_answer){
            $answer = Question::findOrFail($id_answer);
            $i++;
            $answer->sort = $i;
            $answer->save();
        }
        return response(null, 201);
    //   Answer::create($request->all());
    //   return redirect('/answers/create?question_id='.$request->question_id);
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
      $input = $request->all();
      $event = Event::findOrFail($id);
      $event->update($input);
      return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $event = Event::find($id);
        if($event->questions()->count()>0){
            $event->questions()->delete();
        }
        $event->delete();
        return $id;
    }
}
