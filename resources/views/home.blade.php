@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')

@extends('layouts.master')
@section('content')
    <section class="emPage__public padding-t-70">

        <!-- Start em_swiper_products -->
        
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
             data-ad-slot="3898015154"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

        
        <!-- End. em_swiper_products -->
        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h2 class="size-16 weight-500 color-primary mb-1">Latest Quiz</h2>
        </div>
        <!-- End. title -->
       

        <!-- Start em__pkLink -->

        @foreach ($latest_quiz as $index => $lq)
        
            
            @if($index == 10 || $index == 20 || $index == 30)
            
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
                 crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="ca-pub-3729413945402608"
                     data-ad-slot="3898015154"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                
               
                 <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
                 crossorigin="anonymous"></script>
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="ca-pub-3729413945402608"
                     data-ad-slot="6200227944"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            @endif
            
            
            
            <div class="card m-2">
                <div class="card-body">
                    <a href="{{ url('quiz') }}/{{ $lq->slug }}" class="item-link">
                        <div class="group">
                            <span class="path__name">{{ $index + 1 }}. {{ $lq->name }}</span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7">
                                <label style="color: var(--bg-primary)">Number Of Qustion : {{$lq->noq}}</label>
                            </div>
                            <div class="col-5">
                                <label style="color: var(--bg-primary)">Time : <i class="tio-alarm"></i> {{$lq->noq}}mins</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" style="display: flex;">
                                    <div class="icon">
                                        <i class="tio-next_ui" style="color: #fff;"></i>
                                    </div>
                                    <span>&nbsp;&nbsp;Start Now</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
        @endforeach

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
    </section>
@endsection
