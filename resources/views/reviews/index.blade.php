@extends('layouts.app')
@section('content')
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <table class="table">
        <tr>
            <th>Author</th>
            <th>Dish</th>
            <th>Comment</th>
            <th>Rate</th>
            <th>Created</th>
        </tr>
        @foreach ($reviews as $review)
        <tr>
            <td>{{ $review->author }}</td>
            <td>{{ $review->dish->dish_name }}</td>
            <td>{{ $review->comment }}</td>
            <td>{{ $review->rate }}</td>
            <td>{{ $review->created_at }}</td>
           
            <td>
                <form action={{ route('reviews.destroy', $review->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('reviews.edit', $review->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('reviews.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection
