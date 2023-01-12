<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'photo_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Relation setup: role for the users
    public function role()
    {
      return $this->belongsTo('App\Models\Role');
    }

    //Relation setup: Photo for the users
    public function photo()
    {
      return $this->belongsTo('App\Models\Photo');
    }


    public function getpasswordAttribute($password)
    {

      if (!empty($password)) {
          $this-> attributes['password'] = bcrypt($password);
      }

    }

    //for Admin middleware security
    public function isAdmin(){

      if($this->role->name == "administrator" && $this->is_active == 1) { // make sure role is assigned in above function
        return true;
      }
      return false;

    }

    //Relationship setup for the user.
    public function posts()
    {
      return $this->hasMany('App\Models\Post');
    }



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
