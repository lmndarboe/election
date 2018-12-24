<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CandidateRegistration;
use App\Candidate;
use App\Area;
use App\Election;

class CandidateRegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidate_registrations = CandidateRegistration::all();
        return view('candidate_registrations.index',compact('candidate_registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidates = Candidate::pluck('full_name','id');
        $areas = Area::pluck('name','id');
        $elections = Election::pluck('year','id');
        return view('candidate_registrations.create',compact('candidates','areas','elections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $candidate_registration = new CandidateRegistration;
        $candidate_registration->area_id = request()->get('area_id');
        $candidate_registration->candidate_id = request()->get('candidate_id');
        $candidate_registration->election_id = request()->get('election_id');
        $candidate_registration->save();

        return redirect(route('candidate_registrations.index'))->with(
            'status', 'Candidate Registered Successfully'
        );
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
        $candidate_registration = CandidateRegistration::find($id);
         $candidates = Candidate::pluck('full_name','id');
        $areas = Area::pluck('name','id');
        $elections = Election::pluck('year','id');
        return view('candidate_registrations.edit',compact('candidates','areas','elections','candidate_registration'));
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

        $candidate_registration = CandidateRegistration::find($id);

        $candidate_registration->area_id = request()->get('area_id');
        $candidate_registration->candidate_id = request()->get('candidate_id');
        $candidate_registration->election_id = request()->get('election_id');
        $candidate_registration->save();

        return redirect(route('candidate_registrations.index'))->with(
            'status', 'Candidate Updated Successfully'
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

            $candidate_registration = CandidateRegistration::find($id);
        
            $candidate_registration->delete();
            return 'Candidate Registration deleted successfully';
        } catch (\Exception $e) {
            return 'Error deleting Candidate Registration';
            
        }


    }
}
