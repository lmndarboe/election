<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function votings(){
    	return $this->hasMany(Voting::class);
    }

    public function candidate_registrations(){
    	return $this->hasMany(CandidateRegistration::class);
    }

    public function party(){
    	return $this->belongsTo(Party::class);
    }

}
