
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Katniss">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/katniss/img/katniss-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/katniss">
    <meta property="og:title" content="Bracket">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/katniss/img/katniss-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/katniss/img/katniss-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
        <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/user/images/LOGO COKELAT IBUKE 2.png') }}" /> -->

    <!-- vendor css -->
    <link href="{{ asset('public/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/spectrum/spectrum.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/png') }}" href="{{ asset('public/images/Logo Kediri Kota.png') }}">



    <!-- Katniss CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/katniss.css') }}">

    @yield('css')

  </head>

  <body>

    <!-- ##### SIDEBAR LOGO ##### -->
    <div class="kt-sideleft-header">
      <div class="kt-logo"><a href="{{ url('index_admin.html') }}">CSR KOTA KEDIRI</a></div>
      <div id="ktDate" class="kt-date-today"></div>
      <div class="input-group kt-input-search">
        <input type="text" class="form-control" placeholder="Search...">
        <span class="input-group-btn mg-0">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span>
      </div>
      <!-- input-group -->
    </div><!-- kt-sideleft-header -->

    <!-- ##### SIDEBAR MENU ##### -->
    <div class="kt-sideleft">
      <label class="kt-sidebar-label">Navigation</label>
      <ul class="nav kt-sideleft-menu">
        <li class="nav-item">
          <a href="{{ url('index_admin.html') }}" class='nav-link  <?php if($hal == "index") echo "active" ; ?>'>
            <i class="icon ion-ios-home-outline"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{ url('admin_slideshow') }}" class='nav-link  <?php if($hal == "admin_slideshow") echo "active" ; ?>'>
          <i class="fa fa-image"></i>
            <span>Data Slideshow</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{ url('admin_bidang') }}" class='nav-link  <?php if($hal == "admin_bidang") echo "active" ; ?>'>
            <i class="fa fa-cube"></i>
            <span>Master Bidang</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{ url('admin_galeri') }}" class='nav-link  <?php if($hal == "admin_galeri") echo "active" ; ?>'>
            <i class="fa fa-camera-retro"></i>
            <span>Galeri Pelaksanaan</span>
          </a>
        </li><!-- nav-item -->




        <li class="nav-item">
          <a href="" class="nav-link with-sub <?php if(($hal == "admin_daftar_perusahaan")||($hal == "admin_perusahaan")) echo "active" ; ?>">
            <i class="fa fa-inbox"></i>
            <span>Perusahaan</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="{{ url('admin_daftar_perusahaan') }}" class="nav-link  <?php if($hal == "admin_daftar_perusahaan") echo "active" ; ?>"><i class="fa fa-inbox"></i></i> Daftar Perusahaan</a></li>
            <li class="nav-item"><a href="{{ url('admin_perusahaan') }}" class="nav-link  <?php if($hal == "admin_perusahaan") echo "active" ; ?>"><i class="fa fa-inbox"></i></i> Perusahaan Partisipasi</a></li>
          </ul>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{ url('admin_opd') }}" class='nav-link  <?php if($hal == "admin_opd") echo "active" ; ?>'>
            <i class="icon ion-briefcase"></i>
            <span>Master OPD</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{ url('admin_program') }}" class='nav-link  <?php if($hal == "admin_program") echo "active" ; ?>'>
            <i class="fa fa-binoculars"></i>
            <span>Master Program </span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="" class="nav-link with-sub <?php if(($hal == "admin_pengajuan")||($hal == "admin_permohonan")) echo "active" ; ?>">
            <i class="icon ion-clipboard"></i>
            <span>Program CSR</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="{{ url('admin_pengajuan') }}" class="nav-link  <?php if($hal == "admin_pengajuan") echo "active" ; ?>"><i class="icon ion-clipboard"></i>  Pengajuan CSR</a></li>
            <li class="nav-item"><a href="{{ url('admin_permohonan') }}" class="nav-link  <?php if($hal == "admin_permohonan") echo "active" ; ?>"><i class="icon ion-clipboard"></i>  Permohonan CSR</a></li>
          </ul>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{ url('admin_berita') }}" class='nav-link  <?php if($hal == "admin_berita") echo "active" ; ?>'>
            <i class="icon ion-document"></i>
            <span>Data Berita</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="" class="nav-link with-sub <?php if(($hal == "admin_kategori_award")||($hal == "admin_kriteria_award")) echo "active" ; ?>">
            <i class="fa fa-fire"></i>
            <span>CSR Award</span>
          </a>
          <ul class="nav-sub">
            <li class="nav-item"><a href="{{ url('admin_kategori_award') }}" class="nav-link  <?php if($hal == "admin_kategori_award") echo "active" ; ?>"><i class="fa fa-fire"></i> Kategori Award</a></li>
            <li class="nav-item"><a href="{{ url('admin_kriteria_award') }}" class="nav-link  <?php if($hal == "admin_kriteria_award") echo "active" ; ?>"><i class="fa fa-fire"></i>  Kriteria Award</a></li>
          </ul>
        </li><!-- nav-item -->


        <li class="nav-item">
          <a href="{{ url('admin_users') }}" class='nav-link  <?php if($hal == "admin_users") echo "active" ; ?>'>
            <i class="icon ion-person-stalker"></i>
            <span>Data Admin</span>
          </a>
        </li><!-- nav-item -->




      </ul>
    </div><!-- kt-sideleft -->

    <!-- ##### HEAD PANEL ##### -->
    <div class="kt-headpanel">
      <div class="kt-headpanel-left">
        <a id="naviconMenu" href="" class="kt-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconMenuMobile" href="" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
      </div><!-- kt-headpanel-left -->

      <div class="kt-headpanel-right">
        <div class="dropdown dropdown-profile">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="{{ asset('public/admin/img/img3.jpg') }}" class="wd-32 rounded-circle" alt="">
            <span class="logged-name"><span class="hidden-xs-down">Admin || {{ Auth::user()->email }}</span> <i class="fa fa-angle-down mg-l-3"></i></span>
          </a>
          <div class="dropdown-menu wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href="{{route('admin_users.edit',Auth::user()->id)}}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="icon ion-power"></i>
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
              </li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </div><!-- kt-headpanel-right -->
    </div><!-- kt-headpanel -->
    <div class="kt-breadcrumb">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="{{ url('index_admin.html') }}">Powered by : &nbsp </a> www.csr.kedirikota.go.id
      </nav>
    </div><!-- kt-breadcrumb -->

    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">


      @yield('content')

      <div class="kt-footer">
        <span>Copyright &copy;. All Rights Reserved. Katniss Responsive Bootstrap 4 Admin Dashboard.</span>
        <span>Created by: ThemePixels, Inc.</span>
      </div><!-- kt-footer -->
    </div><!-- kt-mainpanel -->

    <script src="{{ asset('public/admin/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/admin/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('public/admin/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('public/admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('public/admin/lib/moment/moment.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/validator.js') }}"></script>





    <script src="{{ asset('public/admin/js/katniss.js') }}"></script>

    @yield('js')
    @yield('script')

  </body>
</html>
