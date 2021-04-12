<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<form method ='post' action="{{ route('address.update',$address->id)}}"enctype="multipart/form-data">
@csrf
        {{method_field('PUT')}}
    <div class="row"> 
      

        <div class="col-md-9">
                    <div class="form-group">
                        <label for="state">state</label>
                        <input type="text" class="form-control" name="state" placeholder="Enter a state" value="{{$address->state}}">
                        <span class="text-danger">{{ $errors->first('state')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="city">city</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter a city" value="{{$address->city}}">
                        <span class="text-danger">{{ $errors->first('city')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="area">area</label>
                        <input type="text" class="form-control" name="area" placeholder="Enter a area" value="{{$address->area}}">
                        <span class="text-danger">{{ $errors->first('area')}}</span>

                    </div>

                   
        </div>
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>
