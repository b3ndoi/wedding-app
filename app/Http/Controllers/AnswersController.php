<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Question;
use App\Answer;
use App\GuestMedia;
class AnswersController extends Controller
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
        $question = Question::findOrFail($request->question_id);
        $answers = Answer::where('question_id',$request->question_id)->orderBy('position', 'asc')->get();
        return view('answers.create', compact('question', 'answers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Answer::create($request->all());
      return redirect('/answers/create?question_id='.$request->question_id);
    }

    public function sort(Request $request, $id)
    {
        $i = 0;
        foreach($request->answer as $id_answer){
            $answer = Answer::findOrFail($id_answer);
            $i++;
            $answer->position = $i;
            $answer->save();
        }
        return response(null, 201);
    //   Answer::create($request->all());
    //   return redirect('/answers/create?question_id='.$request->question_id);
    }

    public function deleteAnswerMedia($id){
        $media = GuestMedia::findOrFail($id);
        Storage::delete('public/'.$media->path);
        $media->delete();
        return redirect('questions/'.$media->question_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
