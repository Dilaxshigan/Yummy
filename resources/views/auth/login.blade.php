@extends('layouts.app')
@section('main-content')

<!-- Section Title -->
<div class="container section-title">
  <h2>Login as member</h2>
  <p><span>Login Your</span> <span class="description-title">Be With Us<br></span></p>
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

    <div class="col-lg-4 reservation-img rounded shadow" style="background-image: url(assets/img/events-4.jpg); background-size: cover; background-position: center;"></div>

    <div class="col-lg-5 d-flex align-items-center justify-content-center p-5">
      <form action="{{ route('log_submit') }}" method="post">
        @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <div class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
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
          <div class="g-recaptcha mb-2" data-sitekey="{{ env('GOOGLE_CAPTCHA_KEY') }}" data-callback="recaptchaDataCallbackLogin" data-expired-callback="recaptchaExpiredCallbackLogin"></div>
          @error('grecaptcha')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <input type="hidden" class="mb-3" name="grecaptcha" id="hiddenRecaptchaLogin">

        <div class="mt-3">
          <!-- <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div> -->
          <button type="submit" class="btn btn-danger">Login</button>
          <span class="ms-3">Already don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">sign up</a> here</span>
        </div>
        <div class="mt-3"><span>Don't know the password? <a href="{{route('forget_password')}}" class="text-decoration-none">forget password</a> here</span></div>
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