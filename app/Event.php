<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = ['user_id', 'name', 'name_of_groom', 'name_of_bride', 'location', 'date', 'cover_image'];
    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];
    public function user(){
        return Event::belongsTo('App\User');
    }

    public function questions(){
        return Event::hasMany('App\Question', 'event_id');
    }

    public function guests(){
      return $this->hasMany('App\Guest', 'event_id');
    }
}
