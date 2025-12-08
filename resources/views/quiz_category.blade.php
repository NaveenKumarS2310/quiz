@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')

@extends('layouts.master')
@section('content')
    <section class="emPage__public padding-t-70">
        
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
        

        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h2 class="size-16 weight-500 color-primary mb-1">
                {{ $quiz_category->category_name }}
            </h2>
        </div>
        <!-- End. title -->
        
        

        <!-- Start em__pkLink -->
        <div class="em__pkLink">
            <ul class="nav__list with_border fullBorder mb-0">
                @foreach ($category_quiz as $cq)
                    <li>
                        <a href="{{ url('quiz') }}/{{ $cq->slug }}" class="item-link">
                            <div class="group">
                                <span class="path__name">{{ $cq->name }}</span>
                            </div>
                            <div class="group">
                                <i class="tio-chevron_right -arrwo"></i>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
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
        <!-- End. em__pkLink  -->
    </section>
@endsection
