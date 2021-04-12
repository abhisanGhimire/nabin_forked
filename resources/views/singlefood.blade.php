@extends('layouts.frontend')
@section('frontend')
	<script>
		$(document).ready(function () {
			dpUI.numberPicker("#np", {
				min: 0,
				max: 25,
				step: 1,
				format: "#.#",
				formatter: function (x) {
					return x;
				}
			});
		});
	</script>

<div id="search" class="offset">
	<div class="container">
		<form action="">
			<div class="row">
				<div class="form-group col-md-11 search-box">
					<input type="text" name="search" placeholder="Search in digital food" class="form-control ">
				</div>

				<button type="submit" class="btn btn-primary col-md-1 search-button mb-0"><i
						class="fas fa-search "></i></button>
			</div>

		</form>
	</div>
</div>

<div id="item-detail" class="mt-5">
		<div class="container">
			<div class="row justify-content-center">
			<div class="col-md-4">
			@if(isset($food))
				<div class="card">
					<a href="#"><img src="{{ url('/images/foods/'.$food->photo) }}" class="card-img-top" alt=""></a>
					<div class="card-body">

						<h5 class="card-title menu-caption">{{$food->title}}<span class="price">{{$food->price}}</span></h5>
						<p class="card-text">
				{{$food->details}}
						</p>

					</div>

				</div>
			
			</div>
			<div class="col-md-6">
				<div class="col-12 mx-auto">
					<p>Quantity</p>
					<div id='np' class="">
					<div class="">
                                <form action="{{route('buynow',$food->id)}}" method="get">
                                @csrf
								
                                  <div class="row">
                                    <div class="input-group col-md-4">
                                      <input  type="number" value="1" class="form-control prc" name ="quantity" required id="qunatity" >
										<input type="hidden" name="food_id" value="{{$food->id}}">
										<input type="hidden" name="food_id" value="{{$food->id}}">
                                      <span class="text-danger">{{ $errors->first('quantity')}}</span>
                                    </div>
									<div class="form-group col-md-8">
                                         <button type ="submit" name="buy_now" class="btn btn-primary" value="buy_now">Buy Now</button>
                                         <button type ="submit" name="add_to_cart" class="btn btn-success" value="add_to_cart">add to cart</button>
									</div>
                                  </div>
                                  </form>
                              </div>
					</div>
				</div>

			</div>
			@endif
		</div>
		<hr>
		<hr>
	</div>
</div>

<div id="recommend" class="mt-2">
	<div class="col-12">
		<h3 class="heading text-center">You may also like</h3>
		<div class="heading-underline"></div>
	</div>
</div>



@endsection













