@extends('layouts.app')
@section('main-content')

<!-- Section Title -->
<div class="container section-title">
  <h2>Edit your profile</h2>
  <p><span>Edit Your</span> <span class="description-title">Profile With Delicious<br></span></p>
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

  <div class="col-lg-4 rounded shadow" style="background-image: url('{{ asset('assets/img/events-2.jpg') }}'); background-size: cover; background-position: center;"></div>

    <div class="col-lg-5 d-flex align-items-center justify-content-center">
      <form action="{{ route('update_profile') }}" method="post" style="width: 60%;">
        @csrf
        @method('PUT')
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="First Name">
              @error('first_name')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror              
            </div>

            <div class="mb-3">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" placeholder="Last Name">
              @error('last_name')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
            </div>
            
          <div class="mb-3">
            <label for="phone" class="form-label">Phone number</label>
            <input type="phone" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="Enter phone no">
            @error('phone')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Residence address</label>
            <input type="address" class="form-control" id="address" name="address" value="{{$user->address}}" placeholder="Enter address">
            @error('address')
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