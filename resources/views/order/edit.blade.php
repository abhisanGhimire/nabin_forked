<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<form action="{{route('order.update',$orders->id)}}" method="post">

{{csrf_field()}}
        {{method_field('PUT')}}

<select name='payment_status' class="form-select" aria-label="Default select example">
  <option selected>Payment Status</option>
  <option  value="Pending">Pending</option>
  <option  value="Received">Received</option>
</select>

<select required name='order_status' class="form-select" aria-label="Default select example">
  <option selected>Order Status</option>
  <option  value="pending">Pending</option>
  <option  value="order Accept">Order Accept</option>
  <option  value="Order Delivered">Order Delivered</option>
</select>

<button type = "submit" class = "btn btn-primary">Submit</button>


</form>


