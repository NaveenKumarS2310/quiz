<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from emobile.orinostudio.com/preview/page-signin-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:27:11 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="format-detection" content="telephone=no">

    <meta name="theme-color" content="#ff3f3f">
    <title>{{ env('APP_NAME') }} | Register</title>
    <meta name="description" content="{{ env('APP_NAME') }} | Register">
    <meta name="keywords"
        content="bootstrap 4, mobile template, 404, chat, about, cordova, phonegap, mobile, html, ecommerce, shopping, store, delivery, wallet, banking, education, jobs, careers, distance learning" />

    <!-- favicon -->
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="favicon.png">

    <!-- CSS Libraries-->
    <!-- bootstrap v4.6.0 -->
    <link rel="stylesheet" href="{{ url('/') }}/theme/assets/css/bootstrap.min.css">
    <!--
        theiconof v3.0
        https://www.theiconof.com/search
     -->
    <link rel="stylesheet" href="{{ url('/') }}/theme/assets/css/icons.css">
    <!-- Swiper 6.4.11 -->
    <link rel="stylesheet" href="{{ url('/') }}/theme/assets/css/swiper-bundle.min.css">
    <!-- Owl Carousel v2.3.4 -->
    <link rel="stylesheet" href="{{ url('/') }}/theme/assets/css/owl.carousel.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ url('/') }}/theme/assets/css/main.css">
    <!-- normalize.css v8.0.1 -->
    <link rel="stylesheet" href="{{ url('/') }}/theme/assets/css/normalize.css">

    <!-- manifest meta -->
    <link rel="manifest" href="_manifest.json" />
    <!-- Hotjar Tracking Code for https://emobile.orinostudio.com/preview/index.html -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2340091,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>

