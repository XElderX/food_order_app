<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiOrdersController extends Controller
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
        return \App\Models\Order::all();
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
            'user_id' => 'required',
            'name' => 'required', 
            'surname' => 'required',
            'address' => 'required', 
            'email' => 'required',
            'total_price' => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $order = new \App\Models\Order();
            $order->user_id = $data['user_id'];
            $order->name = $data['name'];
            $order->surname = $data['surname'];
            $order->address = $data['address'];
            $order->email = $data['email'];
            $order->status = $data['status'];
            $order->total_price = $data['total_price'];
            return ($order->save() !== 1) ? 
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
        return \App\Models\Order::findOrFail($id);
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
        $order=\App\Models\Order::find($id);
        $order->update($request->all());
        return (\App\Models\Order::findOrFail($id) == true) ?
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
        return (\App\Models\Order::destroy($id) == 1) ? 
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'deleting from database was not successful'], 500);
}
public function userOrders($id)
    {
        Return Order::where('user_id', $id)->get();
        
  
    }
}
