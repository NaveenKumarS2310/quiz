<!-- Modal Sidebar Menu -->
<div class="modal sidebarMenu -left -guest fade" id="sidebarMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            @guest
                <div class="modal-header">
                    <div class="welcome_em">
                        <h2>Welcome to <span> Quiz Universe.</span></h2>
                        <p>
                            <a href="{{ url('login') }}"> Sign in</a> OR <a href="{{ url('register') }}">create an
                                account</a>
                        </p>
                        <a href="{{ url('register') }}"
                            class="btn bg-green margin-r-20 color-white size-14 min-w-100 h-40 rounded-8 btn_signin d-inline-flex align-items-center justify-content-center hover:color-white">
                            Sign Up
                        </a>
                        <a href="{{ url('login') }}"
                            class="btn bg-white color-secondary border-snow border-solid size-14 min-w-100 h-40 rounded-8 btn_signin d-inline-flex align-items-center justify-content-center">
                            Sign In
                        </a>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear"></i>
                    </button>
                </div>
            @endguest
            @auth
                <div class="modal-header">
                    <div class="em_profile_user">
                        <div class="media">
                            <a href="profile" class="me-3">
                                {{-- <img class="_imgUser" src="{{ url('/') }}/user-icon.png" alt=""> --}}
                                {{-- <img class="avatar avatar-xxl avatar-4x3"
                                    src="{{ asset('assets/new_assets/img/integrations-logo/zapier-banner.png') }}"
                                    alt="Zapier"> --}}

                                <div class="user-avatar me-3">{{ strtoupper(auth()->user()->name[0]) }}</div>

                            </a>
                            <div class="media-body" style="margin-left: 20px;">
                                <div class="txt ">
                                    <form action="{{ url('sign-out') }}" method="POST">
                                        @csrf
                                        <h3 class="ms-3 d-flex align-items-center justify-content-between">
                                            {{ ucwords(auth()->user()->name) }} <a href="{{ url('profile') }}"
                                                class="badge rounded-pill bg-success badge-sm text-white fs-12 fw-regular">{{ auth()->user()->role }}</a>
                                        </h3>
                                        <p class="ms-3 text-secondary mb-1">{{ auth()->user()->email }}</p>
                                        <button type="submit" class="btn btn-danger btn-sm w-100 mt-1"><i
                                                class="bi bi-box-arrow-right me-2"></i>Sign out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="tio-clear"></i>
                    </button>
                </div>
            @endauth
            <div class="modal-body">
                <ul class="nav flex-column -active-links">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <div class="">
                                <div class="icon_current">
                                    <i class="tio-home_outlined"></i>
                                    <span class="title_link">Home</span>
                                </div>
                                <div class="icon_active">
                                    <i class="tio-home_outlined"></i>
                                    <span class="title_link">Home</span>
                                </div>
                            </div>
                        </a>
                    </li>



                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('quiz') }}">
                            <div class="">
                                <div class="icon_current">
                                    <i class="tio-pen"></i>
                                    <span class="title_link">TNPSC Free Online Test</span>
                                </div>
                                <div class="icon_active">
                                    <i class="tio-pen"></i>
                                    <span class="title_link">TNPSC Free Online Test</span>
                                </div>
                            </div>
                        </a>
                    </li> --}}

                    <li class="nav-item">

                        <a class="nav-link" href="{{ url('privacy-policy') }}">
                            <div class="">
                                <div class="icon_current">
                                    <i class="tio-book_outlined"></i>
                                    <span class="title_link">Privacy Policy</span>
                                </div>
                                <div class="icon_active">
                                    <i class="tio-book_outlined"></i>
                                    <span class="title_link">Privacy Policy</span>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact-us') }}">
                            <div class="">
                                <div class="icon_current">
                                    <i class="bi bi-telephone-outbound"></i>
                                    <span class="title_link">Contact Us</span>
                                </div>
                                <div class="icon_active">
                                    <i class="bi bi-telephone-outbound"></i>
                                    <span class="title_link">Contact Us</span>
                                </div>
                            </div>
                        </a>
                    </li>




                </ul>

            </div>

        </div>
    </div>
</div>
