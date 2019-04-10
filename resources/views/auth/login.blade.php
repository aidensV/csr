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


    <title>www.csr.kedirikota.go.id</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/user/images/LOGO COKELAT IBUKE 2.png') }}" /> -->


    <!-- vendor css -->
    <link href="{{ asset('public/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">

    <!-- Katniss CSS -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/katniss.css') }}">
  </head>

  <body>

    <div class="signpanel-wrapper">
      <div class="signbox">
        <div class="signbox-header">
          <h4>CSR KOTA KEDIRI</h4>
          <p class="mg-b-0">www.csr.kedirikota.go.id</p>
        </div><!-- signbox-header -->




        <div class="signbox-body">

          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}



          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="form-control-label">Email:</label>
                  <input id="email" type="email" placeholder="Enter your email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
          </div><!-- form-group -->




          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="form-control-label">Password:</label>
                  <input id="password" type="password" placeholder="Enter your password" class="form-control" name="password" required>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
          </div>



          <div class="form-group">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me <br><br>
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
          </div><!-- form-group -->


          <button type="submit" class="btn btn-dark btn-block">Sign In</button>




        </form>

        </div><!-- signbox-body -->




      </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->

    <script src="{{ asset('public/admin/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/admin/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('public/admin/lib/bootstrap/bootstrap.js') }}"></script>
  </body>
</html>
