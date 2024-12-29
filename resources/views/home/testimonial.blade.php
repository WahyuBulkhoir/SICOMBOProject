<!DOCTYPE html>
<html>
<head>
  @include('home.css')
</head>
<body>
  <div class="hero_area">
    @include('home.header')
  </div>
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>Testimonial</h2>
      </div>
    </div>
    <div class="container px-0">
      <form action="{{ url('view_testimonial') }}" method="POST">
          @csrf
          <div class="mb-3" style="color: #333;">
              <label for="title" class="form-label">Judul Testimoni Anda</label>
              <input type="text" class="form-control" id="title" name="title" required>
          </div>
          <div class="mb-3" style="color: #333;">
              <label for="content" class="form-label">Deskripsi Anda</label>
              <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <br><br><br>
      <div id="customCarousel2" class="carousel carousel-fade mt-5" data-ride="carousel">
      <h4 style="text-align: center;">Testimoni Customer</h4>
        <div class="carousel-inner">
          @forelse ($testimonials as $index => $testimonial)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>{{ $testimonial->user->name }}</h5>
                  <h6>{{ $testimonial->title }}</h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>{{ $testimonial->content }}</p>
            </div>
          </div>
          @empty
          <div class="carousel-item active">
            <div class="box">
              <p>Belum ada testimoni yang tersedia. Jadilah yang pertama!</p>
            </div>
          </div>
          @endforelse
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
  @include('home.footer')
</body>
</html>
