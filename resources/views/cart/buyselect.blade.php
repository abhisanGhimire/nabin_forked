@extends('layouts.frontend')
@section('frontend')
<div class="container offset mt-5">
    <h4 class="text-center mb-2">My Address Book</h4>
    <p class="small-text">Please select your shipping address</p>
						<table id="address-book" class="table table-striped table-bordered" style="width:100%">
							<thead>
                                <tr colspan=4>
                                <div class="row float-right mr-2">
                                    <a href="{{route('shippingaddress.index')}}" class="btn btn-primary mt-4"><i class="fas fa-plus"></i> Add New
                                        Address</a>
                                </div>
                                </tr>
								<tr>
									<th></th>
									<th>Address</th>
									<th>Region</th>

								</tr>
							</thead>
							<tbody>
                             @if(isset($foodID))  <form action="{{route('buynow',$foodID)}}" method="get">   
                                @if(isset($shippingaddress))
                                  @foreach($shippingaddress as $shipping)
                                  <tr>
                                      <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shippAddr" value="{{$shipping->id}}"
                                                checked>
                                                <input type="hidden" name="food_id" value ="{{$foodID}}">
                                                <input type="hidden" name="total" value ="{{$total}}">
                                                <input type="hidden" name="quantity" value ="{{$quantity}}">
                                   
                                        </div>
                                      
									</td>
									<td>
									    @if($shipping->is_home ==1)
                                            <span class="badge badge-pill badge-warning">Home</span> 
                                        @endif
							            {{$shipping->address1 }} - {{$shipping->address2 }}
									</td>
									<td>{{$shipping->state}} - {{$shipping->city}} - {{$shipping->area}}</td>

								</tr>
                                @endforeach
                                @endif
                                <tr>

                                    <td colspan="4" class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </td>
                                </tr>
                            </form>
                            @endif
							</tbody>
						</table>
                </div>
			</div>
		</div>
	</div>
@endsection