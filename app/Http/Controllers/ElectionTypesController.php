<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectionTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $election_types = \App\ElectionType::all();
        return view('election_types.index',compact('election_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('election_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $election_type = new \App\ElectionType;
        $election_type->name = $request->get('name');
        $election_type->save();

        return redirect('/election_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $election_type = \App\ElectionType::find($id);
        return view('election_types.edit',compact('election_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $election_type = \App\ElectionType::find($id);
        return view('election_types.edit',compact('election_type'));
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
        $election_type = \App\ElectionType::find($id);
        $election_type->name = $request->get('name');
        $election_type->save();

        return redirect('/election_types');
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
            $election_type = \App\ElectionType::find($id);
            $election_type->delete();
            return 'Election Type deleted successfully';
        } catch (\Exception $e) {
            return 'Error deleting Election Type';
            
        }
    }
}
