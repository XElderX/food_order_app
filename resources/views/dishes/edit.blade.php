@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Dish info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('dishes.update', $dish->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Dish Title: </label>
                            <input type="text" name="dish_name" class="form-control" value="{{ $dish->dish_name }}">
                            @error('dish_name')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price: </label>
                            <input type="text" name="price" class="form-control" value="{{ $dish->price }}">
                            @error('price')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                        </div>
                        <div class="form-group">
                            <label>Dish image: </label>
                            <input type="url" name="foto_url" class="form-control" value="{{ $dish->foto_url }}">
                            @error('foto_url')
                         <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   
                        <button type="submit" class="btn btn-primary">Commit changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
