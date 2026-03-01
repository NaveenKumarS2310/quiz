@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')
@section('style')

@endsection
@extends('layouts.master')
@section('content')
    <style>
        .em_brand a {
            color: #fff;
        }

        /* Design System */
        :root {
            --primary-color: #ef5350;
            --primary-dark: #e53935;
            --secondary-color: #26a69a;
            --header-dark: #0f1f3a;
            --header-darker: #1a2e4a;
            --text-primary: #1a1a1a;
            --text-secondary: #666666;
            --text-muted: #999999;
            --bg-light: #fafafa;
            --bg-white: #ffffff;
            --border-light: #f0f0f0;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Dashboard Container */
        .dashboard-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Section */
        .dashboard-header {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .wave-svg {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        /* Branding Section */
        .header-branding {
            position: absolute;
            top: 24px;
            left: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 15;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff5252 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        .branding-text {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .brand-name {
            font-size: 14px;
            font-weight: 700;
            color: white;
            letter-spacing: -0.3px;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .brand-subtitle {
            font-size: 11px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px 24px;
            z-index: 10;
        }

        .user-info {
            flex: 1;
            color: white;
        }

        .user-name {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin: 0;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .user-email {
            font-size: 14px;
            opacity: 0.85;
            font-weight: 400;
            margin: 0;
        }

        .header-decoration {
            flex-shrink: 0;
            width: 200px;
            height: 200px;
            position: relative;
            margin-right: -60px;
        }

        .wave-circle {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, #ffb88c 0%, #ffa070 50%, #ff9a6f 100%);
            opacity: 0.9;
            box-shadow: 0 8px 24px rgba(255, 160, 112, 0.3);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        /* Dashboard Content */
        .dashboard-content {
            flex: 1;
            padding: 24px;
            margin-top: -60px;
            position: relative;
            z-index: 20;
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            gap: 0;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            margin-bottom: 24px;
            padding: 24px;
        }

        .stat-card {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: var(--transition);
        }

        .stat-card-scores {
            padding-right: 24px;
        }

        .stat-card-tokens {
            padding-left: 24px;
        }

        .stat-divider {
            width: 1px;
            height: 60px;
            background: linear-gradient(to bottom, transparent, var(--border-light), transparent);
            margin: 0 12px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .stat-card-scores .stat-icon {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.12) 0%, rgba(76, 175, 80, 0.06) 100%);
            color: #4caf50;
        }

        .stat-card-tokens .stat-icon {
            background: linear-gradient(135deg, rgba(33, 150, 243, 0.12) 0%, rgba(33, 150, 243, 0.06) 100%);
            color: #2196f3;
        }

        .stat-content {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            color: var(--text-primary);
        }

        .stat-label {
            font-size: 13px;
            color: var(--text-secondary);
            font-weight: 500;
        }

        /* Menu Section */
        .menu-section {
            display: flex;
            flex-direction: column;
            gap: 2px;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px 24px;
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
            border-bottom: 1px solid var(--border-light);
            position: relative;
            overflow: hidden;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: transparent;
            transition: var(--transition);
        }

        .menu-item:hover {
            background-color: #f9fafb;
            padding-left: 28px;
        }

        .menu-item:hover::before {
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        }

        .menu-item:hover .menu-icon {
            transform: scale(1.1);
        }

        .menu-item:hover .menu-title {
            color: var(--primary-color);
        }

        .menu-item:hover .menu-chevron {
            transform: translateX(4px);
        }

        .menu-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
            transition: var(--transition);
        }

        .menu-item:nth-child(1) .menu-icon {
            background: linear-gradient(135deg, rgba(239, 83, 80, 0.12) 0%, rgba(239, 83, 80, 0.06) 100%);
            color: var(--primary-color);
        }

        .menu-item:nth-child(2) .menu-icon {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.12) 0%, rgba(76, 175, 80, 0.06) 100%);
            color: #4caf50;
        }

        .menu-item:nth-child(3) .menu-icon {
            background: linear-gradient(135deg, rgba(255, 152, 0, 0.12) 0%, rgba(255, 152, 0, 0.06) 100%);
            color: #ff9800;
        }

        .menu-item:nth-child(4) .menu-icon {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.12) 0%, rgba(156, 39, 176, 0.06) 100%);
            color: #9c27b0;
        }

        .menu-item:nth-child(5) .menu-icon {
            background: linear-gradient(135deg, rgba(233, 30, 99, 0.12) 0%, rgba(233, 30, 99, 0.06) 100%);
            color: #e91e63;
        }

        .menu-item:nth-child(6) .menu-icon {
            background: linear-gradient(135deg, rgba(0, 188, 212, 0.12) 0%, rgba(0, 188, 212, 0.06) 100%);
            color: #00bcd4;
        }

        .menu-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .menu-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            transition: var(--transition);
            letter-spacing: -0.2px;
        }

        .menu-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
            font-weight: 400;
        }

        .menu-chevron {
            font-size: 18px;
            color: var(--text-muted);
            transition: var(--transition);
            flex-shrink: 0;
        }

        /* Menu Badge */
        .menu-badge {
            background: linear-gradient(135deg, #ef5350 0%, #e53935 100%);
            color: white;
            font-size: 12px;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 12px;
            margin-left: auto;
            margin-right: 8px;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(239, 83, 80, 0.3);
            letter-spacing: -0.3px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-content {
                padding: 16px;
                margin-top: -40px;
            }

            .stats-section {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }

            .stat-card {
                justify-content: center;
                text-align: center;
                flex-direction: column;
            }

            .stat-card-scores {
                padding-right: 0;
            }

            .stat-card-tokens {
                padding-left: 0;
            }

            .stat-divider {
                display: none;
            }

            .user-name {
                font-size: 28px;
            }

            .header-decoration {
                width: 150px;
                height: 150px;
                margin-right: -40px;
            }

            .menu-item {
                padding: 16px 20px;
            }

            .menu-item:hover {
                padding-left: 24px;
            }

            .menu-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .dashboard-header {
                height: 240px;
            }

            .header-content {
                padding: 32px 16px;
            }

            .user-name {
                font-size: 24px;
            }

            .header-decoration {
                width: 120px;
                height: 120px;
                margin-right: -30px;
            }

            .dashboard-content {
                padding: 12px;
                margin-top: -30px;
            }

            .stats-section {
                padding: 16px;
                border-radius: 12px;
                margin-bottom: 16px;
            }

            .stat-value {
                font-size: 24px;
            }

            .menu-section {
                border-radius: 12px;
            }

            .menu-item {
                padding: 14px 16px;
                gap: 12px;
            }

            .menu-icon {
                width: 36px;
                height: 36px;
                font-size: 16px;
            }

            .menu-title {
                font-size: 14px;
            }

            .menu-subtitle {
                font-size: 12px;
            }
        }
    </style>

    <section class=" emPage___profile with__background">
        <div class="emPersonal__data">
            <div class="name">
                <h2>{{ ucwords($user->name) }}</h2>
                <p>{{ $user->email }}</p>
            </div>
            <div class="photo_persona">
                {{-- <img src="{{ url('user-image.png') }}" alt=""> --}}
                <div class="user-avatar me-3">{{ strtoupper(auth()->user()->name[0]) }}</div>
            </div>
        </div>

        <div class="emBody__navLink padding-t-30 padding-b-20">
            {{-- <ul>
                <li class="item">

                    <div class="row">
                        <div class="col-6">
                            <div class="text-center">
                                <h2 class="text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-message-star">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 9h8" />
                                        <path d="M8 13h4.5" />
                                        <path
                                            d="M10.325 19.605l-2.325 1.395v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" />
                                        <path
                                            d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                                    </svg> 11
                                </h2>
                                <p>Your Scores</p>
                            </div>
                        </div>
                        <div class="col-6" style="border-left: 1px solid #ccc;">
                            <div class="text-center">
                                <h2 class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-coins">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                        <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                        <path
                                            d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                        <path d="M3 6v10c0 .888 .772 1.45 2 2" />
                                        <path d="M3 11c0 .888 .772 1.45 2 2" />
                                    </svg> {{ $user->my_tokens }}</h2>
                                <p>Tokens</p>
                            </div>
                        </div>
                    </div>

                </li>
                 <li class="item">
                <a href="#" class="nav-link">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Profile" data-name="Iconly/Two-tone/Profile"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Profile" transform="translate(4 2)">
                                    <circle id="Ellipse_736" cx="4.778" cy="4.778" r="4.778"
                                        transform="translate(2.801 0)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                    <path id="Path_33945"
                                        d="M0,3.016a2.215,2.215,0,0,1,.22-.97A4.042,4.042,0,0,1,3.039.426,16.787,16.787,0,0,1,5.382.1,25.053,25.053,0,0,1,9.767.1a16.979,16.979,0,0,1,2.343.33c1.071.22,2.362.659,2.819,1.62a2.27,2.27,0,0,1,0,1.95c-.458.961-1.748,1.4-2.819,1.611a15.716,15.716,0,0,1-2.343.339A25.822,25.822,0,0,1,6.2,6a4.066,4.066,0,0,1-.815-.055,15.423,15.423,0,0,1-2.334-.339C1.968,5.4.687,4.957.22,4A2.279,2.279,0,0,1,0,3.016Z"
                                        transform="translate(0 13.185)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>My Account</h3>
                                <p>Edit your informations</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>

            <li class="item">
                <a href="page-my-orders.html" class="btn nav-link disabled text-left">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Document" data-name="Iconly/Two-tone/Document"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Document" transform="translate(3 2)">
                                    <path id="Stroke_1" data-name="Stroke 1" d="M7.22.5H0"
                                        transform="translate(5.496 13.723)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                    <path id="Stroke_2" data-name="Stroke 2" d="M7.22.5H0"
                                        transform="translate(5.496 9.537)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                    <path id="Stroke_3" data-name="Stroke 3" d="M2.755.5H0"
                                        transform="translate(5.496 5.36)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                    <path id="Stroke_4" data-name="Stroke 4"
                                        d="M12.158,0,4.469,0A4.251,4.251,0,0,0,0,4.607v9.2A4.254,4.254,0,0,0,4.506,18.41l7.689,0a4.252,4.252,0,0,0,4.47-4.6v-9.2A4.255,4.255,0,0,0,12.158,0Z"
                                        transform="translate(0.751 0.75)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                </g>
                            </svg>

                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>My Orders</h3>
                                <p>Manage your orders</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="page-payment-method.html" class="nav-link">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Wallet" data-name="Iconly/Two-tone/Wallet"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Wallet" transform="translate(2.5 3)">
                                    <path id="Stroke_1" data-name="Stroke 1"
                                        d="M6.74,5.383H2.692A2.691,2.691,0,1,1,2.692,0H6.74"
                                        transform="translate(12.398 6.013)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path id="Stroke_3" data-name="Stroke 3" d="M.612.456H.3"
                                        transform="translate(14.937 8.187)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path id="Stroke_5" data-name="Stroke 5"
                                        d="M5.248,0h8.643a5.248,5.248,0,0,1,5.248,5.248v7.177a5.248,5.248,0,0,1-5.248,5.248H5.248A5.248,5.248,0,0,1,0,12.425V5.248A5.248,5.248,0,0,1,5.248,0Z"
                                        transform="translate(0 0)" fill="none" stroke="#292e34" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" />
                                    <path id="Stroke_7" data-name="Stroke 7" d="M0,.456H5.4"
                                        transform="translate(4.536 4.082)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>Payment Method</h3>
                                <p>Manage your payment methods</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>

           
            <li class="item">
                <a href="page-shipping-address.html" class="nav-link">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Location" data-name="Iconly/Two-tone/Location"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Location" transform="translate(3.5 2)">
                                    <path id="Path_33958"
                                        d="M0,7.652A7.678,7.678,0,1,1,15.357,7.7v.087a11.338,11.338,0,0,1-3.478,7.3,20.183,20.183,0,0,1-3.591,2.957.93.93,0,0,1-1.217,0,19.817,19.817,0,0,1-5.052-4.73A9.826,9.826,0,0,1,0,7.678Z"
                                        transform="translate(0.739 0.739)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <circle id="Ellipse_740" cx="2.461" cy="2.461" r="2.461"
                                        transform="translate(5.957 6.078)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>Shipping Address</h3>
                                <p>Manage your addresses</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="page-wishlist.html" class="nav-link">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Bookmark" data-name="Iconly/Two-tone/Bookmark"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Bookmark" transform="translate(3.5 2)">
                                    <path id="Path_33968"
                                        d="M7.368,15.854,1.437,19.1a.989.989,0,0,1-1.318-.394h0A1.043,1.043,0,0,1,0,18.243V3.844C0,1.1,1.876,0,4.577,0H10.92C13.538,0,15.5,1.025,15.5,3.661V18.243a.979.979,0,0,1-.979.979,1.08,1.08,0,0,1-.476-.119L8.073,15.854A.741.741,0,0,0,7.368,15.854Z"
                                        transform="translate(0.796 0.778)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path id="Line_209" d="M0,.458H7.3" transform="translate(4.87 6.865)" fill="none"
                                        stroke="#292e34" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-miterlimit="10" stroke-width="1.5" opacity="0.4" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>Wishlist</h3>
                                <p>Your favorite products</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <span class="number_item">23</span>
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="page-notification.html" class="nav-link">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Activity" data-name="Iconly/Two-tone/Activity"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Activity" transform="translate(2 1.5)">
                                    <path id="Path_33966" d="M0,4.989,2.993,1.1,6.407,3.78,9.336,0"
                                        transform="translate(5.245 8.293)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                    <circle id="Ellipse_741" cx="1.922" cy="1.922" r="1.922"
                                        transform="translate(16.073 0.778)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <path id="Path"
                                        d="M12.146,0H4.879C1.867,0,0,2.133,0,5.144v8.082c0,3.011,1.831,5.135,4.879,5.135h8.6c3.011,0,4.879-2.124,4.879-5.135V6.188"
                                        transform="translate(0.778 1.62)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>Notification</h3>
                                <p>Block , allow, prioritize</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="page-contact.html" class="nav-link">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Message" data-name="Iconly/Two-tone/Message"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Message" transform="translate(2 3)">
                                    <path id="Path_445" d="M11.314,0,7.048,3.434a2.223,2.223,0,0,1-2.746,0L0,0"
                                        transform="translate(3.954 5.561)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                    <path id="Rectangle_511"
                                        d="M4.888,0h9.428A4.957,4.957,0,0,1,17.9,1.59a5.017,5.017,0,0,1,1.326,3.7v6.528a5.017,5.017,0,0,1-1.326,3.7,4.957,4.957,0,0,1-3.58,1.59H4.888C1.968,17.116,0,14.741,0,11.822V5.294C0,2.375,1.968,0,4.888,0Z"
                                        transform="translate(0 0)" fill="none" stroke="#292e34" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>Contact</h3>
                                <p>Fill the form to contact us</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>
            <li class="item">
                <a href="page-language.html" class="btn nav-link text-left disabled">
                    <div class="media align-items-center">
                        <div class="ico">
                            <svg id="Iconly_Two-tone_Setting" data-name="Iconly/Two-tone/Setting"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Setting" transform="translate(2.5 1.5)">
                                    <path id="Path_33946"
                                        d="M17.528,5.346l-.622-1.08a1.913,1.913,0,0,0-2.609-.7h0a1.9,1.9,0,0,1-2.609-.677,1.831,1.831,0,0,1-.256-.915h0A1.913,1.913,0,0,0,9.519,0H8.265a1.9,1.9,0,0,0-1.9,1.913h0A1.913,1.913,0,0,1,4.448,3.8a1.831,1.831,0,0,1-.915-.256h0a1.913,1.913,0,0,0-2.609.7l-.668,1.1a1.913,1.913,0,0,0,.7,2.609h0a1.913,1.913,0,0,1,.957,1.657,1.913,1.913,0,0,1-.957,1.657h0a1.9,1.9,0,0,0-.7,2.6h0l.632,1.089A1.913,1.913,0,0,0,3.5,15.7h0a1.895,1.895,0,0,1,2.6.7,1.831,1.831,0,0,1,.256.915h0a1.913,1.913,0,0,0,1.913,1.913H9.519a1.913,1.913,0,0,0,1.913-1.9h0a1.9,1.9,0,0,1,1.913-1.913,1.95,1.95,0,0,1,.915.256h0a1.913,1.913,0,0,0,2.609-.7h0l.659-1.1a1.9,1.9,0,0,0-.7-2.609h0a1.9,1.9,0,0,1-.7-2.609,1.876,1.876,0,0,1,.7-.7h0a1.913,1.913,0,0,0,.7-2.6h0Z"
                                        transform="translate(0.779 0.778)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" />
                                    <circle id="Ellipse_737" cx="2.636" cy="2.636" r="2.636"
                                        transform="translate(7.039 7.753)" fill="none" stroke="#292e34"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                        stroke-width="1.5" opacity="0.4" />
                                </g>
                            </svg>
                        </div>
                        <div class="media-body">
                            <div class="txt">
                                <h3>Language</h3>
                                <p>Available in more than 6 languages</p>
                            </div>
                        </div>
                    </div>
                    <div class="side_right">
                        <i class="tio-chevron_right"></i>
                    </div>
                </a>
            </li>
            </ul>  --}}
            <div class="dashboard-content">
                <!-- Stats Cards -->
                <div class="stats-section">
                    <div class="row">
                        {{-- <div class="col-6">
                            <div class="stat-card stat-card-scores">
                                <div class="stat-icon">
                                    <i class="bi bi-graph-up"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-value">22</div>
                                    <div class="stat-label">Your Scores</div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="stat-card stat-card-tokens">
                                <div class="stat-icon">
                                    <i class="bi bi-gem"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-value">{{ $user->my_tokens }}</div>
                                    <div class="stat-label">Tokens</div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

                <!-- Menu Items -->
                <div class="menu-section">
                    <!-- My Account -->
                    {{-- <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="menu-content">
                            <h3 class="menu-title">My Account</h3>
                            <p class="menu-subtitle">Edit your informations</p>
                        </div>
                        <div class="menu-chevron">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a> --}}

                    <!-- My Orders -->
                    {{-- <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="menu-content">
                            <h3 class="menu-title">My Orders</h3>
                            <p class="menu-subtitle">Manage your orders</p>
                        </div>
                        <div class="menu-chevron">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a> --}}

                    <!-- Payment Method -->
                    {{-- <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <div class="menu-content">
                            <h3 class="menu-title">Payment Method</h3>
                            <p class="menu-subtitle">Manage payment methods</p>
                        </div>
                        <div class="menu-chevron">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a> --}}

                    <!-- Shipping Address -->
                    {{-- <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="menu-content">
                            <h3 class="menu-title">Shipping Address</h3>
                            <p class="menu-subtitle">Manage your addresses</p>
                        </div>
                        <div class="menu-chevron">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a> --}}

                    <!-- Wishlist -->
                    {{-- <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="bi bi-bookmark"></i>
                        </div>
                        <div class="menu-content">
                            <h3 class="menu-title">Wishlist</h3>
                            <p class="menu-subtitle">Your favorite products</p>
                        </div>
                        <div class="menu-badge">22</div>
                        <div class="menu-chevron">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a> --}}

                    <!-- Notification -->
                    {{-- <a href="#" class="menu-item">
                        <div class="menu-icon">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="menu-content">
                            <h3 class="menu-title">Notification</h3>
                            <p class="menu-subtitle">Push, allow, prioritize</p>
                        </div>
                        <div class="menu-chevron">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a> --}}
                </div>
            </div>
        </div>

    </section>
    <!-- End. emPage___profile with__background -->

    <!-- <section class="emPage__public padding-t-70">


                                                    <div class="profile profile-card">
                                                        <img src="/user-icon.png" alt="">
                                                        <h1 class="card-title">{{ $user->name }}</h1>
                                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                                        <button class="btn-follow">FOLLOW</button>

                                                        <div class="sidebar">
                                                            <a href="#"><i class="fa fa-home"></i> Overview</a>
                                                            <a href="#"><i class="fa fa-cog"></i> Account Settings</a>
                                                            <a href="#"><i class="fa fa-tasks"></i> Tasks</a>
                                                            <a href="#"><i class="fa fa-question-circle"></i> Help</a>
                                                        </div>
                                                    </div>



                                                    <br>
                                                    <br>
                                                    <br>

                                                </section> -->
@endsection
