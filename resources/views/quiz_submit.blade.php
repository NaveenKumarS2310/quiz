@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)
@section('css')
   
@endsection
@extends('layouts.master')
@section('content')

   
    <style>
        :root {
            --primary-color: #ef5350;
            --success-color: #4caf50;
            --error-color: #f44336;
            --text-primary: #1a1a1a;
            --text-secondary: #666666;
            --text-muted: #999999;
            --bg-light: #fafafa;
            --bg-white: #ffffff;
            --border-light: #e8e8e8;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        /* Header Styles */
        h1 {
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        h3 {
            font-weight: 700;
            letter-spacing: -0.2px;
        }

        /* Question Section */
        .question-section {
            background: var(--bg-white);
            border-radius: 12px;
            padding: 20px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-light);
            transition: all 0.2s ease;
        }

        .question-section:hover {
            box-shadow: var(--shadow-md);
        }

        .question-header {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 20px;
        }

        .question-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #f44336 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 18px;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.2);
        }

        .question-title {
            font-size: 18px;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .question-meta {
            font-size: 12px;
            color: var(--text-muted);
            margin: 0;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Options Container */
        .options-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            border: 1.5px solid var(--border-light);
            border-radius: 10px;
            background: var(--bg-white);
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .option-item:hover {
            border-color: var(--text-secondary);
            background: #fafafa;
        }

        /* Correct Option */
        .option-item.option-correct {
            border-color: var(--success-color);
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.08) 0%, rgba(76, 175, 80, 0.04) 100%);
        }

        .option-item.option-correct:hover {
            border-color: var(--success-color);
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.12) 0%, rgba(76, 175, 80, 0.08) 100%);
        }

        /* Incorrect Option */
        .option-item.option-incorrect {
            border-color: var(--error-color);
            background: linear-gradient(135deg, rgba(244, 67, 54, 0.08) 0%, rgba(244, 67, 54, 0.04) 100%);
        }

        .option-item.option-incorrect:hover {
            border-color: var(--error-color);
            background: linear-gradient(135deg, rgba(244, 67, 54, 0.12) 0%, rgba(244, 67, 54, 0.08) 100%);
        }

        /* Option Indicator */
        .option-indicator {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
        }

        .option-label {
            width: 32px;
            height: 32px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--text-primary);
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .option-item.option-correct .option-label {
            background: var(--success-color);
            color: white;
        }

        .option-item.option-incorrect .option-label {
            background: var(--error-color);
            color: white;
        }

        .option-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .option-item.option-correct .option-icon {
            color: var(--success-color);
        }

        .option-item.option-incorrect .option-icon {
            color: var(--error-color);
        }

        /* Option Content */
        .option-content {
            flex-grow: 1;
        }

        .option-text {
            margin: 0;
            font-size: 15px;
            font-weight: 500;
            color: var(--text-primary);
        }

        /* Status Badges */
        .status-badge {
            display: inline-block;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            margin-top: 8px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .correct-badge {
            background: rgba(76, 175, 80, 0.15);
            color: var(--success-color);
        }

        .incorrect-badge {
            background: rgba(244, 67, 54, 0.15);
            color: var(--error-color);
        }

        /* Buttons */
        .btn {
            font-weight: 600;
            font-size: 14px;
            padding: 12px 24px;
            border-radius: 10px;
            transition: all 0.2s ease;
            border: none;
            letter-spacing: -0.2px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, #f44336 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(239, 83, 80, 0.35);
            color: white;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-outline-secondary {
            color: var(--text-secondary);
            border: 1.5px solid var(--border-light);
            background: var(--bg-white);
        }

        .btn-outline-secondary:hover {
            border-color: var(--text-primary);
            color: var(--text-primary);
            background: #fafafa;
        }

        /* Gradient Background */
        .bg-gradient-light {
            background: linear-gradient(135deg, var(--bg-light) 0%, #f5f5f5 100%);
        }

        /* Utility Classes */
        .flex-grow-1 {
            flex-grow: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .question-section {
                padding: 16px;
            }

            .question-header {
                gap: 12px;
            }

            .option-item {
                padding: 12px 14px;
            }

            .btn {
                padding: 10px 18px;
                font-size: 13px;
            }
        }
    </style>

    <section class="emPage__public padding-t-70">


        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block" data-ad-format="fluid" data-ad-layout-key="-6t+ed+2i-1n-4w"
            data-ad-client="ca-pub-3729413945402608" data-ad-slot="6279826753"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

        <header class="p-3">
            <h1 class="display-6 fw-bold mb-4 tracking-tight">Answer Review</h1>
            <p class="text-muted lead mb-0">Detailed breakdown of your performance. Correct answers are highlighted in
                <span class="text-success fw-semibold">green</span>.
            </p>
        </header>
        {{-- <div class="review-list d-grid gap-5">
            <section class="question-block">
                <div class="d-flex align-items-start gap-4 pb-4 border-bottom">
                    <span class="question-index fw-bold fs-4">01.</span>
                    <div class="flex-grow-1">
                        <h2 class="h4 fw-semibold mb-4 leading-snug">Opening Bowler</h2>

                        <div class="options-grid d-grid gap-3">
                            <div class="option-item d-flex align-items-center p-3 rounded-3 border bg-light opacity-75">
                                <span class="option-letter fw-bold me-3">A.</span>
                                <span class="option-text">Jasprit Bumrah</span>
                            </div>
                            <div class="option-item d-flex align-items-center p-3 rounded-3 border bg-light opacity-75">
                                <span class="option-letter fw-bold me-3">B.</span>
                                <span class="option-text">Arshdeep</span>
                            </div>
                            <div class="option-item d-flex align-items-center p-3 rounded-3 border bg-light opacity-75">
                                <span class="option-letter fw-bold me-3">C.</span>
                                <span class="option-text">Varun CV</span>
                            </div>
                            <div
                                class="option-item d-flex align-items-center p-3 rounded-3 border border-success bg-success-subtle text-success">
                                <span class="option-letter fw-bold me-3">D.</span>
                                <span class="option-text fw-bold">Hardik Pandya</span>
                                <i class="bi bi-check-circle-fill ms-auto"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> --}}
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Question 1 -->
                @php $qust_no = 1; @endphp
                @foreach ($qustions as $qustion)
                    <div class="question-section mb-4">
                        <div class="question-header">
                            <div class="question-number">
                                <span>{{ $qust_no++ }}</span>
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="question-title mb-0">{{ $qustion->qustion }}</h3>
                                {{-- <p class="question-meta">Multiple Choice</p> --}}
                            </div>
                        </div>

                        <!-- Options -->
                        <div class="options-container">

                            @php
                                $options = [
                                    1 => $qustion->option1,
                                    2 => $qustion->option2,
                                    3 => $qustion->option3,
                                    4 => $qustion->option4,
                                ];

                                $labels = ['A', 'B', 'C', 'D'];
                                $userAnswer = $answer_list[$qustion->id] ?? null;
                            @endphp

                            @foreach ($options as $key => $value)
                                @php
                                    $isCorrect = $qustion->answer == $key;
                                    $isUserAnswer = $userAnswer == $key;
                                    $isWrong = $isUserAnswer && !$isCorrect;
                                @endphp

                                <div
                                    class="option-item 
                                        {{ $isCorrect ? 'option-correct' : '' }}
                                        {{ $isWrong ? 'option-incorrect' : '' }}
                                    ">

                                    <div class="option-indicator">
                                        <span class="option-label">{{ $labels[$key - 1] }}</span>

                                        {{-- Icons --}}
                                        @if ($isCorrect)
                                            <span class="option-icon">
                                                <i class="bi bi-check-circle-fill"></i>
                                            </span>
                                        @elseif($isWrong)
                                            <span class="option-icon">
                                                <i class="bi bi-x-circle-fill"></i>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="option-content">
                                        <p class="option-text">{{ $value }}</p>

                                        {{-- ✅ Always show Correct Answer --}}
                                        @if ($isCorrect)
                                            <span class="status-badge correct-badge">
                                                Correct Answer
                                            </span>
                                        @endif

                                        {{-- ❌ Show Your Answer only if wrong --}}
                                        @if ($isWrong)
                                            <span class="status-badge incorrect-badge">
                                                Your Answer
                                            </span>
                                        @endif

                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach


            </div>
        </div>

        {{-- @php $qust_no = 1; @endphp
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
                                <span
                                    class="path__name
                                    @if ($qustion->answer == 1) text-green @endif
                                    @if ($answer_list[$qustion->id] == 1 && $qustion->answer != 1) text-red @endif
                                ">A.
                                    {{ $qustion->option1 }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span
                                    class="path__name
                                    @if ($qustion->answer == 2) text-green @endif
                                    @if ($answer_list[$qustion->id] == 2 && $qustion->answer != 2) text-red @endif
                                ">B.
                                    {{ $qustion->option2 }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span
                                    class="path__name
                                    @if ($qustion->answer == 3) text-green @endif
                                    @if ($answer_list[$qustion->id] == 3 && $qustion->answer != 3) text-red @endif
                                ">C.
                                    {{ $qustion->option3 }}</span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item-link hoverNone">
                            <div class="group">
                                <span
                                    class="path__name
                                    @if ($qustion->answer == 4) option-item  text-success option-text fw-bold <i class='bi bi-check-circle-fill me-5'></i> @endif
                                    @if ($answer_list[$qustion->id] == 4 && $qustion->answer != 4) text-red @endif
                                ">D.
                                    {{ $qustion->option4 }}</span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        @endforeach --}}

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
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
            data-ad-format="fluid" data-ad-client="ca-pub-3729413945402608" data-ad-slot="2366577106"></ins>
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
    