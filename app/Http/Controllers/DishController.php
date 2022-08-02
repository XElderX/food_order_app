<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     if(isset($request->restourant_id) && $request->restourant_id !== 0)
    //     $dishes = \App\Models\Dish::where('country_id', $request->country_id)->orderBy('surname')->get();
    // else
    //     $dishes = \App\Models\Dish::orderBy('surname')->get();
    // $restourants = \App\Models\Restourant::orderBy('r_name')->get();
        
    return view('dishes.index', ['dishes' => Dish::orderBy('dish_name')->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restourants = \App\Models\Restourant::orderBy('r_name')->get();
        return view('dishes.create', ['restourants' => $restourants]);
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
            $this->validate($request, [
            'dish_name' => 'required',
            'price' => 'required',
            'restourant_id' => 'required'
            
        ]);
            $dish = new Dish();
        // can be used for seeing the insides of the incoming request
            // dd($request->all()); die();
           $dish->fill($request->all());
           $dish->save();
           return redirect()->route('dishes.index');
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show( $dish)
    {
        $dishe = \App\Models\Dish::find($dish);
        // dump($dishe->reviews());

        return view('dishes.dish', ['dish' => $dishe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
       return view('dishes.edit', ['dish' => $dish]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        {
            $this->validate($request, [
            'dish_name' => 'required',
            'price' => 'required',
            
        ]);
        
      
           $dish->fill($request->all());
           $dish->save();
           return redirect()->route('dishes.index');
    
        }

    }
    
    public function review($id, Request $request){
        $this->validate($request, ['comment' => 'required']);
        $dish = \App\Models\Dish::find($id);
        $review = new \App\Models\Review();
        $review->comment = $request['comment'];
        $dish->reviews()->save($dish); 
        return redirect();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index');
    }
    // public function averageRating(){
    //     $avgRating =DB::table('reviews');
    //     // ->where('dish_id' == 'id');
    //     dd($avgRating);
        


    }

