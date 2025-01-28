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
      <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone">
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="date" name="date" class="form-control" id="date" placeholder="Date">
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="time" class="form-control" name="time" id="time" placeholder="Time">
          </div>
          <div class="col-lg-4 col-md-6">
            <input type="number" class="form-control" name="people" id="people" placeholder="# of people">
          </div>
        </div>

        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
        </div>

        <div class="text-center mt-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
          <button type="submit">Book a Table</button>
        </div>
      </form>
    </div><!-- End Reservation Form -->

  </div>

</div>

</section>