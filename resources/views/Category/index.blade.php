<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@if (Session()->has('success'))
          <div class="alert alert-sucess">
              {{Session('success')}}
          </div>
              
          @endif
<body>
<form action="{{route('categories.store')}}" method='POST'>
@csrf
<div class="input-group">
  <div class="form-outline">
    <input type="text" id="title" class="form-control" name="title" placeholder="enter the categories"/>
    <span class="text-danger">{{ $errors->first('title')}}</span>

  </div>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($categories))
  @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->title}}</td>
    <td>
                    <form action="{{ route('categories.edit',$category->id)}}" >
                        {{csrf_field()}}
                        {{method_field('GET')}}
                        <button class="btn btn-info">edit</button>
                    </form>
    </td>

                  <td>
                      <form action="{{ route('categories.destroy',$category->id)}}" method="POST">
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
</body>
