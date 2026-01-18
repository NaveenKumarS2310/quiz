<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @yield('css')
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('theme/admin-assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin-assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin-assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/admin-assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('theme/admin-assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('theme/admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('theme/admin-assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('theme/admin-assets/images/favicon.png') }}" />
    <style>
        /* Avatar */
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Toggle Switch */
        .switch {
            position: relative;
            display: inline-block;
            width: 52px;
            height: 26px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        /* ON state */
        input:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        /* OFF label */
        .slider::after {
            /* content: 'OFF'; */
            color: #fff;
            font-size: 10px;
            position: absolute;
            right: 7px;
            top: 6px;
        }

        /* ON label */
        input:checked+.slider::after {
            /* content: 'ON'; */
            left: 8px;
            right: auto;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        {{-- <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-3">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/purple-bootstrap-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white mr-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div> --}}
        <!-- partial:partials/_navbar.html -->
        @yield('pageheader')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @yield('sidemenu')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
            </div>
            <!-- main-panel ends -->
        </div>
    </div>
    <script src="{{ asset('theme/admin-assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/js/misc.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/js/settings.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/js/todolist.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('theme/admin-assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
</body>

</html>
