<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Answer;
use App\Qtype;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $qtypes = DB::table('qtypes')->pluck('name', 'id')->all();
        $event_id = $request->event_id;
        return view('questions.create', compact('qtypes', 'event_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        // http://wedding.loc/answers/create?question_id=5
        
        if($question->qtype->name == "Checkbox button" ||$question->qtype->name == "Radio button"){
            return redirect('answers/create?question_id='.$question->id);
        }else{
            return redirect('events/'.$request->event_id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        $event_id = $question->event->id;
        $guest_check_count = Answer::where('question_id', $id)->get();
        // return $guest_check_count;
        return view('questions.show', compact('question', 'event_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $qtypes = DB::table('qtypes')->pluck('name', 'id')->all();
        $question = Question::findOrFail($id);
        $event_id = $question->event->id;
        return view('questions.edit', compact('question', 'qtypes', 'event_id'));
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
      $question = Question::findOrFail($id);
      $question->update($input);
      return redirect('/events/'.$request->event_id);
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
