<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
  $getWebName = App\Helpers\GetSettings::getNamaWeb();
  $getLogo = App\Helpers\GetSettings::getLogo();
@endphp

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>{{ $getWebName }} | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ $getLogo }}">
  <meta name="description" content="{{ $description ?? '' }}">
  <meta name="keywords" content="{{ $keywords ?? '' }}">
  <meta name="author" content="{{ $author ?? '' }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <!-- ================== BEGIN core-css ================== -->
  <link href="../assets/css/vendor.min.css" rel="stylesheet" />
  <link href="../assets/css/default/app.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- ================== END core-css ================== -->
  {{-- Vite CSS --}}
  {{-- {{ module_vite('build-kasir', 'resources/assets/sass/app.scss', storage_path('vite.hot')) }} --}}
  <!-- Select2 CSS -->

</head>

<body class='pace-top'>
  <!-- BEGIN #loader -->
  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>
  <!-- END #loader -->

  <!-- BEGIN #app -->
  <div id="app" class="app app-content-full-height app-without-sidebar app-without-header">



    @yield('content')

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

        <!-- BEGIN theme-switch -->
        <div class="row mt-10px align-items-center">
          <div class="col-8 control-label text-body fw-bold">Header Fixed</div>
          <div class="col-4 d-flex">
            <div class="form-check form-switch ms-auto mb-0">
              <input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed"
                value="1" checked />
              <label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
            </div>
          </div>
        </div>
        <div class="row mt-10px align-items-center">
          <div class="col-8 control-label text-body fw-bold">Header Inverse</div>
          <div class="col-4 d-flex">
            <div class="form-check form-switch ms-auto mb-0">
              <input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse"
                value="1" />
              <label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
            </div>
          </div>
        </div>
        <div class="row mt-10px align-items-center">
          <div class="col-8 control-label text-body fw-bold">Sidebar Fixed</div>
          <div class="col-4 d-flex">
            <div class="form-check form-switch ms-auto mb-0">
              <input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed"
                value="1" checked />
              <label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
            </div>
          </div>
        </div>
        <div class="row mt-10px align-items-center">
          <div class="col-8 control-label text-body fw-bold">Sidebar Grid</div>
          <div class="col-4 d-flex">
            <div class="form-check form-switch ms-auto mb-0">
              <input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid"
                value="1" />
              <label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
            </div>
          </div>
        </div>
        <div class="row mt-10px align-items-center">
          <div class="col-8 control-label text-body fw-bold">Gradient Enabled</div>
          <div class="col-4 d-flex">
            <div class="form-check form-switch ms-auto mb-0">
              <input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled"
                value="1" />
              <label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
            </div>
          </div>
        </div>
        <!-- END theme-switch -->

        <div class="theme-panel-divider"></div>

        <h5>Admin Design (6)</h5>
        <!-- BEGIN theme-version -->
        <div class="theme-version">
          <div class="theme-version-item">
            <a href="../template_html/index_v2.html" class="theme-version-link active">
              <span style="background-image: url(../assets/img/theme/default.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_transparent/index_v2.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/transparent.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_apple/index_v2.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/apple.jpg);" class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_material/index_v2.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/material.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_facebook/index_v2.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/facebook.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_google/index_v2.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/google.jpg);" class="theme-version-cover"></span>
            </a>
          </div>
        </div>
        <!-- END theme-version -->

        <div class="theme-panel-divider"></div>

        <h5>Language Version (9)</h5>
        <!-- BEGIN theme-version -->
        <div class="theme-version">
          <div class="theme-version-item">
            <a href="../template_html/index.html" class="theme-version-link active">
              <span style="background-image: url(../assets/img/version/html.jpg);" class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_ajax/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/version/ajax.jpg);" class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_angularjs/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/version/angular1x.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_angularjs17/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/version/angular10x.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_svelte/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/version/svelte.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="javascript:alert('Laravel 10 Version only available in downloaded version.');"
              class="theme-version-link">
              <span style="background-image: url(../assets/img/version/laravel.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="javascript:alert('Django Version only available in downloaded version.');"
              class="theme-version-link">
              <span style="background-image: url(../assets/img/version/django.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_vue3/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/version/vuejs.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../template_react/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/version/reactjs.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="javascript:alert('.NET Core 8.0 MVC Version only available in downloaded version.');"
              class="theme-version-link">
              <span style="background-image: url(../assets/img/version/dotnet.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
        </div>
        <!-- END theme-version -->

        <div class="theme-panel-divider"></div>

        <h5>Frontend Design (5)</h5>
        <!-- BEGIN theme-version -->
        <div class="theme-version">
          <div class="theme-version-item">
            <a href="../../../frontend/template/template_one_page_parallax/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../../../frontend/template/template_e_commerce/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/e-commerce.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../../../frontend/template/template_blog/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/blog.jpg);" class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../../../frontend/template/template_forum/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/forum.jpg);" class="theme-version-cover"></span>
            </a>
          </div>
          <div class="theme-version-item">
            <a href="../../../frontend/template/template_corporate/index.html" class="theme-version-link">
              <span style="background-image: url(../assets/img/theme/corporate.jpg);"
                class="theme-version-cover"></span>
            </a>
          </div>
        </div>
        <!-- END theme-version -->

        <div class="theme-panel-divider"></div>

        <a href="https://seantheme.com/color-admin/documentation/"
          class="btn btn-dark d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
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

  <!-- ================== BEGIN page-js ================== -->
  <script src="../assets/js/demo/pos-customer-order.demo.js"></script>
  <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
  <!-- ================== END page-js ================== -->
</body>

</html>
