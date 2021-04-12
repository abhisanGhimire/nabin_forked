<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<form method ='POST' action ="{{route('foods.store')}}" enctype="multipart/form-data">
    <div class="row"> 
        <div class="col-md-3">
                <div class="form-group">
                    <label for="File">UPload picture</label>
                    <input type="file" id="exampleFormControlFile1" name="photo">
                    <span class="text-danger">{{ $errors->first('photo')}}</span>
                </div>
        </div>
      @csrf
        <div class="col-md-9">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter a food title">
                        <span class="text-danger">{{ $errors->first('title')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <input type="text" class="form-control" name="details" placeholder="Enter a food details">
                        <span class="text-danger">{{ $errors->first('details')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter a food price">
                        <span class="text-danger">{{ $errors->first('price')}}</span>
                    </div>
                    @if(isset($categories))
                   <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="cat_id">
                            <option >select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id}}">{{ $category->title}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('cat_id')}}</span>
                    </div> 

                    @endif
        </div>
    </div>
    <button type="submit" class="btn btn-primary">submit</button>
</form>