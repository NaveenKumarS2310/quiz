@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')
@section('css')
    <style>
        .welcome {
            position: relative;
            margin-bottom: 20px;
        }

        .greeting {
            color: #888;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            color: #222;
        }

        .coins {
            position: absolute;
            top: 0;
            right: 0;
            background: #FFF3E0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        /* Quizzes Section */
        .quizzes-section {
            margin-bottom: 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .see-all {
            color: #FF6B6B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

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
            border-left: 4px solid #FF6B6B;
        }

        .quiz-content {
            flex: 1;
        }

        .quiz-tags {
            display: flex;
            gap: 6px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .tag {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .tag-new {
            background: #E8F5E9;
            color: #4CAF50;
        }

        .tag-easy {
            background: #E8F5E9;
            color: #4CAF50;
        }

        .tag-medium {
            background: #FFF3E0;
            color: #FF9800;
        }

        .tag-hard {
            background: #FFEBEE;
            color: #F44336;
        }

        .tag-category {
            background: #F5F5F5;
            color: #666;
        }

        .quiz-title {
            font-size: 15px;
            font-weight: 600;
            color: #222;
            margin-bottom: 8px;
        }

        .quiz-meta {
            display: flex;
            gap: 16px;
            font-size: 12px;
            color: #888;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .play-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FF6B6B, #FF8787);
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        /* Community Banner */
        .community-banner {
            background: linear-gradient(135deg, #4FC3F7, #29B6F6);
            padding: 20px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(41, 182, 246, 0.3);
        }

        .banner-icon {
            font-size: 28px;
        }

        .banner-content {
            flex: 1;
        }

        .banner-content h3 {
            color: white;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .banner-content p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
        }

        .join-btn {
            background: white;
            color: #29B6F6;
            border: none;
            padding: 10px 24px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
@endsection
@extends('layouts.master')
@section('content')
    <section class="emPage__public padding-t-70">

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid"
            data-ad-client="ca-pub-3729413945402608" data-ad-slot="3898015154"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>


        <!-- Start title -->
        <div class="emTitle_co padding-5 padding-l-20">
            <h5 class=" weight-500 color-primary mb-2">
                {{ $quiz_category->category_name }}
            </h5>
        </div>
        <!-- End. title -->



        <!-- Start em__pkLink -->
        {{-- <div class="em__pkLink">
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
        </div> --}}
        <div class="quiz-list padding-l-10 padding-r-10">
            <!-- Quiz Item 1 -->
            @foreach ($category_quiz as $cq)
                <a class="text-decoration-none" href="{{ url('quiz') }}/{{ $type }}/{{ $cq->id }}">
                    <div class="quiz-item">
                        <div class="quiz-content">
                            <h4 class="quiz-title">{{ $cq->test_name }}</h4>
                            @php
                                $questions = DB::table('free_test_question')->where('test_id', $cq->id)->count();
                                $totalQuestions = $questions;
                                $timePerQuestionSeconds = 60;

                                $totalTimeMinutes = ceil(($totalQuestions * $timePerQuestionSeconds) / 60);
                            @endphp
                            <div class="quiz-meta d-flex justify-content-around">
                                <span class="meta-item text-warning"><i class="bi bi-clock"></i> {{ $totalTimeMinutes }}
                                    Mins</span>
                                <span class="meta-item text-danger"><i class="bi bi-question-circle"></i>
                                    {{ $totalQuestions }}
                                    Qs</span>
                                <span class="meta-item text-primary"><i class="bi bi-gem"></i>
                                    {{ $cq->number_of_token }}</span>
                            </div>
                        </div>
                        <button class="play-btn">▶</button>
                    </div>
                </a>
            @endforeach
        </div>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
            data-ad-format="fluid" data-ad-client="ca-pub-3729413945402608" data-ad-slot="3898015154"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!-- End. em__pkLink  -->
    </section>
@endsection
