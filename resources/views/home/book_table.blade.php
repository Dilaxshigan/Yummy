<section id="book-a-table" class="book-a-table section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Book A Table</h2>
  <p><span>Book Your</span> <span class="description-title">Stay With Us<br></span></p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

    <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>

    <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
      <form action="{{ route('booking_submit') }}" method="post" role="form" class="php-email-form">
        @csrf
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
            @error('name')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror 
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
            @error('email')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror 
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone">
            @error('phone')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror 
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="date" name="date" class="form-control" id="date" placeholder="Date">
            @error('date')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror 
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="time" class="form-control" name="time" id="time" placeholder="Time">
            @error('time')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror 
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="number" class="form-control" name="people" id="people" placeholder="Number of people">
            @error('people')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror 
          </div>
        </div>

        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
        </div>

        <div class="row d-flex align-items-center justify-content-center mt-4">
      <div class="col-md-8">
           @if(session('booking_success'))
               <div class="alert alert-success text-center">
                   {{ session('booking_success') }}
               </div>
          @endif
      </div>
      </div>

        <div class="text-center mt-3">
          <button type="submit">Book a Table</button>
        </div>
      </form>
    </div><!-- End Reservation Form -->

  </div>

</div>

</section>