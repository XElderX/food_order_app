<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reviews.index', ['reviews' => Review::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishes = \App\Models\Dish::orderBy('dish_name')->get();
       
        return view('reviews.create', ['dishes' => $dishes]);
    
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
            'dish_id' => 'required',
            'author' => 'required',
            'comment' => 'required',
            'rate' => ['required', 'max:10', 'integer']
        ]);
            $review = new Review();
        // can be used for seeing the insides of the incoming request
            // dd($request->all()); die();
           $review->fill($request->all());
           $review->save();
           return redirect()->route('dishes.index');
    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
    //    return view('reviews.edit', ['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
    //     $this->validate($request, ['author_id' => 'required',
    //     'comment' => 'required',
    //     'rate' => 'required'
    // ]);
   
    //    $review->fill($request->all());
    //    $review->save();
    //    return redirect()->route('review.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('restourants.index');

    }
   
}
