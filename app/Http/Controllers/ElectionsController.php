<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Election;
use App\ElectionType;

class ElectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elections = Election::all();
        return view('elections.index',compact('elections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $elections_types = ElectionType::all();
        return view('elections.create',compact('elections_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        //dd($request);
        $this->validate($request,[
            'election_type_id' => 'required',
            'year' => 'required|numeric',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Election::create([
            'election_type_id' => $request['election_type_id'],
            'year' => $request['year'],
            'date' => $request['date'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
        ]);

        return redirect(route('elections.index'))->with(
            'status', 'Election Created Successfully'
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
    public function edit(Election $election)
    {   
        $elections_types = ElectionType::all();
        return view('elections.edit',compact('election','elections_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        $this->validate($request,[
            'election_type_id' => 'required',
            'year' => 'required|numeric',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $election->update($request->all());

        return redirect(route('elections.index'))->with(
            'status', 'Election Updated Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {   
        try {
        
            $election->delete();
            return 'Election deleted successfully';
        } catch (\Exception $e) {
            return 'Error deleting Election ';
            
        }
    }
}
