
@extends('layouts.frontend')
@section('frontend')

  <div class="container offset mt-2">
      <div class="col-md-6 mx-auto card">
          <h3 class="text-center my-2">Add a New Shipping Address</h3>

      
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
