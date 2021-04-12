@extends('layouts.admin')
@section('admin')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">details</th>
      <th scope="col">price</th>
      <th scope="col">photo</th>
      <th scope="col">Category</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($foods))
  @foreach($foods as $food)
    <tr>
      <th scope="row">{{$food->id}}</th>
      <td>{{$food->title}}</td>
      <td>{{$food->details}}</td>
      <td>{{$food->price}}</td>
      <td> <img src="{{ url('/images/foods/'.$food->photo) }}" width="50px"></td>
       <td>{{$food->category->title}}</td>
     <td>
                    <form action="{{ route('foods.edit',$food->id)}}" >
                        {{csrf_field()}}
                        {{method_field('GET')}}
                        <button class="btn btn-info">edit</button>
                    </form>
    </td>

                  <td>
                      <form action="{{ route('foods.destroy',$food->id)}}" method="POST">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger">Delete</button>                 
                      </form>
                  </td> 

    </tr>
    @endforeach
    @endif
  </tbody>
</table>
@endsection