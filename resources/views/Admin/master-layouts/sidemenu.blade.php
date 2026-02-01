<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    {{-- <img src="{{ url('/') }}/theme/admin-assets/images/faces/face1.jpg" alt="profile" />
                     --}}
                     <div class="avatar">{{ mb_substr(Auth::user()->name, 0, 1) }} <span class="login-status online"></span></div>
                    
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">{{ Auth::user()->role }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        

        

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Masters</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.quiz.category.create.index') }}">Quiz Category</a>
                    </li>
                    <li class="nav-item">
                        
                        <a class="nav-link" href="{{ route('admin.interview.category.create.index') }}">Interview Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.job.category.create.index') }}">Job Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.news.category.create.index') }}">News Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.notes.category.create.index') }}">Notes Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.document.category.create.index') }}">Document Category</a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Upload</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/font-awesome.html">Free Quiz Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/font-awesome.html">Free interview Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/font-awesome.html">Payment Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.job.upload.create.index') }}">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.news.upload.create.index') }}">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.document.upload.create.index') }}">Document</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.notes.upload.create.index') }}">Notes</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Test Upload</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quiz.free') }}">Free Quiz Test</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="">Free Interview Test</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="">Payment Test</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html" target="_blank">
                <span class="menu-title">Token Management</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="menu-title">User Management</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.create.index') }}">Create & edit users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.token.index') }}">Token management</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <span class="menu-title">Tables</span>
                <i class="mdi mdi-table-large menu-icon"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                aria-controls="auth">
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-lock menu-icon"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/register.html"> Register </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                    </li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html" target="_blank">
                <span class="menu-title">Documentation</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
            </a>
        </li> --}}
    </ul>
</nav>
