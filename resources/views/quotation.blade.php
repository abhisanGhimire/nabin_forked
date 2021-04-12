@extends('layouts.frontend')
@section('frontend')

<div class="container offset">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center mb-5">Quotaion</h4>
            <form action="{{route('postquote')}}" method="POST">
            @csrf
                <div class="row">
                    <!-- <div class="col-md-8"> -->
                        <div class="form-group col-md-3">
                            <div class="mb-2">
                                <label for="empNumber">Number of Employees *</label>
                                <div class="input-group ">
                                    <input type="number" class="form-control" id="empNumber" name="empNo"
                                        placeholder="Enter number of employees"  value="15">
                                </div>
                            </div>

                            <div class="mt-3 mb-2">
                                <label for="days">Work days per month *</label>
                                <div class="input-group ">
                                    <input type="number" class="form-control" id="days" value="24" name="days"
                                        placeholder="Enter number of days in a month" >
                                </div>
					        </div>
                            <div class="mt-3 mb-2">
                            <label for="food">Select food *</label>
                            <div class="input-group ">
                                <select name="food" id="food" class="form-control" >
                                    <option value="" selected disabled>Select Food</option>
                                    <option value="1" selected>Khana Set</option>
                                    <option value="2">Merolunch package</option>
                                    <option value="3">Snacks</option>
                                </select>
                            </div>
					        </div>
                            
					    </div> <!-- col-md-4 ends-->

                        <div class="form-group col-md-4">
                            <a class="btn btn-primary mt-4" id="geQuote" data-target="quote" style="color:#fff">Get Quote</a>
                            <div class="mt-3 alert-success" id="quote" style="color:#093d3b">
                                
                                

                            </div>
                        </div>

                        <div class="form-group col-md-5">
                            <div class="mb-2">
                                <label for="email">Email *</label>
                                <div class="input-group ">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter your email" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="company">Company Name </label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="company" name="name"
                                        placeholder="Enter your company name (optional)">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="phone">Phone </label>
                                <div class="input-group ">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter your phone (optional)" >
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-success" name="submit">Get in touch</button>
                            </div>
                        </div>
                </div>
                


            </form>
        </div>
    </div>
</div>


@endsection