@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
    
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create a new dish:</div>
               <div class="card-body">
                   <form action="{{ route('dishes.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Title: </label>
                           <input type="text" name="dish_name" class="form-control">
                        </div>
                        @error('dish_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                       <div class="form-group">
                           <label>price</label>
                           <input type="text" name="price" class="form-control"> 
                           @error('price')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label>Dish image </label>
                            <input type="url" name="foto_url" class="form-control" placeholder="200x150px"  size="200"> 
                            
                         </div>


                         <div class="form-group">
                            <label>Choose Restourant </label>
                            <select name="restourant_id" id="" class="form-control">
                                 <option value="" selected disabled>Select Restourant</option>
                                 @foreach ($restourants as $restourant)
                                 <option value="{{ $restourant->id }}">{{ $restourant->r_name }}</option>
                                 @endforeach
                            </select>
                            @error('country_id')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                    
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection