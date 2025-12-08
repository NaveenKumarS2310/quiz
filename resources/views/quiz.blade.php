@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')

@extends('layouts.master')
@section('content')
    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h2 class="size-16 weight-500 color-primary mb-1">Top Categories</h2>
        </div>
        <!-- End. title -->

        <!-- Start em__pkLink -->
        <div class="em__pkLink">
            <ul class="nav__list with_border fullBorder mb-0">
                @foreach ($quiz_categories as $qc)
                    <li>
                        <a href="{{ url('quiz_category') }}/{{ $qc->category_name }}" class="item-link">
                            <div class="group">
                                <span class="path__name">{{ $qc->category_name }}</span>
                            </div>
                            <div class="group">
                                <i class="tio-chevron_right -arrwo"></i>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- End. em__pkLink  -->
        <br>
        <br>
        
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
             crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
             style="display:block; text-align:center;"
             data-ad-layout="in-article"
             data-ad-format="fluid"
             data-ad-client="ca-pub-3729413945402608"
             data-ad-slot="7740825735"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
        
        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h2 class="size-16 weight-500 color-primary mb-1">Latest Quiz</h2>
        </div>
        <!-- End. title -->

        <!-- Start em__pkLink -->
        <div class="em__pkLink">
            <ul class="nav__list with_border fullBorder mb-0">
                @foreach ($latest_quiz as $lq)
                    <li>
                        <a href="{{ url('quiz') }}/{{ $lq->slug }}" class="item-link">
                            <div class="group">
                                <span class="path__name">{{ $lq->name }}</span>
                            </div>
                            <div class="group">
                                <i class="tio-chevron_right -arrwo"></i>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- End. em__pkLink  -->
    </section>
@endsection
