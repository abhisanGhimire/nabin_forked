@extends('layouts.frontend')
@section('frontend')

    <form method ='post' action="{{ route('users.update',$users->id)}}"enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
	<div class="container card offset">
	<h4>Update your Profile</h4>
    <div class="row">
			<div class="col-md-6">
                        @csrf
					<div class="mt-3 mb-2">
						<label for="fullname">{{ __('Full Name *') }}</label>
						<div class="input-group ">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus placeholder="Enter your first and last name"/> 
						</div>
					</div>
					<div class="mb-2">
						<label for="phone">{{ __('Phone *') }}</label>
						<div class="input-group ">
						<input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{$users->phonenumber }}" required autocomplete="phone
                                number" autofocus placeholder="Enter your phone number">

                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
						</div>
					</div>
					<div class="mb-2">
						<label for="phone">{{ __('Email ') }}</label>
						<div class="input-group ">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email" placeholder="Enter your email"> 

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

			</div>

			<div class="col-md-6">
				
				<div class="mt-3 mb-4">
					<label for="birthday">{{ __('Birthday') }}</label>
					<div class="form-group">
						<input id="dob" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ $users->birthday }}" required  autofocus>

                                @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
					</div>
				</div>

				<div class="mb-2">
					<label for="gender">{{ __('Gender') }}</label>
					<div class="form-check">
					<input id="female" type="radio"  name="gender" value="female"> {{ (old('sex') == 'female') ? 'checked' : '' }} 
						<label class="form-check-label" for="female">Female</label>
					  </div>
					  <div class="form-check">
					  <input id="male" type="radio" name="gender" value="male"> {{ (old('sex') == 'male') ? 'checked' : '' }}
						<label class="form-check-label" for="male">Male</label>
					  </div>
					  <div class="form-check">
					  <input id="male" type="radio" name="gender" value="Others"> {{ (old('sex') == 'others') ? 'checked' : '' }}
						<label class="form-check-label" for="others">Others</label>
					  </div>

					  @error('gender')
						<span class="help-block">
							<strong>{{ $message }}</strong>
						</span>
						@enderror

				</div>	
				</div>
				<div class="col-12">
        			<button type="submit" class="btn btn-primary d-block mx-auto">Update</button>
				</div>	
	</div>
	</div>
    </form>
      
@endsection



    

        
