@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')
@section('css')
<style>
    .quiz-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .quiz-item {
        background: white;
        padding: 16px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        border-left: 4px solid #ff6b6b;
    }
    .quiz-content {
        flex: 1;
    }
    .quiz-title {
        font-size: 15px;
        font-weight: 600;
        color: #222;
        margin-bottom: 8px;
    }
    .play-btn {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #ff6b6b, #ff8787);
        color: white;
        border: none;
        font-size: 16px;
        cursor: pointer;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }
    .play-btn-1 {
        width: 50%;
        height: 48px;
        border-radius: 5px;
        background: linear-gradient(135deg, #ff6b6b, #ff8787);
        color: white;
        border: none;
        font-size: 18px;
        cursor: pointer;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
    }
</style>
@stop
@extends('layouts.master')
@section('content')
    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h5 class=" weight-500 color-primary mb-2 text-center">Top Categories</h5>
        </div>
        <!-- End. title -->

        <!-- Start em__pkLink -->
        <div class="em__pkLink">
            <!-- Card -->
            <div class="card card-sm m-2 p-2">

                <img class="card-img-top" src="{{ url('/') }}/theme/admin-assets/images/politics.jpg"
                    alt="Card image cap">
                <div class="card-body ">
                    <div class="d-flex align-items-center justify-content-center">
                        <h4 class="card-title mb-0 text-success">Political Science</h4>
                    
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between my-3">
                        <div class="h6">Total No Test</div>
                        <div class="text-danger">100</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between my-3">
                        <div class="h6">Total Quiz</div>
                        <div class="text-danger">100</div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-3">
                        <button class="play-btn-1">▶ &nbsp;view</button>
                        
                    </div>
                </div>
            </div>
            <!-- End Card -->
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
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
            data-ad-format="fluid" data-ad-client="ca-pub-3729413945402608" data-ad-slot="7740825735"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>


        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h5 class="weight-500 color-primary mb-2">Latest Quiz</h5>
        </div>
        <!-- End. title -->

        <!-- Start em__pkLink -->
        {{-- <div class="em__pkLink">
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
        </div> --}}
        <div class="quiz-list padding-l-10 padding-r-10">
            <!-- Quiz Item 1 -->
            @foreach ($latest_quiz as $lq)
            <a href="{{ url('quiz') }}/{{ $lq->slug }}">
                <div class="quiz-item">

                    <div class="quiz-content">

                        <h4 class="quiz-title">{{ $lq->name }}</h4>
                        {{-- <div class="quiz-meta">
                            <span class="meta-item">⏱️ {{ $lq->noq }} Qs</span>
                            <span class="meta-item">⏰ {{ $lq->noq }}mins</span>
                        </div> --}}
                    </div>
                    <button class="play-btn">▶</button>
                </div>
            </a>
            @endforeach
        </div>
        <!-- End. em__pkLink  -->
    </section>
@endsection
