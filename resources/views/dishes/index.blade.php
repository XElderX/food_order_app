@extends('layouts.app')
@section('content')
<div class="card-body">
    @if($errors->any())
    <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <table class="table">
        <tr>
            <th>Dish name</th>
            <th>Restourant</th>
            <th>Price</th>
            <th>Image</th>
            <th>Average rating</th>
            <th>Actions</th>
        </tr>
        @foreach ($dishes as $dish)
        <tr>
            <td>{{ $dish->dish_name }}</td>
            <td>{{ $dish->restourant->r_name }}</td>
            <td>{{ round($dish->price, 2) }}</td>

            
            <td><img src="{{ $dish->foto_url }}" alt="dish_img" style="width:200px;height:150px;"></td>
            <td>Average: 

                @if (($dish->reviews->count('rate')!==0))
                {{round(($dish->reviews->sum('rate')) / ($dish->reviews->count('rate')), 2) }}
                {{-- <td>{{ dd($dish->reviews->sum('rate')/count('rate')) }}</td> --}}
                @else

                <span>no reviews yet</span>
                    
                @endif
  
                <p style="font-size: 10px">reviews count: 
                    {{ count($dish->reviews) }} 
                    | <a href="{{ route('dishes.show', $dish['id']) }}">View dish reviews it</a></p>
            
            
            </td>
            <td>
                <form action={{ route('dishes.destroy', $dish->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('dishes.edit', $dish->id) }}>Edit</a>
                    {{-- <a class="btn btn-success" href={{ route('dish.edit', $dish->id) }}>Edit</a> --}}
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('dishes.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection
