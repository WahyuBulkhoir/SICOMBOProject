<!DOCTYPE html>
<html lang="en">
<head>
  @include('home.css')
  <style type="text/css">
    .product-detail-container {
      margin-top: 50px;
    }
    .product-card {
      background-color: #e9ecef;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
    }
    .product-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .product-image img {
      max-width: 100%;
      border-radius: 15px;
      margin-bottom: 20px;
      object-fit: cover;
    }
    .product-title {
      text-align: center;
      color: #007bff;
      font-weight: bold;
    }
    h6 {
      color: #333;
    }
    .product-info h6 {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .product-info span {
      position: relative;
      display: inline-block;
      left: 60%;
      color: #007bff;
      padding: 5px 10px;
      border-radius: 5px;
      font-weight: bold;
    }
    .product-description {
      margin-top: 10px;
      font-size: 16px;
      line-height: 1.6;
      text-align: justify;
      max-width: 900px;
      max-height: 150px;
      overflow: hidden;
      position: relative;
      word-wrap: break-word;
    }
    .product-description::after {
      content: '';
      position: absolute;
      bottom: 0;
      right: 0;
      height: 30px;
      width: 100%;
      background: linear-gradient(to top, #e9ecef, transparent);
    }
    .btn-box {
      margin-top: 30px;
      text-align: center;
    }
    .custom-btn {
      transition: all 0.3s ease;
    }
    .custom-btn:hover {
      background-color: #0056b3;
      color: white;
    }
  </style>
</head>
<body>
  <div class="hero_area">
    @include('home.header')
  </div>
  <section class="shop_section layout_padding">
    <div class="container product-detail-container">
      <div class="heading_container heading_center">
        <h2>Detail Produk</h2>
      </div>
      <div class="product-card">
        <div class="product-image text-center">
          <img src="/products/{{ $data->image }}" alt="{{ $data->title }}">
        </div> <br>
        <div class="product-title">{{ $data->title }}</div> <br><br>
        <div class="product-info">
            <h6>Price: <span>Rp. {{ number_format($data->price, 0, ',', '.') }}</span></h6>
            <h6>Category: <span>{{ $data->category }}</span></h6>
            <h6>Available Quantity: 
                <span>
                    {{ $data->quantity > 0 ? $data->quantity : 'Stok habis' }}
                </span>
            </h6>
        </div><br>
        <div class="product-description">
          <p>{{ $data->description }}</p>
        </div><br>
        <div class="detail-box text-center">
          <a class="btn btn-outline-primary custom-btn mt-3" href="{{ url('add_cart', $data->id) }}">Add to Cart</a>
        </div>
      </div>
      <div class="btn-box">
        <a href="{{ url('shop') }}">Lihat Semua Produk</a>
      </div>
    </div>
  </section>
  @include('home.footer')
</body>
</html>
