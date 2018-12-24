<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateRegistration extends Model
{
    public function area(){
    	return $this->belongsTo(Area::class);
    }

    public function candidate(){
    	return $this->belongsTo(Candidate::class);
    }

    public function election(){
    	return $this->belongsTo(Election::class);
    }

}
