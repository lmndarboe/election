<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoterCard;
use App\Area;

class VoterCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voter_cards = VoterCard::all();
        return view('voter_cards.index',compact('voter_cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $areas = Area::pluck('name','id');
        return view('voter_cards.create',compact('areas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            \DB::connection()->getPdo()->beginTransaction();
            $voter_group = \App\Group::where('name','Voters')->first();

            $user = new \App\User;
            $user->group_id = $voter_group->id;;
            $user->name = request()->get('full_name');
            $user->email = request()->get('email');
            $user->password = \Hash::make('123');
            $user->save();

            $voter_card = new VoterCard;
            $voter_card->user_id = $user->id;
            $voter_card->area_id = request()->get('area_id');
            $voter_card->full_name = request()->get('full_name');
            $voter_card->card_number = request()->get('card_number');
            $voter_card->address = request()->get('address');
            $voter_card->email = request()->get('email');
            $voter_card->dob = request()->get('dob');
            $voter_card->status = 'ACTIVE';
            $voter_card->expiry_date = date('Y-m-d');
            $voter_card->pin = '123';
            $voter_card->save();

           



            \DB::connection()->getPdo()->commit();

             return redirect(route('voter_cards.index'))->with(
                'status', 'Voter Card Registered Successfully'
                );
            
        } catch (Exception $e) {
            return $e;

            \DB::connection()->getPdo()->rollBack();
            
        }



        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voter_card = VoterCard::find($id);
        $areas = Area::pluck('name','id');
        return view('voter_cards.edit',compact('areas','voter_card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $voter_card = VoterCard::find($id);
        $voter_card->area_id = request()->get('area_id');
        $voter_card->full_name = request()->get('full_name');
        $voter_card->card_number = request()->get('card_number');
        $voter_card->address = request()->get('address');
        $voter_card->email = request()->get('email');
        $voter_card->dob = request()->get('dob');
        $voter_card->save();

        return redirect(route('voter_cards.index'))->with(
            'status', 'Voter Card Updated Successfully'
            );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {

            $voter_card = VoterCard::find($id);

            $voter_card->delete();
            return 'Voter Card deleted successfully';
        } catch (\Exception $e) {
            return 'Error deleting Voter Card';
            
        }

    }
}
