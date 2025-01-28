@extends('layouts.app')
@section('main-content')

<!-- Section Title -->
<div class="container section-title">
  <h2>Register as member</h2>
  <p><span>Register Your</span> <span class="description-title">Be With Us<br></span></p>
</div><!-- End Section Title -->

<div class="container mb-5">

  <div class="row g-5 d-flex justify-content-center">
 
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
    @if(session('success'))
        <div class="alert alert-success text-center description-title">
              {{ session('success') }}
        </div>
      @endif

    </div>
  </div>

  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6">
    @if(session('error'))
                <div class="alert alert-danger text-center description-title">
                    {{ session('error') }}
               </div>
       @endif
    </div>
  </div>

    <div class="col-lg-4 reservation-img rounded shadow" style="background-image: url(assets/img/reservation.jpg); background-size: cover; background-position: center;"></div>

    <div class="col-lg-5 d-flex align-items-center justify-content-center p-5">
      <form action="{{ route('reg_submit') }}" method="post">
        @csrf
      <div class="row mb-3">
            <div class="col-md-6">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
              @error('first_name')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror              
            </div>
            <div class="col-md-6">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
              @error('last_name')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <div class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>  
          
          <div class="mb-3">
            <label for="phone" class="form-label">Phone number</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone no">
            @error('phone')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Residence address</label>
            <input type="address" class="form-control" id="address" name="address" placeholder="Enter address">
            @error('address')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>
        
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            @error('password')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_Password" name="confirm_password" placeholder="Confirm Password">
            @error('confirm_password')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="terms" name="terms">
            <label class="form-check-label" for="termsCheck">
              Check our <a href="#" class="text-decoration-none">terms</a> and <a href="#" class="text-decoration-none">conditions</a>
            </label><br>
            @error('terms')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <div class="mb-3">
          <div class="g-recaptcha mb-2" data-sitekey="{{ env('GOOGLE_CAPTCHA_KEY') }}" data-callback="recaptchaDataCallbackRegister" data-expired-callback="recaptchaExpiredCallbackRegister"></div>
          @error('grecaptcha')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <input type="hidden" class="mb-3" name="grecaptcha" id="hiddenRecaptchaRegister">

        <div class="mt-3">
          <!-- <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div> -->
          <button type="submit" class="btn btn-danger">Register</button>
          <span class="ms-3">Already have an account? <a href="{{ route('login') }}" class="text-decoration-none">sign in</a> here</span>
        </div>
      </form>
    </div><!-- End Reservation Form -->

  </div>

</div>

@endsection
@section('styles')
<link rel="stylesheet" href="#">
@endsection
@section('scripts')
<script src="#"></script>
@endsection