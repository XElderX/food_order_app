<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiMenusController extends Controller
{
        // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Models\Menu::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $rules = [
            'menu_title' => 'required',
            'restourant_id' => 'required', 
            
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $menu = new \App\Models\Menu();
            $menu->menu_title = $data['menu_title'];
            $menu->restourant_id = $data['restourant_id'];
            return ($menu->save() !== 1) ? 
                response()->json(['success' => 'success'], 201) : 
                response()->json(['error' => 'saving to database was not successful'], 500)  ;
        } else {
            return $validator->errors()->all();
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
        return \App\Models\Menu::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $menu=\App\Models\Menu::find($id);
        $menu->update($request->all());
        return (\App\Models\Menu::findOrFail($id) == true) ?
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'updating database was not successful'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (\App\Models\Menu::destroy($id) == 1) ? 
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'deleting from database was not successful'], 500);
}
}
