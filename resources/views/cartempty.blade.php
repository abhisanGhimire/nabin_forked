@extend('layouts.frontend')
@section('frontend')
<h1>Cart is empty please order first</h1>
<a href="{{route('menus')}}" class="btn btn-success ">Add More Items</a>
@endsection