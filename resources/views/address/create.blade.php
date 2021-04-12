<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<form method="post" action="{{route('address.store')}}">
@csrf
  <div class="form-group" >
    <label for="state">state</label>
    <input type="state" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter state" name ="state">
  </div>
  <div class="form-group">
    <label for="city">city</label>
    <input type="text" class="form-control" id="city" placeholder="city" name="city">
  </div>

  <div class="form-group">
    <label for="area">Area</label>
    <input type="text" class="form-control" id="area" placeholder="area" name="area">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>