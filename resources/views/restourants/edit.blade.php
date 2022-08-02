@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Restourant info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('restourants.update', $restourant->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Restourant Title: </label>
                            <input type="text" name="r_name" class="form-control" value="{{ $restourant->r_name }}">
                            @error('r_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label for="">City: </label>
                            <input type="text" name="city" class="form-control" value="{{ $restourant->city }}">
                            @error('city')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label>Address: </label>
                            <input type="text" name="address" class="form-control" value="{{ $restourant->address }}">
                            @error('address')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                     <div class="form-group">
                        <label>Working Hours: </label>
                        <input type="text" name="working_hours" class="form-control" value="{{ $restourant->working_hours }}">
                        @error('working_hours')
                     <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                          
                        </div>
                        <button type="submit" class="btn btn-primary">Commit changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
