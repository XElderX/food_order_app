<?php

namespace App\Http\Controllers;

use App\Models\Restourant;
use Illuminate\Http\Request;

class RestourantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restourants.index', ['restourants' => Restourant::orderBy('r_name')->get()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restourants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request, ['r_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'working_hours' => 'required'
        ]);
            $restourant = new Restourant();
        // can be used for seeing the insides of the incoming request
            // dd($request->all()); die();
           $restourant->fill($request->all());
           $restourant->save();
           return redirect()->route('restourants.index');
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function show(Restourant $restourant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restourant $restourant)
    {
        return view('restourants.edit', ['restourant' => $restourant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restourant $restourant)
    {
        $this->validate($request, ['r_name' => 'required',
        'city' => 'required',
        'address' => 'required',
        'working_hours' => 'required'
    ]);
        $restourant->fill($request->all());
        $restourant->save();
        return redirect()->route('restourants.index');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restourant $restourant)
    {
        // if (count($restourant->dishes)){ 
        //     return back()->withErrors(['error' => ['Can\'t delete restourant with dishes assigned, please remove dishes first!']]);
        // }
        $restourant->delete();
        return redirect()->route('restourants.index');

    }
}
