@extends('layouts.frontend')
@section('frontend')
<div class="container offset mt-5">
    <h4 class="text-center mb-2">My Address Book</h4>
    <p class="small-text">Please select your shipping address</p>
						<table id="address-book" class="table table-striped table-bordered" style="width:100%">
							<thead>
                                <tr colspan=4>
                                <div class="row float-right mr-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAddress1">Add New Address</button>
                                </div>
                                </tr>
								<tr>
									<th></th>
									<th>Address</th>
									<th>Region</th>

								</tr>
							</thead>
							<tbody>
                                @if(isset($shippingaddress))
                                  @foreach($shippingaddress as $shipping)
                                  <tr>
                                      <td>
                                          <form action="{{route('ordernow')}}" method="get">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="shippAddr" value="{{$shipping->id}}"
                                                checked>
      
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



							</tbody>

						</table>
		
                    <div class="card-footer">
                        
                        <button type="submit" class="btn btn-primary">Save changes</button>
                       
                    </div>
                    </form>
                </div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="addAddress1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="{{route('shippingaddress.store')}}" method="post">
            <div class="form-group mb-2">
                <label for="state">State*</label>
                <select name="state" id="state" class="form-control dynamic" data-dependent="city">
                    <option value="" disabled selected>Select State</option>
                    @foreach($state_list as $state)
                    <option value="{{ $state->state}}">{{ $state->state }}</option>
                    @endforeach
                </select>
            </div>

            {{ csrf_field() }}
            <div class="form-group mt-4 mb-2">
                <label for="city">City*</label>
                <select name="city" id="city" class="form-control input-lg dynamic" data-dependent="area">
                    <option value="" disabled>Select City</option>
                </select>
            </div>

            <div class="form-group mt-4 mb-2">
                <label for="area">Area*</label>
                <select name="area" id="area" class="form-control input-lg">
                <option value="" disabled>Select Area</option>
                </select>
            </div>

            <div class="form-group mt-4 mb-2" >
                <label for="address1">Address 1</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address like tole name ,road info " name ="address1">
            </div>

            <div class="form-group mt-4 mb-2"  >
                <input type="hidden" name="user_id" value={{Auth::user()->id}}>
                <label for="address2">Address 2(optional)</label>
                <input type="address2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the famous place near you like college,hotel,hospital,brige,park.. etc " name ="address2">
            </div>
            <div class="row mt-5">

                <button type="submit"  class="btn btn-primary mx-auto">Add New Address</button>
            </div>

        </form>
      </div>

    </div>
  </div>
</div>
</div>


<script>
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('Shippingaddress.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }

   })
  }
 });

 $('#country').change(function(){
  $('#state').val('');
  $('#city').val('');
 });

 $('#state').change(function(){
  $('#city').val('');
 });
 

});
</script>

@endsection