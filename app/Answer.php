<?php

namespace App;
use App\Answer;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['question_id', 'name', 'is_correct'];

    public function question(){
        return Answer::belongsTo('App\Question');
    }
}
