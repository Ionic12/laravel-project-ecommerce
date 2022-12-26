@extends('layouts.navbar_user')

@section('navbar-user')

@if (session()->has('success'))
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show justify-content-center" role="alert">
            <strong>Suksess </strong>{{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Our</span> New Products</h3>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($dataB as $item)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{route('user.getProductBuku', $item->id)}}"><img
                                src="{{asset('storage/' .$item->gambar_buku)}}" alt=""></a>
                    </div>
                    <h3>{{$item->nama_buku}}</h3>
                    <p class="product-price">@currency($item->harga_buku)</p>
                    <a href="{{route('user.getProductBuku', $item->id)}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- testimonail-section -->
<div class="testimonail-section mt-80 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="{{asset('user/assets/img/avaters/avatar2.png')}}" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Al kausar Ramadhan<span>Programmer</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="{{asset('user/assets/img/avaters/avatar1.png')}}" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Raihan Hidayatullah<span>Designer</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="{{asset('user/assets/img/avaters/avatar3.png')}}" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Satria Alief<span>Tester</span></h3>
                            <p class="testimonial-body">
                                " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto beatae
                                vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus
                                error sit voluptatem accusantium "
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">Sejak Tahun 2022</p>
                    <h2>KITA <span class="orange-text">ECOBOOK</span></h2>
                    <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel
                        nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed,
                        interdum velit. Nam eu molestie lorem.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat
                        veritatis minus, et labore minima mollitia qui ducimus.</p>
                    <a href="about.html" class="boxed-btn mt-4">know more</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
