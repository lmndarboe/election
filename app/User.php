<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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


    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function voter_cards(){
        return $this->hasMany(VoterCard::class);
    }

    public function isAdmin(){
        return $this->group->name == 'Administrators';
    }


    public function isVoter(){
        return $this->group->name == 'Voters';
    }

}
