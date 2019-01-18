<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{

    protected $fillable = [
        'election_type_id','year','date','start_time','end_time'
    ];
    protected $dates = ['date'];
    
    public function votings(){
    	return $this->hasMany(Voting::class);
    }

    public function candidate_registrations(){
    	return $this->hasMany(CandidateRegistration::class);
    }

    public function election_type(){
    	return $this->belongsTo(ElectionType::class);
    }


}
