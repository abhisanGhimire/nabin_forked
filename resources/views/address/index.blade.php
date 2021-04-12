<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">state</th>
      <th scope="col">city</th>
      <th scope="col">area</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
  @if(isset($address))
  @foreach($address as $address)
    <tr>
      <th scope="row">{{$address->id}}</th>
      <td>{{$address->state}}</td>
      <td>{{$address->city}}</td>
      <td>{{$address->area}}</td>
     <td>
                    <form action="{{ route('address.edit',$address->id)}}" >
                        {{csrf_field()}}
                        {{method_field('GET')}}
                        <button class="btn btn-info">edit</button>
                    </form>
    </td>

                  <td>
                      <form action="{{ route('address.destroy',$address->id)}}" method="POST">
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
