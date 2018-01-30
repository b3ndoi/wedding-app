<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['event_id', 'question', 'qtype_id', 'status'];

    public function event(){
        return Question::belongsTo('App\Event');
    }
    public function qtype(){
        return Question::belongsTo('App\Qtype');
    }

    public function answers(){
        return Question::hasMany('App\Answer');
    }

    public function gusetsText(){
        return Question::hasMany('App\GuestText');
    }

    public function gusetsMedia(){
        return Question::hasMany('App\GuestMedia');
    }

    public function guestRadio(){
        return $this->hasMany('App\GuestRadio', 'question_id');
    }

    public function orderdAnswers(){
        $answers = Answer::where('question_id', $this->id)->orderBy('position', 'asc')->get();
        return $answers;
    }
}
