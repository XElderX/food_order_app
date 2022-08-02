<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Models\Review::all();
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
            'dish_id' => 'required',
            'author' => 'required',
            'comment' => 'required',
            'rate' => ['required', 'max:10', 'integer']
            
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->passes()) {
            $review = new \App\Models\Review();
            $review->dish_id = $data['dish_id'];
            $review->author = $data['author'];
            $review->comment = $data['comment'];
            $review->rate = $data['rate'];
            return ($review->save() !== 1) ? 
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
        return \App\Models\Review::findOrFail($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (\App\Models\Review::destroy($id) == 1) ? 
        response()->json(['success' => 'success'], 200) : 
        response()->json(['error' => 'deleting from database was not successful'], 500);
    }
    public function reviewsCount($id)
    {

   
        return Review::where('dish_id', $id)->count();
  
    }
    public function avgDishReview($id)
    {
        $sumOfRates = Review::where('dish_id', $id)->sum('rate');
        $ratesCount = Review::where('dish_id', $id)->count();

        
        return ($ratesCount!==0) ? $sumOfRates / $ratesCount : 0;
  
    }
    public function reviewsAll($id)
    {
        Return Review::where('dish_id', $id)->get();
        
  
    }
}

