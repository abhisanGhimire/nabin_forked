@extends('layouts.frontend')
@section('frontend')




<div id="login" class="container mt-2 offset">
@if (Session()->has('success'))
          <div class="alert alert-sucess">
              {{Session('success')}}
          </div>    
@endif
<div class="row">
@if(isset($user))
@foreach($user as $user)
	<div class="col-12">
		<h5 class="">Edit Profile</h5>
		<div class="row">
			<div class="col-md-4">
				<p>Full Name</p> 
				<p class="lead">{{$user->name}}</p>
			</div>
			<div class="col-md-4">
				<p>Email Address</p> 
				<p class="lead">{{$user->email}}</p>
			</div>
			<div class="col-md-4">
				<p>Phone </p> 
				<p class="lead">{{$user->phonenumber}}</p>
				
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<p>Birthday</p> 
				<p class="lead">{{$user->birthday}}</p>
			</div>
			<div class="col-md-4">
				<p>Gender</p> 
				<p class="lead">{{$user->gender}}</p>
			</div>
		</div>

		<div class="row">
			<a href="{{route('users.edit',Auth::user()->id)}}" class="d-block btn btn-primary mr-5 pl-5 pr-5 ">Edit Profile</a>
			<a href="{{route('change.password')}}" class="d-block btn btn-primary pl-4 pr-4">Change Password</a>

		</div>
	</div>
	@endforeach
    @endif
</div>
</div>
		
<div class="container mt-4">
	<h2 class="text-center"> Your Shipping Address</h2>
	<div>

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAddress">Add New Address</button>

	</div>

<div>
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
		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Area</th>
      <th scope="col">Address 1</th>
      <th scope="col">Address 2</th>
      <th scope="col">Home</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
		@if(isset($shippingaddress))
  @foreach($shippingaddress as $shipping)
  <tbody>
  
    <tr>
      <th scope="row">1</th>
      <td>{{$shipping->state}}</td>
      <td>{{$shipping->city}}</td>
      <td>{{$shipping->area}}</td>
      <td>{{$shipping->address1}}</td>
      <td>{{$shipping->address2}}</td>
	  <td>
	  @if($shipping->is_home==0)
                      <form action="{{ route('is_home')}}" method="post">
					  <input type="hidden" name="address_id" value="{{$shipping->id}}">
                      {{csrf_field()}}
                      <button class="btn btn-primary">Mark as a home</button>                 
                      </form>
	@else
	<button>Home</button>
	@endif
      </td>
      <td>
                      <form action="{{ route('shippingaddress.destroy',$shipping->id)}}" method="POST">
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
{{$shippingaddress->links()}}
</div>

<!-- Modal -->
<div class="modal fade" id="addAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

	





