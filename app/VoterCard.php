<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoterCard extends Model
{
    
    public function votings(){
    	return $this->hasMany(Voting::class);
    }

   

}
