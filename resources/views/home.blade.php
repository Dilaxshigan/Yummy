@extends('layouts.app')
@section('main-content')

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Enjoy Your Healthy<br>Delicious Food</h1>
            <p data-aos="fade-up" data-aos-delay="100">Every dish bursts with flavor, creating an unforgettable dining experience to savor.</p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Booka a Table</a>
              <a href="https://youtu.be/H1CIBqDeWQ0?si=_N3V7am_4UnJ-9RE" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    @include("home.about")
    <!-- /About Section -->

    <!-- Menu Section -->
     @include("home.menu")
    <!-- /Menu Section -->

    <!-- Events Section -->
    @include("home.events")
    <!-- /Events Section -->

    <!-- Chefs Section -->
     @include("home.chefs")
    <!-- /Chefs Section -->

    <!-- Gallery Section -->
     @include("home.gallery")
    <!-- /Gallery Section -->

    @if(auth()->check())
    <!-- Book A Table Section -->
     @include("home.book_table")
    <!-- /Book A Table Section -->
    @endif

    <!-- Contact Section -->
      @include("home.contact")
    <!-- /Contact Section -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

@endsection
@section('styles')
<link rel="stylesheet" href="#">
@endsection
@section('scripts')
<script src="#"></script>
@endsection

