<!-- Modal Sidebar Menu -->
<div class="modal sidebarMenu -left -guest fade" id="sidebarMenu" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            @guest
                <div class="modal-header">
                    <div class="welcome_em">
                        <h2>Welcome to <span>Quiz Universe.</span></h2>
                        <p>
                            <a href="#"> Sign in</a> or <a href="#">create an account</a> 
                        </p>
                        <a href="{{ url('register') }}"
                            class="btn bg-red margin-r-20 color-white size-14 min-w-100 h-40 rounded-8 btn_signin d-inline-flex align-items-center justify-content-center hover:color-white">
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
                            <a href="profile">
                                {{-- <img class="_imgUser" src="{{ url('/') }}/user-icon.png" alt=""> --}}
                                 {{-- <img class="avatar avatar-xxl avatar-4x3"
                                    src="{{ asset('assets/new_assets/img/integrations-logo/zapier-banner.png') }}"
                                    alt="Zapier"> --}}
                                    <?php $av = str_split(auth()->user()->name);
                                    ?>
                                <div class="user-avatar me-3">{{$av[0]}}</div>
                                <p style="color: red;">{{ auth()->user()->role }}</p>
                            </a>
                            <div class="media-body">
                                <div class="txt">
                                    <form action="{{ url('sign-out') }}" method="POST">
                                        @csrf
                                        <h3>{{ auth()->user()->name }}</h3>
                                        <p>{{ auth()->user()->email }}</p>
                                        <button type="submit" class="btn btn_logOut">Sign out</button>
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

                    @if (auth()->check() && (auth()->user()->role == 'Admin'))
                     <li class="nav-item">
                        <a class="nav-link" href="{{ url('/users-list') }}">
                            <div class="">
                                <div class="icon_current">
                                   <i class="bi bi-person-lines-fill"></i>
                                    <span class="title_link">List of users</span>
                                </div>
                                <div class="icon_active">
                                   <i class="bi bi-person-lines-fill"></i>
                                    <span class="title_link">List of users</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endif

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

                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="#">-->
                    <!--        <div class="">-->
                    <!--            <div class="icon_current">-->
                    <!--                <i class="tio-share"></i>-->
                    <!--                <span class="title_link">Ask QA</span>-->
                    <!--            </div>-->
                    <!--            <div class="icon_active">-->
                    <!--                <i class="tio-share"></i>-->
                    <!--                <span class="title_link">Ask QA</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="#">-->
                    <!--        <div class="">-->
                    <!--            <div class="icon_current">-->
                    <!--                <i class="tio-book_outlined"></i>-->
                    <!--                <span class="title_link">Notes</span>-->
                    <!--            </div>-->
                    <!--            <div class="icon_active">-->
                    <!--                <i class="tio-book_outlined"></i>-->
                    <!--                <span class="title_link">Notes</span>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    @if (auth()->check() && (auth()->user()->role == 'Admin' || auth()->user()->role == 'Editor'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('question-list') }}">
                                <div class="">
                                    <div class="icon_current">
                                        <i class="tio-pen"></i>
                                        <span class="title_link">Questions List</span>
                                    </div>
                                    <div class="icon_active">
                                        <i class="tio-pen"></i>
                                        <span class="title_link">Questions List</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>

            </div>
            {{-- <div class="modal-footer">
                <div class="em_darkMode_menu">
                    <label class="text" for="customSwitch1">
                        <h3>Dark Mode</h3>
                        <p>Browsing in night mode</p>
                    </label>
                    <div class="em_toggle">
                        <button type="button" class="btn btn-toggle switchDarkMode" data-toggle="button"
                            aria-pressed="false" autocomplete="off" id="customSwitch1">
                            <div class="handle"></div>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
