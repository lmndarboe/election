<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{   
    protected $fillable = [
    'name','type','parent_id'
    ];
    public function votings(){
    	return $this->hasMany(Voting::class);
    }

    public function candidate_registrations(){
    	return $this->hasMany(CandidateRegistration::class);
    }

    public function voter_cards(){
    	return $this->hasMany(VoterCard::class);
    }

    public function parent(){
        return $this->belongsTo(Area::class,'parent_id');
    }

    public function childrens(){
        return $this->hasMany(Area::class,'parent_id');
    }

    public function getAreas(){
        $areas[] = $this->id;

        while($this->childrens){

        }
    }


    public function canVoteHere($voter_card){


        if($this->id == $voter_card->area_id){
            return true;
        }

        $area = $voter_card->parent;
        $maxDepth = 50;
        $i = 0;
        while($i < $maxDepth){
            if(is_null($area)) return false;
            if( $area->id ==  $voter_card->area_id) return true;

            $area = $area->parent;
            $i++;
        }

        return false;


    }





}
