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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/voting',function(){
	return view('welcome');
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

	if(is_null($voter_card)) return redirect()->back()->with('error','Card Number/PIN Combinationis wrong');	
	// return $voter_card->user;;

	auth()->loginUsingId($voter_card->user_id);

	return redirect('/');
});


Auth::routes();
