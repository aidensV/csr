<?php
if (!empty(Session::get('perusahaan_email'))) {
    $style = "display:none";
    $style2 = "";
}elseif(empty(Session::get('perusahaan_email'))){
    $style = "";
    $style2 = "display:none";
}
?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Document Title -->
    <title>CSR | @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png') }}" href="{{ asset('public/images/Logo Kediri Kota.png') }}">
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500i,700%7CRoboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/plugins/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/plugins/magnific-popup/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/colors/theme-color-1.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/custom.css') }}">
    <!--  carousel-->
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('public/assets/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
    @yield('head')
</head>
<body>
<!-- Preloader -->
<div class="preLoader"></div>
<!-- Main header -->
<header class="header">
    <div class="header-top bg-primary" data-animate="fadeInDown" data-delay=".5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <!-- Header info -->
                    <ul class="header-info list-inline text-white mb-md-0">
                        <!-- <li>Your IP : 192.168.0.102</li> -->
                        <!-- <li>Your Location : Dhaka, Bangladesh</li> -->
                        <!-- <li>Your Status : <span>Unprotected</span></li> -->
                    </ul>
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <!-- Header social icons -->
                    <ul class="social-icons text-right list-inline m-0">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-header" style="border-bottom: 2px solid #684287">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-sm-3 col-9">
                    <!-- Logo -->
                    <div class="logo" data-animate="fadeInUp" data-delay=".7">
                        <a href="{{ url('') }}">
                            <img src="{{ asset('public/images/Logo.png') }}" width="70%" alt="CSR Kediri">
                        </a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-9 col-3">
                    <nav data-animate="fadeInUp" data-delay=".9">
                        <!-- Header-menu -->
                        <div class="header-menu">
                            <ul>
                                <li <?php if($hal == "Beranda") echo "class='active'"; ?>><a href="{{ url('/') }}">HOME</a></li>
                                <li <?php if($hal == "About Tim"||$hal == "About Forum"||$hal == "Berita"||$hal == "Program CSR 1"||$hal == "Program CSR 2"||$hal == "Galeri"||$hal == "Galeri Pelaksanaan"||$hal == "Csr Award") echo "class='active'"; ?>>
                                    <a href="#">INFORIAL <i class="fas fa-caret-down"></i></a>
                                    <ul>
                                        <li <?php if($hal == "About Tim"||$hal == "About Forum") echo "class='active'"; ?>><a href="#">PROFIL<i class="fas fa-caret-right"></i></a>
                                            <ul>
                                                <li <?php if($hal == "About Tim") echo "class='active'"; ?>><a href="{{ url('/about-team') }}">PROFIL TIM FASILITASI</a></li>
                                                <li <?php if($hal == "About Forum") echo "class='active'"; ?>><a href="{{ url('/about-forum') }}">PROFIL FORUM CSR</a></li>
                                            </ul>
                                        </li>
                                        <li <?php if($hal == "Berita") echo "class='active'"; ?>><a href="{{ url('/news') }}">BERITA</a></li>
                                        <li <?php if($hal == "Program CSR 1"||$hal == "Program CSR 2") echo "class='active'"; ?>>
                                            <a href="#">PROGRAM CSR<i class="fas fa-caret-right"></i></a>
                                            <ul>
                                                <li <?php if($hal == "Program CSR 1") echo "class='active'"; ?>><a href="{{ url('/program-csr/jenis-program/1') }}">PROGRAM PRIORITAS</a></li>
                                                <li <?php if($hal == "Program CSR 2") echo "class='active'"; ?>><a href="{{ url('/program-csr/jenis-program/2') }}">PROGRAM TAMBAHAN</a></li>
                                            </ul>
                                        </li>
                                        <li <?php if($hal == "Galeri"||$hal == "Galeri Pelaksanaan") echo "class='active'"; ?>><a href="#">GALERI<i class="fas fa-caret-right"></i></a>
                                            <ul>
                                                <li <?php if($hal == "Galeri") echo "class='active'"; ?>><a href="{{ url('/galeri') }}">GALERI KEGIATAN</a></li>
                                                <li <?php if($hal == "Galeri Pelaksanaan") echo "class='active'"; ?>><a href="{{ url('/galeri-pelaksanaan') }}">GALERI PELAKSANAAN</a></li>
                                            </ul>
                                        </li>
                                    <!-- <li <?php if($hal == "Katalog") echo "class='active'"; ?>><a href="{{ url('/catalog') }}">KATALOG</a></li> -->
                                        <li <?php if($hal == "Csr Award") echo "class='active'"; ?>><a href="{{ url('/csr-award') }}">CSR AWARD</a></li>
                                    </ul>
                                </li>
                                <li <?php if($hal == "Rekapitulasi") echo "class='active'"; ?>><a href="{{ url('recapitulation') }}">REKAPITULASI</a></li>
                                <li <?php if($hal == "Perusahaan") echo "class='active'"; ?>><a href="{{ url('/companies') }}">DAFTAR PERUSAHAAN</a></li>
                                <li <?php if($hal == "Panduan Akun"||$hal == "Panduan Partisipasi"||$hal == "Panduan Pengajuan") echo "class='active'"; ?>>
                                    <a href="#">PANDUAN <i class="fas fa-caret-down"></i></a>
                                    <ul>
                                        <li <?php if($hal == "Panduan Akun") echo "class='active'"; ?>><a href="{{ url('/guide-account') }}">PANDUAN AKUN</a></li>
                                        <li <?php if($hal == "Panduan Partisipasi") echo "class='active'"; ?>><a href="{{ url('/guide-participation') }}">PANDUAN PARTISIPASI PROGRAM</a></li>
                                        <li <?php if($hal == "Panduan Pengajuan") echo "class='active'"; ?>><a href="{{ url('/guide-guest') }}">PANDUAN PENGAJUAN PROGRAM CSR</a></li>
                                    </ul>
                                </li>

                                <li <?php if($hal == "Pengajuan Permohonan"||$hal == "Pengajuan Usulan"||$hal == "Tracking Permohonan"||$hal == "Pedoman Pelaksanaan") echo "class='active'"; ?>>
                                    <a href="#">TAMBAHAN <i class="fas fa-caret-down"></i></a>
                                    <ul>
                                    <!-- <li <?php if($hal == "Pengajuan Permohonan") echo "class='active'"; ?>><a href="{{ url('/pengajuan-permohonan') }}">PENGAJUAN PERMOHONAN</a></li> -->
                                        <li <?php if($hal == "Pengajuan Usulan") echo "class='active'"; ?>><a href="<?php
                                            if (empty(Session::get('perusahaan_email'))) {
                                                echo url('user_login');
                                            }elseif(!empty(Session::get('perusahaan_email'))){
                                                echo url('pengajuan-usulan');
                                            }
                                            ?>">PENGAJUAN USULAN PROGRAM CSR</a></li>
                                    <!-- <li <?php if($hal == "Tracking Permohonan") echo "class='active'"; ?>><a href="{{ url('/tracking-permohonan') }}">TRACKING PERMOHONAN</a></li> -->
                                        <li <?php if($hal == "Pedoman Pelaksanaan") echo "class='active'"; ?>><a href="{{ url('/pedoman-pelaksanaan') }}">PEDOMAN PELAKSANAAN CSR</a></li>
                                    </ul>
                                </li>
                            <!-- <li><a href="{{url('user_reg')}}" style="{{$style}}" target="_blank">REGISTER/LOGIN</a></li>
                                    <li><a href="{{url('userEdit')}}" style="{{$style2}}">PROFIL</a></li>
                                    <li><a href="{{url('logout_user')}}" style="{{$style2}}" target="_blank">LOGOUT</a></li> -->
                                <li <?php if($hal == "Daftar Akun"||$hal == "History Pengajuan Usulan"||$hal == "Profil Akun") echo "class='active'"; ?>>
                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ACCOUNT <i class="fas fa-caret-down"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right client-links " aria-labelledby="dropdownMenuLink">
                                        <li <?php if($hal == "Daftar Akun") echo "class='active'"; ?>><a href="{{url('user_reg')}}" style="{{$style}}" >Sign Up</a></li>
                                        <li <?php if($hal == "History Pengajuan Usulan") echo "class='active'"; ?>><a href="{{url('pengajuan-history')}}" style="{{$style2}}">History Pengajuan</a></li>
                                        <li <?php if($hal == "Profil Akun") echo "class='active'"; ?>><a href="{{url('userEdit')}}" style="{{$style2}}">Profil</a></li>
                                        <li><a href="{{url('logout_user')}}" style="{{$style2}}">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- End of Header-menu -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Main header -->


<div class="container" style="min-height: 600px">
    @yield('content')
</div>



<!-- Footer -->
<footer class="main-footer bg-primary">
    <div class="container">
    <!-- <div class="row pb-3">
                Footer info
                <div class="col-md-4">
                    <div class="footer-info">
                        <h3 class="text-white" data-animate="fadeInUp" data-delay="0">About Us</h3>
                        <p data-animate="fadeInUp" data-delay=".05">We are here to you how all this mistaken idea of denouncing pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.</p>
                        <ul class="footer-contacts list-unstyled">
                            <li data-animate="fadeInUp" data-delay=".1">
                                <i class="fas fa-phone"></i>
                                <a href="tel:+9876543210">(+9) 876-543-210</a>, 
                                <a href="tel:+123456789">(+1) 234-567-890</a>
                            </li>
                            <li data-animate="fadeInUp" data-delay=".15">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:info.vpnet@yourmail.com">info.vpnet@yourmail.com</a>
                            </li>
                            <li data-animate="fadeInUp" data-delay=".2">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>4749 West Street, Stadium Para, Maijdee Court, Noakhali-3800, Bangladesh</span>
                            </li>
                        </ul>
                        <ul class="social-links list-inline mb-0">
                            <li data-animate="fadeInUp" data-delay=".25"><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li data-animate="fadeInUp" data-delay=".3"><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li data-animate="fadeInUp" data-delay=".35"><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                            <li data-animate="fadeInUp" data-delay=".4"><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li data-animate="fadeInUp" data-delay=".45"><a href="#" target="_blank"><i class="fas fa-rss"></i></a></li>
                            <li data-animate="fadeInUp" data-delay=".5"><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                End of Footer info
                Footer posts
                <div class="col-md-4">
                    <div class="footer-posts">
                        <h3 class="text-white" data-animate="fadeInUp" data-delay=".5">Latest News/Blogs</h3>
                        <div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".55">
                            <a href="#" class="float-left">
                                <img src="{{ asset('public/front/img/posts/post-t.png') }}" alt="">
                            </a>
                            <span>Posted on <a href="#">Jan 19, 2017</a></span>
                            <h4 class="cabin font-weight-normal"><a href="#">In major hiring push web hosting</a></h4>
                            <p>Expand its civil service aviations web hosting powerhouse go daddy.</p>
                        </div>
                        <div class="single-footer-post clearfix" data-animate="fadeInUp" data-delay=".6">
                            <a href="#" class="float-left">
                                <img src="{{ asset('public/front/img/posts/post-t2.png') }}" alt="">
                            </a>
                            <span>Posted on <a href="#">Jan 19, 2017</a></span>
                            <h4 class="cabin font-weight-normal"><a href="#">Lorem ipsum dolor sit consectetur.</a></h4>
                            <p>Expand its civil service aviations web hosting powerhouse go daddy.</p>
                        </div>
                        <a href="{{ asset('public/front/blog.html') }}" class="roboto text-uppercase" data-animate="fadeInUp" data-delay=".65">View All Blog Posts <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
                End of Footer posts
                Footer newsletter
                <div class="col-md-4">
                    <div class="footer-newsletter">
                        <h3 class="text-white" data-animate="fadeInUp" data-delay=".65">Newsletter</h3>
                        <p data-animate="fadeInUp" data-delay=".7">In major hiring push, web hosting powerhouse go daddy to expand its civil service aviations</p>
                        <form action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&amp;id=f4e0e93d1d" method="post" name="mc-embedded-subscribe-form" target="_blank">
                            <div class="form-group" data-animate="fadeInUp" data-delay=".75">
                                <input class="form-control" type="email" name="EMAIL" placeholder="Enter Your E-mail Address" required>
                            </div>
                            <div class="subscribe-submit form-group clearfix mb-0" data-animate="fadeInUp" data-delay=".8">
                                <button class="btn btn-primary btn-square float-left" type="submit">Subscribe</button>
                                <span>Don’t worry! <br>Your e-mail won’t be published.</span>
                            </div>
                        </form>
                    </div>
                </div>
                End of Footer newsletter
            </div> -->
        <div class="bottom-footer">
            <div class="row">
                <!-- Copyright -->
                <div class="col-md-5 order-last order-md-first">
                    <p class="copyright" data-animate="fadeInDown" data-delay=".85">&copy; Copyright 2019 <a href="#">CSR - Pemkot Kota Kediri</a></p>
                </div>
                <!-- Footer menu -->
                <div class="col-md-7 order-first order-md-last" align="right">
                    <!-- <a class="btn btn-primary" href="#" style="color: #000">PEDOMAN PELAKSANAAN CSR</a> -->
                    <!-- <ul class="footer-menu list-inline text-md-right mb-md-0" data-animate="fadeInDown" data-delay=".95">
                        <li><a href="#">Afilliate</a></li>
                        <li>|</li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li>|</li>
                        <li><a href="#">Termns & Conditions</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->
<!-- Back to top -->
<div class="back-to-top">
    <a href="#"> <i class="fas fa-arrow-up"></i></a>
</div>
<!-- JS Files -->
<script src="{{ asset('public/front/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('public/front/js/fontawesome-all.min.js') }}"></script>
<script src="{{ asset('public/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/typed.js/typed.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/waypoints/sticky.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/particles.js/particles.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/particles.js/particles.settings.js') }}"></script>
<script src="{{ asset('public/front/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/parsley/parsley.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('public/front/plugins/retinajs/retina.min.js') }}"></script>
<script src="{{ asset('public/front/js/menu.min.js') }}"></script>
<script src="{{ asset('public/front/js/scripts.js') }}"></script>
<script src="{{ asset('public/front/js/custom.js') }}"></script>
@yield('js')
</body>
</html>