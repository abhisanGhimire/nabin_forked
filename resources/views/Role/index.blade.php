<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<body>
<form action="{{route('roles.store')}}" method='POST'>
@csrf
<div class="input-group">
  <div class="form-outline">
    <input type="text" id="title" class="form-control" name="title" placeholder="enter the role"/>
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
  @if(isset($roles))
  @foreach($roles as $role)
    <tr>
      <th scope="row">{{$role->id}}</th>
      <td>{{$role->title}}</td>
    <td>
                    <form action="{{ route('roles.edit',$role->id)}}" >
                        {{csrf_field()}}
                        {{method_field('GET')}}
                        <button class="btn btn-info">edit</button>
                    </form>
    </td>

                  <td>
                      <form action="{{ route('roles.destroy',$role->id)}}" method="POST">
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
