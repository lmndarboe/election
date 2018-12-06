<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    
    public function election(){
        return $this->belongsTo(Election::class);
    }


    public function area(){
        return $this->belongsTo(Area::class);
    }


    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }


    public function voter_card(){
        return $this->belongsTo(VoterCard::class);
    }
}
