<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function (){

	Route::get('/vote-for/{id}',function($id){

		$candidate_registration = \App\CandidateRegistration::find($id);

		if(! is_null($candidate_registration)){

			if(! auth()->user()->voter_card->hasVoted() ){

				$voting = new \App\Voting;
				$voting->area_id = $candidate_registration->area_id;
				$voting->candidate_id = $candidate_registration->candidate_id;
				$voting->election_id = $candidate_registration->election_id;
				$voting->voter_card_id = auth()->user()->voter_card->id;
				$voting->save();


			}
			


		}

		// return auth()->user()->voter_card->id;
		// return $candidate_registration;

		return redirect()->back();
	});


	Route::get('/', function () {
		if(! auth()->user()->isAdmin()){


			$election = \App\Election::where('status','ACTIVE')->first();



			if(! is_null($election)){
				$candidates = $election->candidate_registrations;
				return  redirect('/voting');
			}


		}

		$election = \App\Election::where('status','ACTIVE')->first();

		if(! is_null($election)){
			$candidates = $election->candidate_registrations;
			return  view('welcome',compact('candidates','election'));
		}


		return view('welcome');
	});

	Route::get('/voting',function(){

		if( auth()->user()->isAdmin()) return redirect()->back();

		$election = \App\Election::where('status','ACTIVE')->first();

		if(! is_null($election)){
			$candidates = $election->candidate_registrations;
			return  view('voting',compact('candidates','election'));
		}

	});

	Route::get('voter-home',function(){
		return view('welcome');
	});


	Route::resource('election_types','ElectionTypesController');
	Route::resource('parties','PartiesController');
	Route::resource('areas','AreasController');
	Route::resource('candidates','CandidatesController');
	Route::resource('elections','ElectionsController');
	Route::resource('candidate_registrations','CandidateRegistrationsController');
	Route::resource('voter_cards','VoterCardsController');

	Auth::routes();

	Route::get('/home', 'HomeController@index')->name('home');


});

Route::get('/voter-login',function(){
	return view('auth.login_voters');
});

Route::post('/voter-login',function(){
	$card_number = request()->get('card_number');
	$pin = request()->get('pin');

	$voter_card = \App\VoterCard::where('card_number',$card_number)->first();
	if(is_null($voter_card)) return redirect()->back()->with('error','Card number does not exist');	

	$voter_card = \App\VoterCard::where('card_number',$card_number)
	->where('pin',$pin)->first();

	if(is_null($voter_card)) return redirect()->back()->with('error','Card Number/PIN Combinationis wrong')->withInput();	
	// return $voter_card->user;;

	auth()->loginUsingId($voter_card->user_id);

	$election = \App\Election::where('status','ACTIVE')->first();

	if(! is_null($election)){
		return redirect('/voting');
	}

	return redirect('/');
});


Auth::routes();
