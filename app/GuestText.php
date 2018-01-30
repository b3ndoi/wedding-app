<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestText extends Model
{
    protected $table = 'guest_text';
    protected $fillable  = ['guest_id', 'question_id', 'answer'];

    public function guest(){
      return $this->belongsTo('App\Guest');
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }
}
