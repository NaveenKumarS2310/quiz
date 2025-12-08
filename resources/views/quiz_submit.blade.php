@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)

@extends('layouts.master')
@section('content')

    <style>
        .text-green
        {
            color: rgb(0, 112, 0) !important;
            font-weight: 800;
        }
        .text-red
        {
            color: rgb(189, 5, 5) !important;
            font-weight: 800;
        }
    </style>

    <section class="emPage__public padding-t-70">
        
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
             crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="fluid"
             data-ad-layout-key="-6t+ed+2i-1n-4w"
             data-ad-client="ca-pub-3729413945402608"
             data-ad-slot="6279826753"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
                
        
        
        @php $qust_no = 1; @endphp
        @foreach ($qustions as $qustion)
            <!-- Start title -->
            <div class="emTitle_co padding-20">
                <h2 class="size-16 weight-500 color-secondary mb-1">{{ $qust_no++ }} . {{ $qustion->qustion }}</h2>
            </div>
            <!-- End. title -->

            <div class="em__pkLink">
                <ul class="nav__list with_border fullBorder mb-0">
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span class="path__name
                                    @if ($qustion->answer == 1) text-green @endif
                                    @if ($answer_list[$qustion->id] == 1 && $qustion->answer != 1) text-red @endif
                                ">A. {{ $qustion->option1 }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span class="path__name
                                    @if ($qustion->answer == 2) text-green @endif
                                    @if ($answer_list[$qustion->id] == 2 && $qustion->answer != 2) text-red @endif
                                ">B. {{ $qustion->option2 }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span class="path__name
                                    @if ($qustion->answer == 3) text-green @endif
                                    @if ($answer_list[$qustion->id] == 3 && $qustion->answer != 3) text-red @endif
                                ">C. {{ $qustion->option3 }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span class="path__name
                                    @if ($qustion->answer == 4) text-green @endif
                                    @if ($answer_list[$qustion->id] == 4 && $qustion->answer != 4) text-red @endif
                                ">D. {{ $qustion->option4 }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach
        
        <br>
        <br>
        
        
         <div class="em_swiper_products emCoureses__grid margin-b-20">
            <div class="em_bodyCarousel padding-l-20 padding-r-20">
                <div class="em_itemCourse_grid w-100">
                    <a href="https://t.me/quizunivers" class="card">
                        <div class="card-body" style="text-align: center;">
                            <h5 class="size-17">
                                For Daily Updates Join our Telegram Group
                            </h5>
                            <center>
                                <button type="button" class="btn btn_default margin-t-20">
                                    <div class="icon">
                                        <i class="tio-link" style="color: #fff;"></i>
                                    </div>
                                    <span>Join our Telegram Group</span>
                                </button>
                            </center>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
             crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
             style="display:block; text-align:center;"
             data-ad-layout="in-article"
             data-ad-format="fluid"
             data-ad-client="ca-pub-3729413945402608"
             data-ad-slot="2366577106"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
       
        
        <br>
        <br>
        <br>

    </section>
@endsection

@section('script')

@endsection
