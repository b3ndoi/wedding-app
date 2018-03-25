<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['category_id', 'date', 'body', 'title', 'image', 'event_id'];

    protected $dates  = ['date'];
    public function category(){
        return $this->belongsTo('App\PostCategory', 'category_id');
    }
    

    public function event(){
        return $this->belongsTo('App\Event', 'event_id');
    }
}
