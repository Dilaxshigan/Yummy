@extends('layouts.app')
@section('main-content')

<!-- Section Title -->
<div class="container section-title">
  <h2>Edit your password</h2>
  <p><span>Change Your</span> <span class="description-title">Password With Wishes<br></span></p>
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

  <div class="col-lg-4 rounded shadow" style="background-image: url('{{ asset('assets/img/about.jpg') }}'); background-size: cover; background-position: center;"></div>

    <div class="col-lg-5 d-flex align-items-center justify-content-center">
      <form action="{{ route('update_password') }}" method="post" style="width: 60%;">
        @csrf
        @method('PUT')
        <div class="mb-3">
           <label for="password" class="form-label">Current Password</label>
           <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Current Password">
              @error('old_password')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror              
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
              @error('new_password')
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
          <button type="submit" class="btn btn-danger">Update</button>
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