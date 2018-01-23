<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestMedia extends Model
{
    protected $table = 'guest_media';
    protected $fillable  = ['guest_id', 'path', 'type'];

    public function guest(){
      return $this->belongsTo('App\Guest');
    }
}
