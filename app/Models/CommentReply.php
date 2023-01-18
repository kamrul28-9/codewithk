<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    //mass assignment.
        protected $fillable = [
            'comment_id',
            'author',
            'email',
            'body',
            'is_active',
        ];

        //Relationship for the Comment
        public function comment()
        {
          return $this->belongsTo('App\Models\Comment');
        }
}
