@section('title', $quiz->test_name)
@section('description', $quiz->test_name)
@section('keywords', $quiz->test_name)
@section('css')
    <style>
        :root {
            --primary-color: #0d6efd;
            --text-dark: #1a1a1a;
            --text-muted: #6c757d;
            --card-radius: 20px;
            --btn-radius: 12px;
        }

        @media (max-width: 576px) {
            .quiz-card {
                max-width: 550px;
            }
        }


        .quiz-card {
            max-width: 100%;
            width: 100%;
            border-radius: var(--card-radius);
        }

        .quiz-title {
            color: #0066ff;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.4;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .stat-label {
            font-size: 0.95rem;
        }

        .stat-value {
            font-size: 1.1rem;
        }

        .btn-start {
            background: #ff3f3f;
            border: none;
            border-radius: var(--btn-radius);
            font-size: 1.25rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px #ff3f3f !important;
            background: #ff3f3f;
        }

        .btn-start:active {
            transform: translateY(0);
        }

        .share-section .btn-share {
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: none;
            transition: opacity 0.2s;
        }

        .share-section .btn-share:hover {
            opacity: 0.9;
            color: white;
        }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-x {
            background-color: #000000;
        }

        .btn-email {
            background-color: #7d7d7d;
        }

        .btn-whatsapp {
            background-color: #25d366;
        }

        .btn-sms {
            background-color: #ffb800;
        }

        .btn-generic {
            background-color: #8bc34a;
        }

        @media (max-width: 576px) {
            .quiz-title {
                font-size: 1.25rem;
            }

            .card-body {
                padding: 1.5rem !important;
            }
        }
    </style>
@endsection
@extends('layouts.master')
@section('content')

    <section class="bg-light emPage__public padding-t-70 p-2 pt-5 mt-5">
        <div class="quiz-card card border-0 shadow-sm overflow-hidden">
            <div class="card-body p-2 p-md-0">
                <!-- Title Section -->
                <h1 class="quiz-title mb-4">
                    {{ $quiz->test_name }}
                </h1>

                @php
                    $questions = DB::table('free_test_question')->where('test_id', $quiz->id)->count();
                    $totalQuestions = $questions;
                    $timePerQuestionSeconds = 60;

                    $totalTimeMinutes = ceil(($totalQuestions * $timePerQuestionSeconds) / 60);
                @endphp

                <!-- Stats Section -->
                {{-- <div class="quiz-stats mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-primary-subtle rounded-circle me-3" style="color: #ff3f3f !important;">
                            <i class="bi bi-patch-question-fill"></i>
                        </div>
                        @php
                            $questions = DB::table('free_test_question')->where('test_id', $quiz->id)->count();
                            $totalQuestions = $questions;
                            $timePerQuestionSeconds = 60;

                            $totalTimeMinutes = ceil(($totalQuestions * $timePerQuestionSeconds) / 60);
                        @endphp
                        <div class="stat-info d-flex justify-content-between flex-grow-1 align-items-center">
                            <span class="stat-label text-muted fw-medium">Total Questions</span>
                            <span class="stat-value fw-bold text-dark">: {{ $totalQuestions }} ques</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-info-subtle rounded-circle me-3" style="color: #ff3f3f !important;">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div class="stat-info d-flex justify-content-between flex-grow-1 align-items-center">
                            <span class="stat-label text-muted fw-medium">Time</span>
                            <span class="stat-value fw-bold text-dark">: {{ $totalTimeMinutes }} mins</span>
                        </div>
                    </div>
                </div> --}}
                <div class="quiz-stats mb-4">

                    {{-- Total Questions --}}
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-danger-subtle rounded-circle me-3">
                            <i class="bi bi-patch-question-fill text-danger"></i>
                        </div>
                        <div class="stat-info d-flex justify-content-between flex-grow-1">
                            <span class="text-muted fw-medium">Total Questions</span>
                            <span class="fw-bold">{{ $totalQuestions }}</span>
                        </div>
                    </div>

                    {{-- Time --}}
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon bg-info-subtle rounded-circle me-3">
                            <i class="bi bi-clock-fill text-info"></i>
                        </div>
                        <div class="stat-info d-flex justify-content-between flex-grow-1">
                            <span class="text-muted fw-medium">Time</span>
                            <span class="fw-bold">{{ $totalTimeMinutes }} mins</span>
                        </div>
                    </div>

                    {{-- Gems --}}
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning-subtle rounded-circle me-3">
                            <i class="bi bi-gem text-warning"></i>
                        </div>
                        <div class="stat-info flex-grow-1">
                            <div class="d-flex justify-content-between">
                                <span class="fw-medium">Gem Contribution</span>
                                <span class="fw-bold text-warning">
                                    -{{ $quiz->number_of_token }} Gems
                                </span>
                            </div>
                            <small class="text-muted">
                                Gems will be deducted before starting the exam
                            </small>
                        </div>
                    </div>

                </div>

                <!-- Start Button -->
                <button class="btn btn-primary btn-start w-100 py-3 fw-bold mb-4 shadow-sm" id="start_btn">
                    Start Quiz
                </button>

                <!-- Social Share Section -->
                <div class="sharethis-inline-share-buttons">
                    {{-- <div class="row g-2">
                        <div class="col">
                            <button class="btn btn-share btn-facebook w-100" title="Facebook">
                                <i class="bi bi-facebook"></i>
                                
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-share btn-x w-100" title="X">
                                <i class="bi bi-twitter-x"></i>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-share btn-email w-100" title="Email">
                                <i class="bi bi-envelope-fill"></i>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-share btn-whatsapp w-100" title="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-share btn-sms w-100" title="SMS">
                                <i class="bi bi-chat-dots-fill"></i>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-share btn-generic w-100" title="Share">
                                <i class="bi bi-share-fill"></i>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="bg-white padding-20 emBlock__border">
            <h2 class="size-16 weight-800 text-primary margin-b-10">{{ $quiz->name }}</h2>
            <table style="width: 100%">
                <tr>
                    <th style="width: 50%;">Total Questions</th>
                    <th>:</th>
                    <th>{{ $quiz->noq }}</th>
                </tr>
                <tr>
                    <th>Time</th>
                    <th>:</th>
                    <th><i class="tio-alarm"></i> {{ $quiz->noq }} mins</th>
                </tr>
            </table>
            <button id="start_btn" class="btn btn-primary btn-block margin-t-20">Start</button>
        </div> --}}

        {{-- <div class="sharethis-inline-share-buttons"></div> <br><br> --}}

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <!-- Question Topics -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3729413945402608" data-ad-slot="2707465216"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>


    </section>
@endsection

@section('script')
    <script>
        var start_count = 5;
        $(document).ready(function() {
            $("#start_btn").click(function() {

                @if (auth()->check())
                    @unless (auth()->user()->my_tokens >= $quiz->number_of_token)
                        alert("You don't have enough gems to start this quiz");
                        window.location.href = "{{ url('/profile') }}";
                        return false;
                    @endunless
                @else
                    alert("You don't have enough gems to start this quiz.You can login to get free gems.");
                    window.location.href = "{{ url('/login') }}";
                    return false;
                @endif

                start_in();
            });
        });

        function start_in() {
            $("#start_btn").html("Start in " + start_count + " Sec");
            if (start_count > 0) {
                start_count--;
                setTimeout(start_in, 1000);
            } else {
                $("#start_btn").html("Let's Go");
                window.location.href = "{{ url('quiz_start') }}/{{ $type }}/{{ $quiz->id }}";
            }
        }
    </script>
@endsection
