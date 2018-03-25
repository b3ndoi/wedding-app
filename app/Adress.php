<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $table = 'adresses';
    protected $fillable = ['name', 'location', 'image', 'event_id'];

    public function event(){
        return $this->belongsTo('App\Event', 'event_id');
    }
}
