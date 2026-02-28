@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)

@extends('layouts.master')
@section('css')
    

    <style>
        .text-green {
            color: rgb(0, 112, 0) !important;
            font-weight: 800;
        }

        .text-red {
            color: rgb(189, 5, 5) !important;
            font-weight: 800;
        }
    </style>
    <style>
        :root {
            --primary: #2563eb;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --card-bg: #ffffff;

        }



        .results-card {
            max-width: 800px;
            width: 100%;
            background: var(--card-bg);
            border-radius: 2rem;
        }

        .status-bar {
            height: 8px;
        }

        .quiz-title {
            font-family: var(--font-serif);
            font-size: 1.75rem;
            line-height: 1.3;
            color: #0f172a;
            max-width: 600px;
            margin: 0 auto;
        }

        .score-circle {
            width: 200px;
        }

        .circular-chart {
            display: block;
            margin: 10px auto;
            max-width: 100%;
        }

        .circle-bg {
            fill: none;
            stroke: #f1f5f9;
            stroke-width: 2.8;
        }

        .circle {
            fill: none;
            stroke-width: 2.8;
            stroke-linecap: round;
            animation: progress 1s ease-out forwards;
        }

        .circular-chart.danger .circle {
            stroke: var(--danger);
        }

        .percentage {
            fill: #0f172a;
            font-family: "Inter", sans-serif;
            font-size: 0.5rem;
            font-weight: 700;
            text-anchor: middle;
        }

        .score-label {
            fill: #64748b;
            font-size: 0.25rem;
            text-anchor: middle;
            text-transform: uppercase;
            letter-spacing: 0.05rem;
        }

        @keyframes progress {
            0% {
                stroke-dasharray: 0 100;
            }
        }

        .stat-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: var(--primary) !important;
        }

        .stat-icon-1 {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.25rem;
            background-color: #cfe2ff;
        }
        .stat-icon-2 {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.25rem;
            background-color: #d1e7dd;
        }
        .stat-icon-3 {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.25rem;
            background-color: #fff3cd;
        }
        .stat-icon-4 {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 1.25rem;
            background-color: #f8d7da;
        }

        .stat-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #64748b;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
        }

        .view-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            transition: transform 0.2s;
        }

        .view-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
        }

        @media (max-width: 768px) {
            .quiz-title {
                font-size: 1.5rem;
            }
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
            text-decoration: none !important;
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
            text-decoration: none !important;
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
@section('content')



    <section class="bg-light emPage__public padding-t-70 p-2 pt-5 mt-5">
        <?php
        $currect_answer = 0;
        $not_answered = 0;
        ?>
        @foreach ($qustions as $qustion)
            <?php
            if ($answer_list[$qustion->id] != null && $qustion->answer == $answer_list[$qustion->id]) {
                $currect_answer++;
                // dd('ddfd');
            }
            if ($answer_list[$qustion->id] == null) {
                $not_answered++;
            }
            ?>
        @endforeach



        <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608" -->
                               <!--      crossorigin="anonymous"></script>-->
        <!-- <ins class="adsbygoogle"-->
        <!--      style="display:block; text-align:center;"-->
        <!--      data-ad-layout="in-article"-->
        <!--      data-ad-format="fluid"-->
        <!--      data-ad-client="ca-pub-3729413945402608"-->
        <!--      data-ad-slot="6200227944"></ins>-->
        <!-- <script>
            -- >
            <
            !--(adsbygoogle = window.adsbygoogle || []).push({});
            -- >
            <
            !--
        </script>-->


        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <!-- Questionresult1 -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3729413945402608" data-ad-slot="9932979428"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>


        {{-- <div class="card">
            <div class="card-body">
                <h5 class="text-primary">{{ $quiz->name }}</h5>
                <br>
                <div class="row">
                    <div class="col-8">
                        <label>Total Questions</label>
                    </div>
                    <div class="col-4">
                        <label>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ count($qustions) }}</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <label>Correct Answer</label>
                    </div>
                    <div class="col-4">
                        <label>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $currect_answer }}</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <label>Not Answered</label>
                    </div>
                    <div class="col-4">
                        <label>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $not_answered }}</label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <label>Wrong Answers</label>
                    </div>
                    <div class="col-4">
                        <label>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ count($qustions) - $currect_answer - $not_answered }}</label>
                    </div>
                </div>
                <br>
                <div style="text-align: center;">

                <a href="{{ url('quiz_submit') }}" class="btn btn-success">
                    View Answers
                </a>
                </div>
            </div>
        </div> --}}
        <div class="results-card card border-0 ">
            {{-- <!-- Top Decorative Bar -->
            <!-- <div class="status-bar d-flex">
              <div class="bg-success flex-grow-1" style="width: 7%;"></div>
              <div class="bg-danger flex-grow-1" style="width: 93%;"></div>
            </div> --> --}}

            <div class="card-body p-4 p-md-5">
                <!-- Title Section -->
                <header class="text-center mb-5">
                    <h1 class="quiz-title mb-3">
                        {{ $quiz->name }}
                    </h1>
                    <div class="badge bg-light text-muted border px-3 py-2 rounded-pill fw-medium">
                        Daily Quiz Completed
                    </div>
                </header>



                <!-- Stats Grid -->
                <div class="stats-grid row g-3 mb-5">
                    <div class="col-6 col-md-3 mb-3">
                        <div class="stat-item p-3 rounded-5 bg-white border h-100 transition-hover">
                            <div class="stat-icon-1 bg-primary-subtle text-primary mb-2">
                                <i class="bi bi-list-task"></i>
                            </div>
                            <div class="stat-label">Total</div>
                            <div class="stat-value">{{ count($qustions) }}</div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <div class="stat-item p-3 rounded-4 bg-white border h-100 transition-hover">
                            <div class="stat-icon-2 bg-success-subtle text-success mb-2">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="stat-label">Correct</div>
                            <div class="stat-value">{{ $currect_answer }}</div>
                        </div>
                    </div>
                    {{-- <div class="col-6 col-md-3">
                        <div class="stat-item p-3 rounded-4 bg-white border h-100 transition-hover">
                            <div class="stat-icon-3 bg-warning-subtle text-warning mb-2">
                                <i class="bi bi-dash-circle-fill"></i>
                            </div>
                            <div class="stat-label">Skipped</div>
                            <div class="stat-value">{{ $not_answered }}</div>
                        </div>
                    </div> --}}
                    <div class="col-6 col-md-3">
                        <div class="stat-item p-3 rounded-4 bg-white border h-100 transition-hover">
                            <div class="stat-icon-4 bg-danger-subtle text-danger mb-2">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <div class="stat-label">Wrong</div>
                            <div class="stat-value">{{ count($qustions) - $currect_answer - $not_answered }}</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                    <a href="{{ url('quiz_submit') }}"
                        class="btn btn-success btn-md px-3 py-3 fw-bold rounded-pill shadow-sm view-btn">
                        <i class="bi bi-eye-fill me-2"></i> View Answers
                    </a>

                </div>
            </div>
        </div>

        <br>
        <br>


        <div class="em_swiper_products emCoureses__grid margin-b-20">
            <div class="em_bodyCarousel p-2">
                <div class="em_itemCourse_grid w-100">
                    <a href="https://t.me/quizunivers">
                        <div class="community-banner">
                            <div class="banner-icon"><i class="bi bi-telegram"></i></div>
                            <div class="banner-content">
                                <h3 class="text-decoration-none">Join Our Community</h3>
                                <p>Daily updates & exclusive quizzes</p>
                            </div>
                            <button class="join-btn">Join</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <!-- Questionresult2 -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3729413945402608" data-ad-slot="6521014309"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

        <br>
        <br>

    </section>
@endsection

@section('script')

@endsection
