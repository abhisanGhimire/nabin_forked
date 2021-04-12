<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<form method ='post' action="{{ route('foods.update',$foods->id)}}"enctype="multipart/form-data">
@csrf
        {{method_field('PUT')}}
    <div class="row"> 
        <div class="col-md-3">
                <div class="form-group">
                    <label for="File">Upload photo</label>
                    <img src="{{ url('images/foods/'.$foods->photo) }}" id="profile-img-tag" width="200px"/>
                    <input type="file" id="profile-img" name="photo">
                    <span class="text-danger">{{ $errors->first('photo')}}</span>
                
                </div>
        </div>

        <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter a food title" value="{{$foods->title}}">
                        <span class="text-danger">{{ $errors->first('title')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <input type="text" class="form-control" name="details" placeholder="Enter a food details" value="{{$foods->details}}">
                        <span class="text-danger">{{ $errors->first('details')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter a food price" value="{{$foods->price}}">
                        <span class="text-danger">{{ $errors->first('price')}}</span>

                    </div>

                    @if(isset($categories))
                   <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="cat_id" value="">
                            <option  selected>{{$foods->category->title}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->title}}</option>
                            @endforeach
                        </select>
                    </div> 
                    @endif
        </div>
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>
