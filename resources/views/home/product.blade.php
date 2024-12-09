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
                        <h6 class="truncate">{{ $products->title }}</h6>
                        <h6 class="truncate">
                            <span>Rp {{ number_format($products->price, 0, ',', '.') }}</span>
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
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        max-width: 100%;
    }
    .detail-box h6 {
        font-size: 14px;
        line-height: 1.5;
    }
    .detail-box span {
        font-weight: bold;
        color: #333;
    }
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
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 10px;
        margin: 10px 0;
    }
    .img-box img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        object-fit: cover;
    }
    .custom-btn {
        width: 100%;
        margin-top: 5px;
        font-size: 14px;
    }
</style>
