@extends('layouts.withmenu')
@section('withmenu')
<div class="col-md-9 ">
	<h3 class="text-center">Menu</h3>
				<div class="row ">
					@if(isset($foods))
					@foreach($foods as $food)
						<div class="col-md-3 menu-item p-1">
							<div class="card">
								<a href="#"><img src="{{ url('/images/foods/'.$food->photo) }}" class="card-img-top" alt=""></a>
								<div class="card-body">
										<h5 class="card-title menu-caption"><a href="#">{{$food->title}}</a> <span class="price">NRs.
												{{$food->price}}</span></h5>
										<p class="card-text">{{$food->details}}</p>
								</div>

								<div class="row mx-auto">
										<form action="{{route('addtocart',$food->id)}}" method ="POST" class="d-block ml-2">
										{{csrf_field()}}
											<input type="hidden" name="food_id" value="{{$food->id}}">
											<button type="submit" class="btn btn-success" >Add To Cart</button>
										</form>
										<form action="{{route('singlefood',$food->id)}}" method ="get" class="d-block ml-2">
										{{csrf_field()}}
											<input type="hidden" name="food_id" value="{{$food->id}}">
											<button type="submit" class="btn btn-primary" >Buy Now</button>
										</form>
								</div>
									
							</div>
						</div>
					
					@endforeach
					@endif
				</div>
			</div>
			</div>
@endsection













