@extends('layouts.frontend')
@section('frontend')

<div class="mt-2 offset">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-12">

						<h4>Shipping Details</h4>
					</div>
					<div class="card">

						@if (!$shippingaddress->isEmpty())
							@if(isset($hhh))
						<div class="card-body">
							<p class="small-text">
							{{$hhh->state}} - {{$hhh->city}} - {{$hhh->area}} - {{$hhh->address1 }}
							</p>
							@if(isset($food))
							<form action="{{route('buyselect')}}" method="post">
								@csrf
								<button type="submit" class="btn btn-success pl-3 pr-3 mt-3 ml-2"> Change Address
								<input type="hidden" name="food_id" value="{{$food->id}}">
							<input type="hidden" name="total" value="{{$total}}">
							@if(isset($quantity))
							<input type="hidden" name="quantity" value="{{$quantity}}">
							@endif
								</form>
							</div>
							@endif
							@else
						@foreach($shippingaddress as $shipping)
						<div class="card-body">
							<p class="small-text">
							<span class="badge badge-pill badge-warning">Home</span> 
							{{$shipping->state}} - {{$shipping->city}} - {{$shipping->area}} - {{$shipping->address1 }}
							</p>
						
							@endforeach
							@if(isset($food))
							<form action="{{route('buyselect')}}" method="post">
							@csrf
							<button type="submit"  class="btn btn-success pl-3 pr-3 mt-3 ml-2"> Change Address
							<input type="hidden" name="food_id" value="{{$food->id}}">
							<input type="hidden" name="total" value="{{$total}}">
							@if(isset($quantity))
							<input type="hidden" name="quantity" value="{{$quantity}}">
							@endif
							</button>
							@endif
							</form>
						</div>
						@endif
						@elseif(isset($hhh))
						<div class="card-body">
							<p class="small-text">
							{{$hhh->state}} - {{$hhh->city}} - {{$hhh->area}} - {{$hhh->address1 }}
							</p>
							@if(isset($food))
							<form action="{{route('buyselect')}}" method="post">
								@csrf
								<button type="submit" class="btn btn-success pl-3 pr-3 mt-3 ml-2"> Change Address
								<input type="hidden" name="food_id" value="{{$food->id}}">
							<input type="hidden" name="total" value="{{$total}}">
							@if(isset($quantity))
							<input type="hidden" name="quantity" value="{{$quantity}}">
							@endif
								</form>
							</div>
							@endif

							@elseif(isset($abc))
						<div class="card-body">
							<p class="">
							{{$abc->state}} - {{$abc->city}} - {{$abc->area}} - {{$abc->address1 }}
							</p>
							@if(isset($food))
							<form action="{{route('buyselect')}}" method="post">
								@csrf
								<button type="submit" class="btn btn-success pl-3 pr-3 mt-3 ml-2"> Change Address
								<input type="hidden" name="food_id" value="{{$food->id}}">
							<input type="hidden" name="total" value="{{$total}}">
							@if(isset($quantity))
							<input type="hidden" name="quantity" value="{{$quantity}}">
							@endif
								</form>
							</div>
								@endif

						@else
    					<div class="card-body">
							<p class="lead">No Address Found !</p>
									
							<a href="{{route('shippingaddress.index')}}" class="btn btn-primary pl-3 pr-3 mt-3 ml-2"> Add Address</a>
						</div>
						@endif
							
					</div>	
					</div>
				<hr>
				<div class="row mt-3">
					<h4>Payment Methods</h4>
					<div class="col-12 text-center">
						<div class="col-md-4">
							<i class="far fa-credit-card fa-3x " style="color: #188d8a;"></i>
							<p class="small-text">Cash on Delivery</p>
						</div>
					</div>
				</div>
			
			</div>
			<div class="col-md-6">
				<h4>Order Summary</h4>
				<table id="order-summary" class="table table-hover" style="width:100%">
					<thead>
						<tr>
							<th>Items</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
						</tr>
					</thead>
        			@if(isset($food))
       
					<tbody>
						<tr>
							<td>{{$food->title}}</td>
							<td class="text-left">{{$food->price}}</td>
							@if(isset($quantity))
							<td class="text-center">{{$quantity}}</td>
							@endif
							<td class="text-right">{{$total}}</td>
						</tr>

        			@endif
						<tr>
							<td colspan="4"></td>
						</tr>
						
						<tr>
							<td>
								<p>Sub Total</p>
							</td>
							<td colspan=3 class="text-right">{{$total}}</td>
						</tr>
						
						<tr>
							<td>
								<p>Delivery Charge</p>
							</td>
							<td colspan=3 class="text-right">0</td>
						</tr>
						<tr>
							<td>
								<p>Discount (10%)</p>
							</td>
							<td colspan=3 class="text-right">{{$total *0.1}}</td>
						</tr>
						<tr>
							<td>
								<p class="lead">Grand Total</p>
							</td>
							<td colspan=3 class="text-right">
								<p class="lead"> NRs.{{$total -($total *0.1)}} </p>
							</td>
						</tr>
            </tbody>
            
				</table>
			</div>
			<hr>

		</div>
		
		<hr>
		<div class="row">
			<form action="{{ route('buyPlace')}}" method ="post" >
			@csrf    
			<input type="hidden" name="price" value="{{$total -($total *0.1)}} ">  
			<input type="hidden" name="quantity" value="{{$quantity}} ">  
			@if(isset($hhh))                        
			<input type="hidden" name="address" value="{{$hhh->id}} ">
			@endif 
			@if(isset($food)) 
			<input type="hidden" name="food_id" value="{{$food->id}} ">
			@endif
			<button type="submit" class="btn btn-primary b-block mx-auto" >Confirm Order</button>
			</form>
		</div>
	</div>



@endsection
