@section('title', $quiz->test_name)
@section('description', $quiz->test_name)
@section('keywords', $quiz->test_name)

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
        $correct_answer = 0;
        $not_answered = 0;
        $wrong_answer = 0;
        ?>
        @foreach ($qustions as $qustion)
            <?php
            $selectedAnswer = $answers[$qustion->id] ?? null;
            
            if ($selectedAnswer === null) {
                $not_answered++;
            } elseif ($selectedAnswer === $qustion->correct_answer) {
                $correct_answer++;
            } else {
                $wrong_answer++;
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
                        {{ $quiz->test_name }}
                    </h1>
                    <div class="badge bg-light text-muted border px-3 py-2 rounded-pill fw-medium">
                        Daily Quiz Completed
                    </div>
                </header>



                <!-- Stats Grid -->
                <div class="stats-grid row justify-content-center g-3 mb-5">
                    <div class="col-4 mb-3">
                        <div
                            class="stat-item p-2 p-md-3 rounded-4 bg-white border h-100 transition-hover text-center text-md-start">
                            <div class="stat-icon-1 bg-primary-subtle text-primary mb-2 mx-auto mx-md-0">
                                <i class="bi bi-list-task"></i>
                            </div>
                            <div class="stat-label">Total</div>
                            <div class="stat-value">{{ count($qustions) }}</div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div
                            class="stat-item p-2 p-md-3 rounded-4 bg-white border h-100 transition-hover text-center text-md-start">
                            <div class="stat-icon-2 bg-success-subtle text-success mb-2 mx-auto mx-md-0">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="stat-label">Correct</div>
                            <div class="stat-value">{{ $correct_answer }}</div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div
                            class="stat-item p-2 p-md-3 rounded-4 bg-white border h-100 transition-hover text-center text-md-start">
                            <div class="stat-icon-4 bg-danger-subtle text-danger mb-2 mx-auto mx-md-0">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <div class="stat-label">Wrong</div>
                            <div class="stat-value">{{ $wrong_answer }}</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-grid gap-3 justify-content-center"
                    @if (isset($existingResult) && $existingResult) style="display: none !important;" @endif>
                    <form action="{{ url('quiz_submit') }}" method="get" id="quiz-submit-form">
                        @csrf
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        <input type="hidden" name="type" value="{{ $type }}">
                        <input type="hidden" name="answers" value="{{ json_encode($answers) }}">
                        <button type="submit" id="submit-answers-btn"
                            class="btn btn-success btn-md px-3 py-3 fw-bold rounded-pill shadow-sm view-btn">
                            <span class="normal-state"><i class="bi bi-check-circle-fill me-2"></i> Submit your
                                answers</span>
                            <span class="loading-state d-none">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Processing...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>


        <br>
        <br>

        <!-- Ajax Answers Container -->
        <div id="ajax-answers-container" class="container-fluid mb-5"></div>


        <div class="em_swiper_products emCoureses__grid margin-b-20">
            <div class="em_bodyCarousel p-2">
                <div class="em_itemCourse_grid w-100">
                    <a class="text-decoration-none" href="https://t.me/quizunivers">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const submitForm = document.getElementById('quiz-submit-form');

            if (submitForm) {
                const triggerFetch = function(e) {
                    e.preventDefault();

                    const btn = document.getElementById('submit-answers-btn');
                    btn.querySelector('.normal-state').classList.add('d-none');
                    btn.querySelector('.loading-state').classList.remove('d-none');
                    btn.disabled = true;

                    const formData = new FormData(submitForm);
                    const queryString = new URLSearchParams(formData).toString();

                    fetch(submitForm.action + '?' + queryString, {
                            method: 'GET',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');

                            const renderedAnswers = doc.getElementById('rendered-answers-content');

                            // Also grab the styles to ensure proper rendering
                            const styles = doc.querySelectorAll('style');

                            if (renderedAnswers) {
                                const container = document.getElementById('ajax-answers-container');

                                // Append CSS from partial layout
                                styles.forEach(style => {
                                    // Basic check to prevent duplicate CSS injects
                                    if (!document.head.innerHTML.includes('question-section')) {
                                        document.head.appendChild(style.cloneNode(true));
                                    }
                                });

                                // Render answers with a nice header
                                container.innerHTML = `
                            <div class="row mb-4 animate__animated animate__fadeIn">
                                <div class="col-12 text-center">
                                    <h2 class="display-6 fw-bold">Answer Review</h2>
                                    <p class="text-muted">Detailed explanation of your performance.</p>
                                </div>
                            </div>
                            ${renderedAnswers.outerHTML}
                        `;

                                // Remove the answer form container / slide it up
                                submitForm.parentElement.style.transition =
                                    "all 0.5s ease";
                                submitForm.parentElement.style.height = "0";
                                submitForm.parentElement.style.overflow = "hidden";
                                submitForm.parentElement.style.padding = "0";
                                submitForm.parentElement.style.margin = "0";
                                submitForm.parentElement.style.opacity = "0";

                                setTimeout(() => {
                                    submitForm.parentElement.remove();
                                }, 500);

                                // Scroll smoothly to answers
                                container.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'start'
                                });

                            } else {
                                // Fallback mechanism
                                submitForm.submit();
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching answers:', error);
                            // Fallback normal form submission on generic error
                            submitForm.submit();
                        });
                };

                submitForm.addEventListener('submit', triggerFetch);

                @if (isset($existingResult) && $existingResult)
                    // Auto-trigger if already completed previously
                    triggerFetch(new Event('submit'));
                @endif
            }
        });
    </script>
@endsection
