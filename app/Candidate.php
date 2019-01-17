<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{   

    protected $fillable = [
        'full_name','party_id','address','pic'
    ];

    public function votings(){
    	return $this->hasMany(Voting::class);
    }

    public function candidate_registrations(){
    	return $this->hasMany(CandidateRegistration::class);
    }

    public function party(){
    	return $this->belongsTo(Party::class);
    }

    public function getPic(){
        if($this->pic == ''){
            return 'img/default-user-profile.png';
        }

        return $this->pic;
    }

}
