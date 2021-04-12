@extends('layouts.frontend')
@section('frontend')
    <div class="container offset">
    <div class="card col-md-10 mx-auto">

        <div class="card-body">
            <h4 class="text-center mb-5">Inquiry</h4>
            <form action="">
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="mb-1">
                            <label for="event">Event Type*</label>
                            <select id="event" class="form-control" name="event" required>
                                <option selected disabled>Choose event</option>
                                <option value="bday">Birthday</option>
                                <option value="seminar">Seminar</option>
                                <option value="wedd">Wedding</option>
                                <option value="other">Others</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="name">Head Count*</label>
                            <input type="number" name="headCount" id="name" class="form-control" required=""
                                placeholder="5">

                        </div>
                        <div class="mb-1">
                            <label for="email">Email*</label>
                            <input type="email" name="email" id="email" class="form-control" pattern="[^ @]*@[^ @]*"
                                placeholder="john@example.com">
                        </div>
                        
 
                    </div> <!--form group ends-->

                    <div class="form-group col-md-6">
                        <div class="mb-1">
                            <label for="name">Full Name*</label>
                            <input type="text" name="name" id="name" class="form-control" required="" placeholder="John Doe">
                        
                        </div>
                        <div class="mb-1">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="014123456" required=""
                                title="Must not contain more than 10 digits." pattern="[1-9]{1}[0-9]{9}">
                        </div>
                        <div class="mb-1">
                            <label for="message">Message*</label>
                            <textarea name="message" id="message" rows="5" class="form-control" required=""
                                placeholder="Your message here"></textarea>
                        </div>
                    </div>




                </div>

                <div class="row">
                    
                </div>
                <div class="row">
                    <p class="help">*Fields are mandatory.</p>
                </div>
                <div class="row">

                    <button type="submit" name="submit" class="btn btn-secondary btn-md text-uppercase mx-auto">Make an Inquiry</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    @endsection