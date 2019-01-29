<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions(){

        return $this->hasMany(Question::class);

    }

    public function getUrlAttribute (){

       // return route("user.show",$this->id);
        return '#';

    }
    public function user (){
        return $this->belongsTo(User::class);
    }
    public function answers (){
        return $this->hasMany(Answer::class);
    }
    public function getAvatarDateAttribute (){

        $email = $this->email;
        $size = 32;

      return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;

    }

    public function favorites (){

        return $this->belongsToMany(Question::class, 'favorites' )->withTimestamps();
    }

    public function VoteQuestions(){

        return $this->morphedByMany(Question::class, 'votable' );
    }

    public function VoteAnswers(){

        return $this->morphedByMany(Answer::class, 'votable' );
    }


}
