@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
    
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create a restourant:</div>
               <div class="card-body">
                   <form action="{{ route('restourants.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                           <label>Title: </label>
                           <input type="text" name="r_name" class="form-control">
                        </div>
                        @error('r_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                       <div class="form-group">
                           <label>City: </label>
                           <input type="text" name="city" class="form-control"> 
                           @error('city')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label>Address: </label>
                            <input type="text" name="address" class="form-control"> 
                            @error('address')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                         </div>
                         <div class="form-group">
                            <label>Working Hours: </label>
                            <input type="text" name="working_hours" class="form-control"> 
                            @error('working_hours')
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