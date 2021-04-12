@extends('layouts.frontend')
@section('frontend')
    <div class="container offset">
    <div class="card col-md-10 mx-auto alert-success">

        <div class="card-body text-center">
            <h3 class="mb-5 ">Thank You!</h3>
            <p class="lead">Your order has been placed successfully.</p>

            <a href="{{route('home')}}" class="btn btn-primary d-inline-block"><i class="fas fa-home"></i>
                        Take Me Home </a>

        </div>
    </div>
    </div>
    @endsection