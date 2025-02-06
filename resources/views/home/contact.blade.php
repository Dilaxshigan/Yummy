<section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Contact</h2>
  <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="mb-5">
    <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d31684.85182541906!2d79.86884887235055!3d6.937546014950635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1718445403106!5m2!1sen!2slk" frameborder="0" allowfullscreen=""></iframe>
  </div><!-- End Google Maps -->

  <div class="row gy-4">

    <div class="col-md-6">
      <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
        <i class="icon bi bi-geo-alt flex-shrink-0"></i>
        <div>
          <h3>Address</h3>
          <p>A108 Adam Street, Colombo, WP 31000</p>
        </div>
      </div>
    </div><!-- End Info Item -->

    <div class="col-md-6">
      <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
        <i class="icon bi bi-telephone flex-shrink-0"></i>
        <div>
          <h3>Call Us</h3>
          <p>+94 76 235 7890</p>
        </div>
      </div>
    </div><!-- End Info Item -->

    <div class="col-md-6">
      <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
        <i class="icon bi bi-envelope flex-shrink-0"></i>
        <div>
          <h3>Email Us</h3>
          <p>yummy@yahoo.com</p>
        </div>
      </div>
    </div><!-- End Info Item -->

    <div class="col-md-6">
      <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
        <i class="icon bi bi-clock flex-shrink-0"></i>
        <div>
          <h3>Opening Hours<br></h3>
          <p><strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed</p>
        </div>
      </div>
    </div><!-- End Info Item -->

  </div>

  <form action="{{ route('contact_submit') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
    @csrf
    <div class="row gy-4">

      <div class="col-md-6">
        <input type="text" name="name" class="form-control" placeholder="Your Name">
        @error('name')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
      </div>

      <div class="col-md-6 ">
        <input type="email" class="form-control" name="email" placeholder="Your Email">
        @error('email')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
      </div>

      <div class="col-md-12">
        <input type="text" class="form-control" name="subject" placeholder="Subject">
        @error('subject')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
      </div>

      <div class="col-md-12">
        <textarea class="form-control" name="message" rows="6" placeholder="Message"></textarea>
        @error('message')
                            <span class="text-danger fw-semibold">Error message goes here</span>
                            @enderror
      </div>

      <div class="row d-flex align-items-center justify-content-center mt-4">
      <div class="col-md-6">
           @if(session('contact_success'))
               <div class="alert alert-success text-center">
                   {{ session('contact_success') }}
               </div>
          @endif
      </div>
      </div>
      
      <div class="col-md-12 text-center">
        <button type="submit">Send Message</button>
      </div>

    </div>
  </form><!-- End Contact Form -->

</div>

</section>