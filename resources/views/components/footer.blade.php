
<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-dark">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center  p-4 border-bottom"
  >

    <!-- Right -->
    <div>
      <a href="" class="me-3 text-reset text-decoration-none text-black">
        <i class="fab fa-2x fa-facebook-f"></i>
      </a>
      <a href="" class="me-3 text-reset text-decoration-none text-black">
        <i class="fab fa-2x  fa-twitter"></i>
      </a>
      <a href="" class="me-3 text-reset text-decoration-none text-black">
        <i class="fab fa-2x  fa-google"></i>
      </a>
      <a href="" class="me-3 text-reset text-decoration-none text-black">
        <i class="fab fa-2x  fa-instagram"></i>
      </a>
      <a href="" class="me-3 text-reset text-decoration-none text-black">
        <i class="fab fa-2x  fa-linkedin"></i>
      </a>
      <a href="" class="me-3 text-reset text-decoration-none text-black ">
        <i class="fab fa-2x  fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase text-rosso fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Presto
          </h6>
          <p>
            {{__('ui.prestoannunci')}}
           
          </p>
        </div>
        <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase text-rosso fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="{{route('advice.tips')}}" class="text-reset text-decoration-none">{{__('ui.sicurezza')}}</a>
          </p>
          <p>
            <a href="{{route('workWithUs')}}" class="text-reset text-decoration-none">{{__('ui.lavoraconnoi')}}</a>
          </p>
          <p>
            <a href="{{route('announcement.create')}}" class="text-reset text-decoration-none">{{__('ui.inserisciannuncio')}}</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase text-rosso fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas text-rosso  fa-home me-3"></i> MIlano </p>
          <p>
            <i class="fas text-rosso fa-envelope me-3"></i>
            presto@example.com
          </p>
          <p><i class="fas text-rosso fa-phone me-3"></i> + 01 234 567 88</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center text-white bg-rosso p-4">
    © 2021 Copyright:
    <a class="text-white fw-bold" href="{{route('homepage')}}">TEAM 404</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
