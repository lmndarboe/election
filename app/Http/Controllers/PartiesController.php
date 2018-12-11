<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Party;

class PartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();
        return view('parties.index',compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'flag_bearer' => 'required|string|max:255',
            'flag_color' => 'required|string|max:255',
            //'file' => 'required',
        ]);
        
       
       // dd($request);
    

        $file = str_random(20);

        //dd(base64_encode($request['file']));

         Storage::put(
        //     'images/'.$file,
        //     'data:image/jpeg;base64'.base64_encode(file_get_contents($request['file'[))
            'images/'.$file,
            'data:image/jpeg;base64'.base64_encode($request['file'])
         );
        
        Party::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'flag_bearer' => $request['flag_bearer'],
            'flag_color' => $request['flag_color'],
            'logo' => 'images/'.$file,
        ]);


        return redirect(route('parties.index'))->with(
            'status', 'Party Photo Successfully Uploaded!'
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
    public function edit(Party $party)
    {
        return view('parties.edit',compact('party'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'flag_bearer' => 'required|string|max:255',
            'flag_color' => 'required|string|max:255',
        ]);
        $party->update($request->all());

        return redirect(route('parties.index'))->with(
            'status', 'Party Updated Successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        $party->delete();

        return 'Party deleted successfully';
    }
}
