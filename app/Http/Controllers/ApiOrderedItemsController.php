<?php

namespace App\Http\Controllers;

use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiOrderedItemsController extends Controller
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

        return OrderedItem::with(['order', 'dish'])->get();
        // return \App\Models\OrderedItem::all();
        
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
            'order_id' => 'required', 
            'dish_id' => 'required',
            'price' => 'required',
            
            
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $orderedItem = new \App\Models\OrderedItem();
            $orderedItem->order_id = $data['order_id'];
            $orderedItem->dish_id = $data['dish_id'];
            $orderedItem->quantity = $data['quantity'];
            $orderedItem->price = $data['price'];
        
            return ($orderedItem->save() !== 1) ? 
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
        return \App\Models\OrderedItem::findOrFail($id);
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
        $orderedItem=\App\Models\OrderedItem::find($id);
        $orderedItem->update($request->all());
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
        return (\App\Models\OrderedItem::destroy($id) == 1) ? 
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'deleting from database was not successful'], 500);
}
public function showItemsByOrder($id)
    {

        $orderItem = OrderedItem::where('order_id', $id)->get();
        
        Return $orderItem;
        
  
    }

  

}
