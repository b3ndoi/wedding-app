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
}
