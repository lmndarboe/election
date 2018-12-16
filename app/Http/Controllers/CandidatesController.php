<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Party;
class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidates.index',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $parties = Party::all();
        return view('candidates.create',compact('parties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'full_name' => 'required|string|max:255',
            'party_id' => 'required',
            'address' => 'required',
        ]);
        Candidate::create([
            'full_name' => $request['full_name'],
            'party_id' => $request['party_id'],
            'address' => $request['address'],
        ]);

        return redirect(route('candidates.index'))->with(
            'status', 'Candidate Created Successfully'
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
    public function edit(Candidate $candidate)
    {   
        $parties = Party::all();
        return view('candidates.edit',compact('candidate','parties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $this->validate($request,[
            'full_name' => 'required|string|max:255',
            'party_id' => 'required',
            'address' => 'required',
        ]);
        $candidate->update($request->all());

        return redirect(route('candidates.index'))->with(
            'status', 'Candidate Updated Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return 'Candidate Deleted Successfully';
    }
}
