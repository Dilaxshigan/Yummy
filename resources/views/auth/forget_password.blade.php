@extends('layouts.app')
@section('main-content')

<!-- Section Title -->
<div class="container section-title">
  <h2>Forget your password</h2>
  <p><span>Enter Your</span> <span class="description-title">Email With Wishes<br></span></p>
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

  <div class="col-lg-4 rounded shadow" style="background-image: url('{{ asset('assets/img/events-3.jpg') }}'); background-size: cover; background-position: center;"></div>

    <div class="col-lg-5 d-flex align-items-center justify-content-center">
      <form action="{{ route('forget_password_submit') }}" method="post" style="width: 60%;">
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
          <!-- <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div> -->
          <button type="submit" class="btn btn-danger">Submit</button>
          <span class="ms-3">Have an account? <a href="{{route('login')}}" class="text-decoration-none">sign in</a> here</span>
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