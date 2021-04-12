

<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
  <form action="{{route('shippingaddress.update',$shippingaddress->id)}}" method="post">
        <h3 align="center">Shipping Address</h3><br />
   {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="form-group">
            <select name="state" id="state" class="form-control input-lg dynamic" data-dependent="city" value="{{$shippingaddress->state}}">
            <option value="">Select state</option>
            @foreach($state_list as $state)
            <option value="{{ $state->state}}">{{ $state->state }}</option>
            @endforeach
            </select>
        </div>

   <br />

        <div class="form-group">
            <select name="city" id="city" class="form-control input-lg dynamic" data-dependent="area">
            <option value="">Select city</option>
            </select>
        </div>

   <br />

        <div class="form-group">
            <select name="area" id="area" class="form-control input-lg">
            <option value="">Select area</option>
            </select>
        </div>

        <br />

        <div class="form-group" >
            <label for="address1">Address 1</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address like tole name ,road info " name ="address1">
        </div>

        <br />
        <input type="hidden" name="user_id" value={{Auth::user()->id}}>
        <div class="form-group" >
            <label for="address2">Address 2(optional)</label>
            <input type="address2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the famous place near you like college,hotel,hospital,brige,park.. etc " name ="address2">
        </div>
        <button type="submit"  class="btn btn-primary">Submit</button>

        </form>
  </div>
 </body>
</html>

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