<body>
    <!-- Start em_loading -->
    <section class="em_loading" id="loaderPage">
        <div class="spinner_flash"></div>
    </section>
    <!-- End. em_loading -->
    <div id="wrapper">
        <div id="content">

            <section class="em__signTypeOne mt-3">
                <form action="{{ route('register_submit') }}" method="POST">
                    @csrf
                    <div class="em_titleSign">
                        <h1>Welcome to</h1>
                        <div class="brand">
                            <h2>{{ env('APP_NAME') }}</h2>
                        </div>
                    </div>
                    <div class="em__body">
                        <div class="form-group with_icon">
                            <label>Name</label>
                            <div class="input_group">
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter Your Name">
                                <div class="icon">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                                stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group with_icon">
                            <label>Email Address</label>
                            <div class="input_group">
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter Your Email ID">
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Message" data-name="Iconly/Two-tone/Message"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g id="Message" transform="translate(2 3)">
                                            <path id="Path_445" d="M11.314,0,7.048,3.434a2.223,2.223,0,0,1-2.746,0L0,0"
                                                transform="translate(3.954 5.561)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4" />
                                            <path id="Rectangle_511"
                                                d="M4.888,0h9.428A4.957,4.957,0,0,1,17.9,1.59a5.017,5.017,0,0,1,1.326,3.7v6.528a5.017,5.017,0,0,1-1.326,3.7,4.957,4.957,0,0,1-3.58,1.59H4.888C1.968,17.116,0,14.741,0,11.822V5.294C0,2.375,1.968,0,4.888,0Z"
                                                transform="translate(0 0)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                        </g>
                                    </svg>

                                </div>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group with_icon mb-2" id="show_hide_password">
                            <label>Password</label>
                            <div class="input_group">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter Your Password">
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Password" data-name="Iconly/Two-tone/Password"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g id="Password" transform="translate(2 2)">
                                            <path id="Stroke_1" data-name="Stroke 1"
                                                d="M13.584,0H4.915C1.894,0,0,2.139,0,5.166v8.168C0,16.361,1.885,18.5,4.915,18.5h8.668c3.031,0,4.917-2.139,4.917-5.166V5.166C18.5,2.139,16.614,0,13.584,0Z"
                                                transform="translate(0.75 0.75)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4" />
                                            <path id="Stroke_3" data-name="Stroke 3"
                                                d="M3.7,1.852A1.852,1.852,0,1,1,1.851,0,1.852,1.852,0,0,1,3.7,1.852Z"
                                                transform="translate(4.989 8.148)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_5" data-name="Stroke 5" d="M0,0H6.318V1.852"
                                                transform="translate(8.692 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_7" data-name="Stroke 7" d="M.5,1.852V0"
                                                transform="translate(11.682 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                        </g>
                                    </svg>
                                </div>
                                <button type="button" class="btn hide_show icon_password">
                                    <i class="tio-hidden_outlined"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group with_icon mb-2" id="show_hide_password">
                            <label>Confirm Password</label>
                            <div class="input_group">
                                <input type="password" name="confirm_password"
                                    class="form-control @error('confirm_password') is-invalid @enderror"
                                    placeholder="Re Enter Your Password">
                                <div class="icon">
                                    <svg id="Iconly_Two-tone_Password" data-name="Iconly/Two-tone/Password"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g id="Password" transform="translate(2 2)">
                                            <path id="Stroke_1" data-name="Stroke 1"
                                                d="M13.584,0H4.915C1.894,0,0,2.139,0,5.166v8.168C0,16.361,1.885,18.5,4.915,18.5h8.668c3.031,0,4.917-2.139,4.917-5.166V5.166C18.5,2.139,16.614,0,13.584,0Z"
                                                transform="translate(0.75 0.75)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" opacity="0.4" />
                                            <path id="Stroke_3" data-name="Stroke 3"
                                                d="M3.7,1.852A1.852,1.852,0,1,1,1.851,0,1.852,1.852,0,0,1,3.7,1.852Z"
                                                transform="translate(4.989 8.148)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_5" data-name="Stroke 5" d="M0,0H6.318V1.852"
                                                transform="translate(8.692 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                            <path id="Stroke_7" data-name="Stroke 7" d="M.5,1.852V0"
                                                transform="translate(11.682 10)" fill="none" stroke="#200e32"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                stroke-width="1.5" />
                                        </g>
                                    </svg>
                                </div>
                                <button type="button" class="btn hide_show icon_password">
                                    <i class="tio-hidden_outlined"></i>
                                </button>
                            </div>
                            @error('confirm_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="em__footer">
                        <button type="submit"
                            class="btn bg-primary color-white justify-content-center">Register</button>
                        <a href="{{ route('login') }}" class="btn hover:color-secondary justify-content-center">I
                            Already have a Account!
                            Login</a>
                    </div>
                </form>
            </section>
        </div>
    </div>

    <!-- jquery -->
    <script src="{{ url('/') }}/theme/assets/js/jquery-3.6.0.js"></script>
    <!-- popper.min.js 1.16.1 -->
    <script src="{{ url('/') }}/theme/assets/js/popper.min.js"></script>
    <!-- bootstrap.js v4.6.0 -->
    <script src="{{ url('/') }}/theme/assets/js/bootstrap.min.js"></script>

    <!-- Owl Carousel v2.3.4 -->
    <script src="{{ url('/') }}/theme/assets/js/vendor/owl.carousel.min.js"></script>
    <!-- Swiper 6.4.11 -->
    <script src="{{ url('/') }}/theme/assets/js/vendor/swiper-bundle.min.js"></script>
    <!-- sharer 0.4.0 -->
    <script src="{{ url('/') }}/theme/assets/js/vendor/sharer.js"></script>
    <!-- short-and-sweet v1.0.2 - Accessible character counter for input elements -->
    <script src="{{ url('/') }}/theme/assets/js/vendor/short-and-sweet.min.js"></script>
    <!-- jquery knob -->
    <script src="{{ url('/') }}/theme/assets/js/vendor/jquery.knob.min.js"></script>
    <!-- main.js -->
    <script src="{{ url('/') }}/theme/assets/js/main.js" defer></script>
    <!-- PWA app service registration and works js -->
    <script src="{{ url('/') }}/theme/assets/js/pwa-services.js"></script>
</body>


<!-- Mirrored from emobile.orinostudio.com/preview/page-signin-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Apr 2021 21:27:11 GMT -->

</html>
