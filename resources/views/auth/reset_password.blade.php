@extends('layouts.app')
@section('main-content')

<!-- Section Title -->
<div class="container section-title">
  <h2>Reset your password</h2>
  <p><span>Reset Your</span> <span class="description-title">Password With Wishes<br></span></p>
</div><!-- End Section Title -->

<div class="container mb-5">

  <div class="row g-0 d-flex justify-content-center">
 
  <div class="row d-flex align-items-center justify-content-center">
    <div class="col-md-6 mb-3">
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

  <div class="col-lg-4 rounded shadow" style="background-image: url('{{ asset('assets/img/events-1.jpg') }}'); background-size: cover; background-position: center;"></div>

    <div class="col-lg-5 d-flex align-items-center justify-content-center">
      <form action="{{ route('reset_password_submit', $reset_code) }}" method="post" style="width: 60%;">
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
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="confirm_Password" name="confirm_password" placeholder="Confirm Password">
            @error('confirm_password')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>
        
        <div class="mb-3">
          <!-- <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div> -->
          <button type="submit" class="btn btn-danger">Submit</button>
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