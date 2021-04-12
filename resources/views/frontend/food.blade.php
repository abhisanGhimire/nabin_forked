@extends('layouts.frontend')
@section('frontend')

<div class="container">
    @foreach($foods as $food)

    <div class="row">
        <div class="col-sm-3">
            <div class="food-item">
                    <h2>{{$food->title}}</h2>
                <td> <img src="{{ url('/images/foods/'.$food->photo) }}" width="50px"></td>
                <div class="price">${{$food->price}}</div>
                    <div class="text-content">
                <h4>{{$food->category->title}}</h4>
                    <p>{{$food->details}}</p>
                    </div>
            </div>
            <div>
                        <form action="{{route('addtocart',$food->id)}}" method ="POST" >
                        {{csrf_field()}}
                        <input type="hidden" name="food_id" value="{{$food->id}}">
                        <button type="submit" class="btn btn-success">Add To Cart</button>
                        </form>
                        </div>
        </div>
    </div>
    @endforeach
</div>



@endsection