<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    @include('link.linkCss')
</head>

<body>

    <!-- Start Header Area -->
    @include('page.navbar')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Checkout</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <form action="/transaksi" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Billing Details</h3>
                            <label for="add1">Address</label>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="address">
                                {{-- <span class="placeholder" data-placeholder="Address"></span> --}}
                            </div>
                            <label for="note">Note</label>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="note" name="note">
                                {{-- <span class="placeholder" data-placeholder="Address"></span> --}}
                            </div>
                            <label for="payment_type">Pay With</label>
                            <div class="col-md-12 form-group p_star">
                                <select class="country_select" name="payment_type" id="payment_type">
                                    @foreach ($user->payment as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                    {{-- <option value="2">District</option>
                                    <option value="4">District</option> --}}
                                </select>
                            </div>
                            {{-- <label for="note">ORDER ID</label> --}}
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="note" name="order_id" value="{{$id_orders}}" style="display:none">
                                {{-- <span class="placeholder" data-placeholder="Address"></span> --}}
                            </div>
                            {{-- <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="zip" name="zip"
                                        placeholder="Postcode/ZIP">
                                </div> --}}
                            <input class="primary-btn" type="submit" value="Order">
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li><a href="#">Product <span>Total</span></a></li>
                                    @foreach ($order as $value)
                                        <li><a href="#">{{ $value->item->name }}<span class="middle">x
                                                    {{ $value->qty }}</span>
                                                <span class="last">Rp.
                                                    {{ number_format($value->cost, 2, ',', '.') }}</span></a></li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="#">Subtotal <span>Rp.
                                                {{ number_format($subtotal, 2, ',', '.') }}</span></a></li>
                                    <li><a href="#">Shipping <span>Flat rate: Rp.
                                                {{ number_format($shipping, 2, ',', '.') }}</span></a></li>
                                    <li><a href="#">Total <span>Rp.
                                                {{ number_format($total, 2, ',', '.') }}</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore dolore
                            magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                            <form target="_blank" novalidate="true"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                        required="" type="email">


                                    <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></button>
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1"
                                            value="" type="text">
                                    </div>

                                    <!-- <div class="col-lg-4 col-md-4">
             <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
            </div>  -->
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="{{ asset('img/i1.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i2.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i3.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i4.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i5.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i6.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i7.jpg') }}" alt=""></li>
                            <li><img src="{{ asset('img/i8.jpg') }}" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <p class="footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->


    @include('link.script')
</body>

</html>
