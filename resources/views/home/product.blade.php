<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Produk Terbaru</h2>
        </div>
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    @if($products->quantity <= 0)
                        <div class="out-of-stock">
                            <span>Stok Habis</span>
                        </div>
                    @endif
                    <div class="img-box">
                        <img src="products/{{$products->image}}" alt="{{ $products->title }}">
                    </div>
                    <div class="detail-box">
                        <h6>{{ $products->title }}</h6>
                        <h6>
                            <span>Rp. {{ number_format($products->price, 0, ',', '.') }}</span>
                        </h6>
                    </div>
                    <div style="padding:15px">
                        <a class="btn btn-outline-danger custom-btn" href="{{url('product_details', $products->id)}}">Details</a>
                        <a class="btn btn-outline-primary custom-btn" href="{{url('add_cart', $products->id)}}"> Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="{{url('shop')}}">Lihat Semua Produk</a>
        </div>
    </div>
</section>
<style>
    .out-of-stock {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: red;
        color: white;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
    }
    .box {
        position: relative;
    }
    .img-box {
        position: relative;
    }
</style>
