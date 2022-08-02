@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
    
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Add review:</div>
               <div class="card-body">
                   <form action="{{ route('reviews.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                        <label>Choose dish </label>
                        <select name="dish_id" id="" class="form-control">
                             <option value="" selected disabled>Select dish</option>
                             @foreach ($dishes as $dish)
                             <option value="{{ $dish->id }}">{{ $dish->dish_name }}</option>
                             @endforeach
                        </select>
                        @error('dish_id')
                     <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                    </div>





                       <div class="form-group">
                           <label>Author: </label>
                           <input type="text" name="author" class="form-control">
                        </div>
                        @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        
                       <div class="form-group">
                           <label>Comment </label>
                           <input type="text" name="comment" class="form-control"> 
                           @error('comment')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label>Rate </label>
                            <input type="number" name="rate" class="form-control"> 
                            @error('rate')
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