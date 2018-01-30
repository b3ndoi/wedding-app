<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestRadio extends Model
{
    protected $table = 'guest_radio';
    protected $fillable  = ['guest_id', 'answer_id'];

    public function guest(){
      return $this->belongsTo('App\Guest');
    }

    public function answer(){
        return $this->belongsTo('App\Answer', 'answer_id');
    }

    public function question(){
        return $this->belongsTo('App\Question', 'question_id');
    }
}
