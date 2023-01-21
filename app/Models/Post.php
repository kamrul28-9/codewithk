<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    use SluggableScopeHelpers;


    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body',
    ];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'     => 'title',
                'onUpdate'   => true,
            ]
        ];
    }


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


    public function comments()
    {
    return $this->hasMany('App\Models\Comment');
    }


    public function photoPlaceholder()
    {
    return "http://place-hold.it/700x200";
    }



}
