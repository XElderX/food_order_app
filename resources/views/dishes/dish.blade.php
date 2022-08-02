@extends('layouts.app')
@section('content')

{{-- Auto respond when creating new comment --}}
{{-- @if (session('status_success'))
     <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
     <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif --}}

{{-- @if ($errors->any())
<div>
    @foreach ($errors->all() as $error)
        <p style="color: red">{{ $error }}</p>
    @endforeach
</div>
@endif --}}
{{-- 
<form action="{{ route('dishes.update', $dish['id']) }}" method="POST">
    @method('PUT') @csrf 
    @if (auth()->user()->id === $project['user_id'])
    <input type="text" name="title" value="{{ $dish['dish_name'] }}"><br>
    <input type="text" name="text" value="{{ $dish['average_Rate'] }}"><br>
    <input class="btn btn-primary" type="submit" value="UPDATE">
    @else
    <input type="text" name="title" value="{{ $project['title'] }}" readonly><br>
    <input type="text" name="text" value="{{ $project['text'] }}" readonly><br>
    <input type="text" name="credit_count" value="{{ $project['credit_count'] }}" readonly><br>
    @endif
</form> --}}

<p style="font-size: 10px; margin-top: 15px">reviews: </p>
@foreach ($dish->reviews as $review)
    <p style="font-size: 10px"<b>Dish: </b>: {{$dish->dish_name }}<br> 
        Review author said: {{ $review->comment }} <br> 
        Rated as: {{ $review->rate}} of 10 <br>
        reviewed by: {{$review->author}} <br>
          {{ $review['created_at'] }}</p>
@endforeach

<form action="{{route('reviews.store', $dish->id)}}" method="POST">
    @csrf
    <input type="hidden" name="dish_id" value="{{$dish->id}}"><br>
    <label for='author'>Author</label><br>
    @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="author"><br>
    <label for='rate'>How do you rate that dish 1-10</label><br>
    @error('rate')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="number" name="rate"><br>
    <label for='comment'>Review comment</label><br>
    @error('comment')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="comment"><br>
    <input class="btn btn-primary" type="submit" value="ADD Review">
</form>

@endsection


