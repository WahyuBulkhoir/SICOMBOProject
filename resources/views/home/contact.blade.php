<!DOCTYPE html>
<html>
<head>
  @include('home.css')
</head>
    @include('home.header')
<body>
  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <br><br>
        <h2 class="">
          Contact Us
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Bukit+Gado-gado,Kec.Padang+Sel.,Kota+Padang,Sumatera+Barat,Indonesia" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
        <form action="{{ route('send.message') }}" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div>
                <input type="text" name="name" placeholder="Name" required />
            </div>
            <div>
                <input type="text" name="phone" placeholder="Phone" required />
            </div>
            <div>
                <textarea name="description" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="d-flex">
                <button type="submit">KIRIM</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </section>
  <br><br><br>
  @include('home.footer')
</body>
</html>