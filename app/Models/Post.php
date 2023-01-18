<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body',
        
    ];


//Relationship for the user
    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

//Relationship for the photo
    public function photo()
    {
      return $this->belongsTo('App\Models\Photo');
    }

    //Relationship for the Category
    public function category()
    {
      return $this->belongsTo('App\Models\Category');
    }

    //Relationship for the comments
    public function comments()
    {
      return $this->hasMany('App\Models\Post');
    }



}
