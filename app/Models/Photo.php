<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // route set for index.blade.php
    protected $uploads = '/images/';

    protected $fillable = [
        'file',
    ];

public function getfileAttribute($photo)
{
  return $this-> uploads . $photo;
}

}
