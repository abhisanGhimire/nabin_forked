@php use Illuminate\Support\Facades\Session; @endphp
@extends('layouts.frontend')
@section('frontend')


@if (Session()->has('success'))
<div class="container offset mt-4">
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{Session('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
    

@endif


 <div class="container offset card">
     <h3 class="text-center">Cart List</h3>
 @if (!$foods->isEmpty()) 
    <table class="table">
      <thead>

                <tr>
                    <th style="width:40%" class="text-center">Food</th>
                    <th style="width:15%">Price</th>
                    <th style="width:20%">Quantity</th>
                    <th style="width:15%" class="text-right">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
      </thead>
        <tbody>
                    
                    @foreach($foods as $id =>$food)
                                
                                <?php $total = 0 ?>
                                <?php $total += (int)$food->price * (int)$food->cart_qty ?>
                     <tr>
                            <td data-th="Food">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs"><img src="{{ url('/images/foods/'.$food->photo) }}"  class="img-responsive" width="50px"></div>
                                    <div class="">
                                        <h5 class="">{{ $food->title }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $food->price }}</td>
                            <td data-th="quantity"> 
                              <div class="">
                                <form action="{{route('updatecart',$food->cart_id)}}" method="post">
                                @csrf
                                  <div class="row">
                                    <div class="input-group">
                                      <input  type="number" value="{{ $food->cart_qty }}" class="form-control prc" name ="quantity" required id="qunatity">
                                      <span class="text-danger">{{ $errors->first('quantity')}}</span>
                                      <input type="hidden" name="price" value ="{{(int)$food->price * (int)$food->cart_qty}}">
                                        <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="Update Quantity">
                                         <button type ="submit" class="input-group-text"><i class="fas fa-chevron-right"></i> </button>
                                        </div>
                                    </div>
                                  </div>

                                  </form>
                              </div>
                            </td>

                            <td data-th="subtotal" class="text-right" name ="price">
                              RS {{ (int)$food->cart_price}}
                            </td>
                            
                            <td>
                              <a href="{{route('removecart',$food->cart_id)}}">
                              <button class="btn btn-danger">Remove</button>
                              </a>
                            </td>
                      </tr>
                       @endforeach
                       
       
          
        </tbody>

    </table>
    <hr/>

<div class="row">


  <form action="{{route('ordernow')}}" method ="get" class=" ml-2 mb-0 mr-2">
                    {{csrf_field()}}
      <button type="submit" class="btn btn-primary " >Order Now</button>
  </form>

  <a href="{{route('menus')}}" class="btn btn-success d-inline">Add More Foods</a>

@else
<div class="col-12 mt-5">
    <p class="lead text-center mb-4">Your Cart is Empty !</p> 
    <p class="text-center">
      <a href="{{route('menus')}}" class="btn btn-success d-inline-block">Add Food</a>
    
    </p> 

</div>


  @endif

</div>
 </div>      



    

@endsection

<script>

</script>