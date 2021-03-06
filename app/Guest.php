<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    protected $fillable  = ['event_id', 'name'];

    public function event(){
      return $this->belongsTo('App\Event');
    }

    public function answers(){
      return $this->belongsToMany('App\Answer', 'guests_answers', 'guest_id', 'answer_id');
    }

    public function media(){
      return $this->hasMany('App\GuestMedia', 'guest_id');
    }

    public function radionAnswers(){
      return $this->hasMany('App\GuestRadio', 'guest_id');
    }

    public function textAnswers(){
      return $this->hasMany('App\GuestRadio', 'guest_id');
    }
}
