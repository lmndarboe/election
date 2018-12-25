<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return view('areas.index',compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = \App\Area::pluck('name','id');
        $areas = ['NULL' => 'No Parent'] + $areas->all();
        return view('areas.create',compact('areas'));
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
            'name' => 'required|string|max:255',
            'type' => 'required|string'
        ]);

        $parent_id = request()->get('parent_id');
        $parent_id = ($parent_id == 'NULL') ? null :  $parent_id;

        // return $parent_id;
        
        Area::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'parent_id' => $parent_id
        ]);

        return redirect()->route('areas.index')->with('success', 'Area Save Successfully');
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
    public function edit(Area $area)
    {
        return view('areas.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'type' => 'required|string'
        ]);

        $parent_id = request()->get('parent_id');
        $parent_id = ($parent_id == 'NULL') ? null :  $parent_id;

        $input = $request->all();
        $input['parent_id'] = $parent_id;
        $area->update($input);

        return redirect()->route('areas.index')->with('success', 'Area Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return 'Area Deleted Successfully';
        //return redirect()->route('areas.index')->with('success', 'Area Save Successfully');
    }
}
