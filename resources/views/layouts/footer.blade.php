<!-- Start em_main_footer -->
<footer class="em_main_footer with__text just_color p-0">
    <div class="em_body_navigation -active-links -active_primary">
        <div class="item_link">
            <a href="{{ url('/') }}" class="btn btn_navLink">
                <div class="icon_current">
                    <i class="tio-home_outlined"></i>
                </div>
                <div class="icon_active">
                    <i class="tio-home_outlined" style="color: var(--bg-primary);"></i>
                </div>
                <div class="txt__tile">Home</div>
            </a>
        </div>
        <div class="item_link">
            <a href="{{ url('quiz') }}" class="btn btn_navLink">
                <div class="icon_current">
                    <i class="tio-pen"></i>
                </div>
                <div class="icon_active">
                    <i class="tio-pen" style="color: var(--bg-primary);"></i>
                </div>
                <div class="txt__tile">TNPSC</div>
            </a>
        </div>
        @if (auth()->check() && (auth()->user()->role == 'Admin' || auth()->user()->role == 'Editor'))
        <div class="item_link">
            <a href="#" class="btn btn_navLink">
                <button type="button" class="btn btnCircle_default _lg" data-toggle="modal"
                    data-target="#create_modal">
                    <i class="tio-add"></i>
                </button>
            </a>
        </div>
        @endif

        <div class="item_link">
            <a href="#" class="btn btn_navLink">
                <div class="icon_current">
                    <i class="tio-share"></i>
                </div>
                <div class="icon_active">
                    <i class="tio-share" style="color: var(--bg-primary);"></i>
                </div>
                <div class="txt__tile">Ask QA</div>
            </a>
        </div>
        <div class="item_link">
            <a href="#" class="btn btn_navLink">
                <div class="icon_current">
                    <i class="tio-book_outlined"></i>
                </div>
                <div class="icon_active">
                    <i class="tio-book_outlined" style="color: var(--bg-primary);"></i>
                </div>
                <div class="txt__tile">Notes</div>
            </a>
        </div>
    </div>
</footer>
<!-- End. em_main_footer -->

<!-- Modal Content -->
<div class="modal transition-bottom screenFull defaultModal mdlladd__rate fade" id="create_modal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0 p-2 justify-content-center">
                <!-- header -->
            </div>
            <div class="modal-body px-0">
                <div class="em__pkLink">
                    <ul class="nav__list mb-0">
                        <li>
                            <a href="{{ url('upload-qustion') }}" class="item-link">
                                <div class="group">
                                    <div class="icon bg-secondary">
                                        <i class="tio-file_add_outlined"></i>
                                    </div>
                                    <span class="path__name">Upload Exam By Excel</span>
                                </div>
                                <div class="group">
                                    <span class="short__name"></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('create-exam') }}" class="item-link">
                                <div class="group">
                                    <div class="icon bg-secondary">
                                        <i class="tio-pen"></i>
                                    </div>
                                    <span class="path__name">Create Exam</span>
                                </div>
                                <div class="group">
                                    <span class="short__name"></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item-link">
                                <div class="group">
                                    <div class="icon bg-secondary">
                                        <i class="tio-pen"></i>
                                    </div>
                                    <span class="path__name">Ask Question</span>
                                </div>
                                <div class="group">
                                    <span class="short__name"></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item-link">
                                <div class="group">
                                    <div class="icon bg-secondary">
                                        <i class="tio-upload_on_cloud"></i>
                                    </div>
                                    <span class="path__name">Upload Notes</span>
                                </div>
                                <div class="group">
                                    <span class="short__name"></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
