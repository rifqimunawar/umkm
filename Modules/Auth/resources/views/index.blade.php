<!DOCTYPE html>
<html lang="en">
@php
  $getLogo = App\Helpers\GetSettings::getLogo();
  $getWebName = App\Helpers\GetSettings::getNamaWeb();
  $getEmail = App\Helpers\GetSettings::getEmail();
  $getTelp = App\Helpers\GetSettings::getTelp();
  $getAlamat = App\Helpers\GetSettings::getAlamat();
  $getBackground = App\Helpers\GetSettings::getBackground();
@endphp

<head>
  <meta charset="utf-8" />
  <title>{{ $getWebName }} | Login</title>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ $getLogo }}">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- ================== BEGIN core-css ================== -->
  <link href="../assets/css/vendor.min.css" rel="stylesheet" />
  <link href="../assets/css/default/app.min.css" rel="stylesheet" />
  <!-- ================== END core-css ================== -->
</head>

<body class='pace-top'>
  <!-- BEGIN #loader -->
  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>
  <!-- END #loader -->

  <!-- BEGIN #app -->
  <div id="app" class="app">
    <!-- BEGIN login -->
    <div class="login login-with-news-feed">
      <!-- BEGIN news-feed -->
      <div class="news-feed">
        <div class="news-image" style="background-image: url(../img/{{ $getBackground }})"></div>
        <div class="news-caption">
          <h4 class="caption-title"><b>{{ $getWebName }}</b></h4>
          <p>
            {{ $getTelp }}
            {{ $getEmail }}<br>
            {{ $getAlamat }} <br>
          </p>
        </div>
      </div>
      <!-- END news-feed -->

      <!-- BEGIN login-container -->
      <div class="login-container">
        <!-- BEGIN login-header -->
        <div class="login-header mb-30px">
          <div class="brand">
            <div class="d-flex align-items-center">
              <span><img src="{{ $getLogo }}" alt="" style="width: 45px"></span>
              {{ $getWebName }}
            </div>
            <small>
              {{ $getTelp }}
              {{ $getEmail }}<br>
              {{ $getAlamat }} <br></small>
          </div>
          <div class="icon">
            <i class="fa fa-sign-in-alt"></i>
          </div>
        </div>
        <!-- END login-header -->

        <!-- BEGIN login-content -->
        <div class="login-content">
          <form method="POST" action="authenticate" class="fs-13px">
            @csrf
            <div class="form-floating mb-15px">
              <input type="text" class="form-control h-45px fs-13px" name="username" placeholder="Username"
                id="username" />
              <label for="username" class="d-flex align-items-center fs-13px text-gray-600">Username</label>
            </div>
            <div class="form-floating mb-15px">
              <input type="password" name="password" class="form-control h-45px fs-13px" placeholder="Password"
                id="password" />
              <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
            </div>
            <div class="form-check mb-30px">
              <input class="form-check-input" type="checkbox" value="1" id="rememberMe" />
              <label class="form-check-label" for="rememberMe">
                Remember Me
              </label>
            </div>
            <div class="mb-15px">
              <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Sign me in</button>
            </div>
            {{-- <div class="mb-40px pb-40px text-dark">&emsp; </div> --}}
            <hr class="bg-gray-600 opacity-2" />
            <div class="text-gray-600 text-center  mb-0">
              &copy; {{ $getWebName }} All Right Reserved 2025
            </div>
          </form>
        </div>
        <!-- END login-content -->
      </div>
      <!-- END login-container -->
    </div>
    <!-- END login -->

    <!-- BEGIN theme-panel -->
    <div class="theme-panel">
      <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
      <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
        <h5>App Settings</h5>

        <!-- BEGIN theme-list -->
        <div class="theme-list">
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red"
              data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
              data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink"
              data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange"
              data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow"
              data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime"
              data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green"
              data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
          <div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-teal"
              data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
              data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan"
              data-theme-class="theme-cyan" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue"
              data-theme-class="theme-blue" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple"
              data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo"
              data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
          <div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black"
              data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip"
              data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
        </div>
        <!-- END theme-list -->

        <div class="theme-panel-divider"></div>

        <div class="row mt-10px">
          <div class="col-8 control-label text-body fw-bold">
            <div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative" style="top: -1px;">NEW</span>
            </div>
            <div class="lh-14">
              <small class="text-body opacity-50">
                Adjust the appearance to reduce glare and give your eyes a break.
              </small>
            </div>
          </div>
          <div class="col-4 d-flex">
            <div class="form-check form-switch ms-auto mb-0">
              <input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode"
                value="1" />
              <label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
            </div>
          </div>
        </div>

        <div class="theme-panel-divider"></div>

        <div class="theme-panel-divider"></div>

        <a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill"
          data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
      </div>
    </div>
    <!-- END theme-panel -->
    <!-- BEGIN scroll-top-btn -->
    <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i
        class="fa fa-angle-up"></i></a>
    <!-- END scroll-top-btn -->
  </div>
  <!-- END #app -->

  <!-- ================== BEGIN core-js ================== -->
  <script src="../assets/js/vendor.min.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <!-- ================== END core-js ================== -->
</body>

</html>
