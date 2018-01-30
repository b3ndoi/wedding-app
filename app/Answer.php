<?php

namespace App;
use App\Answer;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['question_id', 'name', 'is_correct', 'position'];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function guestRadioAnswer(){
        return $this->hasMany('App\GuestRadio', 'answer_id');
    }

    public function guests(){
        return $this->belongsToMany('App\Guest', 'guests_answers', 'answer_id', 'guest_id');
    }
}
