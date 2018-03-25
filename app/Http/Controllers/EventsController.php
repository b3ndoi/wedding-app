<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\Adress;
use App\GuestMedia;
use App\Question;

use App\Post;


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

        $path = substr($request->file('groom_cover')->store('public/events/groom'), 7);

        $event->groom_cover = $path;
        $path = substr($request->file('bride_cover')->store('public/events/bride'), 7);

        $event->bride_cover = $path;

        $event->user_id = Auth::user()->id;
        $event->name =$request->name;
        $event->bride_about = $request->bride_about;
        $event->groom_about = $request->groom_about;
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
        $event_id = $id;
        return view('events.show',compact('event', 'event_id'));
    }


    public function theme($id)
    {
        $event = Event::find($id);
        $photos = Question::where('event_id', $id)->where('qtype_id', 4)->get();
        $adresses = Adress::where('event_id', $id)->get();
        $posts_stories = Post::where('event_id', $id)->where('category_id', 1)->get();
        $event_id = $id;
        return view('tests.theme',compact('event', 'event_id', 'posts_stories', 'photos', 'adresses'));
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
        $event = Event::findOrFail($id);
        if($request->file('cover_image')){
            Storage::delete($event->cover_image);
            $path = substr($request->file('cover_image')->store('public/events/covers'), 7);
            $event->cover_image = $path;
        }
        if($request->file('bride_cover')){
            Storage::delete($event->bride_cover);
            $path = substr($request->file('bride_cover')->store('public/events/bride'), 7);
            $event->bride_cover = $path;
        }
        if($request->file('groom_cover')){
            Storage::delete($event->groom_cover);
            $path = substr($request->file('groom_cover')->store('public/events/groom'), 7);
            $event->groom_cover = $path;
        }
        $event->name = $request->name;
        $event->bride_about = $request->bride_about;
        $event->groom_about = $request->groom_about;
        $event->name_of_groom = $request->name_of_groom;
        $event->name_of_bride =$request->name_of_bride;
        $event->location = $request->location;
        $event->date = $request->date;
        $event->save();
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
