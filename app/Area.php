<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function votings(){
    	return $this->hasMany(Voting::class);
    }

    public function candidate_registrations(){
    	return $this->hasMany(CandidateRegistration::class);
    }
}
