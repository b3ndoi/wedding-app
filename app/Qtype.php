<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qtype extends Model
{
  protected $table = 'qtypes';
  public function qtype(){
      return Question::hasMany('App\Question', 'qtype_id');
  }
}
