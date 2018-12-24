<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoterCard extends Model
{
    
    public function votings(){
    	return $this->hasMany(Voting::class);
    }

    public function area(){
    	return $this->belongsTo(Area::class);
    }


    public function user(){
    	return $this->belongsTo(User::class);
    }

   

}
