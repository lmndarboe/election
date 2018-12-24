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

	public function hasVoted(){

		$election = \App\Election::where('status','ACTIVE')->first();

		if(! is_null($election)){
			
			$voting = \App\Voting::where('voter_card_id',$this->id)
					  ->where('election_id',$election->id)->first();

			return is_null($voting) ? false: true;
		}

		return false;

	}



	public function hasVotedFor($candidate_id){

		$election = \App\Election::where('status','ACTIVE')->first();

		if(! is_null($election)){
			
			$voting = \App\Voting::where('voter_card_id',$this->id)
					  ->where('election_id',$election->id)
					  ->where('candidate_id',$candidate_id)->first();

			return !is_null($voting) ? true: false;
		}

		return false;

	}



}
