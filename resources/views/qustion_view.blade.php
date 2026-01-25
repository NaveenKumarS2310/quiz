@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)

@extends('layouts.master')
@section('css')
    <style>
        :root {
            --primary-color: #0066ff;
            --bg-hover: #f0f7ff;
            --border-active: #0066ff;
            --border-default: #e5e7eb;
            --card-radius: 24px;
        }

       

        .quiz-container {
            width: 100%;
            max-width: 650px;
            border-radius: var(--card-radius);
            background: white;
        }

        .question-text {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.4;
            color: #111827;
        }

        .question-number {
            opacity: 0.5;
        }

        /* Option Cards Styling */
        .option-card {
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--border-default) !important;
            background-color: transparent;
        }

        .option-card:hover {
            background-color: #f9fafb;
            border-color: #d1d5db !important;
            transform: translateX(4px);
        }

        .option-card.selected {
            background-color: var(--bg-hover);
            border-color: var(--border-active) !important;
            box-shadow: 0 4px 12px rgba(0, 102, 255, 0.08);
        }

        /* Custom Radio Styling */
        .custom-radio {
            width: 22px;
            height: 22px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            position: relative;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .selected .custom-radio {
            border-color: var(--primary-color);
            background-color: white;
        }

        .selected .custom-radio::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            background-color: var(--primary-color);
            border-radius: 50%;
        }

        .option-label {
            font-size: 1rem;
        }

        /* Timer Pulse Effect */
        .pulse {
            animation: pulse-animation 2s infinite;
        }

        @keyframes pulse-animation {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Button Styling */
        .next-btn {
            background: linear-gradient(135deg, #0066ff, #0052cc);
            border: none;
            transition: all 0.2s;
        }

        .next-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(0, 102, 255, 0.25) !important;
        }

        @media (max-width: 576px) {
            .question-text {
                font-size: 1.25rem;
            }

            .card-body {
                padding: 1.2rem !important;
            }
        }
    </style>
@endsection
@section('content')

    <section class="bg-light emPage__public padding-t-70 p-2 pt-5 mt-5">

        {{-- <div class="row">
            <div class="col-sm-12 text-center">
                <h5 id="countdown"></h5>

            </div>
        </div> --}}

        <!-- Start title -->
        {{-- <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">{{ $qust_no }}. {{ $qustions->qustion }}</h2>
        </div> --}}
        <!-- End. title -->

        {{-- <form action="qustion_submit" method="POST">
            @csrf
            <input type="hidden" name="qustion_id" value="{{ $qustions->id }}">
            <input type="hidden" name="index_value" value="{{ $qust_no }}">
            <div class="bg-white padding-20">
                <div class="custom-control custom-radio margin-b-10">
                    <input type="radio" id="answer1" name="answer" class="custom-control-input" value="1">
                    <label class="custom-control-label padding-l-10" for="answer1">
                        {{ $qustions->option1 }}
                    </label>
                </div>
                <div class="custom-control custom-radio margin-b-10">
                    <input type="radio" id="answer2" name="answer" class="custom-control-input" value="2">
                    <label class="custom-control-label padding-l-10" for="answer2">
                        {{ $qustions->option2 }}
                    </label>
                </div>
                <div class="custom-control custom-radio margin-b-10">
                    <input type="radio" id="answer3" name="answer" class="custom-control-input" value="3">
                    <label class="custom-control-label padding-l-10" for="answer3">
                        {{ $qustions->option3 }}
                    </label>
                </div>
                <div class="custom-control custom-radio margin-b-10">
                    <input type="radio" id="answer4" name="answer" class="custom-control-input" value="4">
                    <label class="custom-control-label padding-l-10" for="answer4">
                        {{ $qustions->option4 }}
                    </label>
                </div>
            </div>

            <div class="bg-white padding-20 emBlock__border">
                <div class="row">
                    <div class="col-6">
                        @if ($qust_no != 1)
                            <a href="{{ $qust_no - 1 }}" class="btn btn-primary btn-block margin-t-20">Previews</a>
                        @endif
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary btn-block margin-t-20"> Next</button>
                    </div>
                </div>
            </div>
        </form> --}}
         <div class="quiz-container shadow-sm border-0 card overflow-hidden">
        <!-- Progress Bar -->
        <!-- <div class="progress rounded-0" style="height: 6px;">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div> -->

        <div class="card-body p-4 p-md-5">
            <!-- Header with Timer and Question Count -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <span class="badge bg-light text-primary border border-primary-subtle px-3 py-2 fw-semibold">
                    Question 01 of 20
                </span>
                <div class="timer-wrapper d-flex align-items-center text-danger fw-bold">
                    
                    <p id="countdown"></p>
                </div>
            </div>

            <!-- Question Text -->
            <h2 class="question-text mb-5">
                <span class="question-number text-primary me-2">{{ $qust_no }}.</span>
                {{ $qustions->qustion }}
            </h2>

            <!-- Options List -->
            <form action="qustion_submit" method="POST">
            @csrf
            <input type="hidden" name="qustion_id" value="{{ $qustions->id }}">
            <input type="hidden" name="index_value" value="{{ $qust_no }}">
            <div class="options-container d-grid gap-3">
                <label class="option-card d-flex align-items-center p-2 border rounded-5 cursor-pointer">
                     <input type="radio" id="answer1" name="answer" class="option-input d-none" value="1">
                     <span class="custom-radio mx-2"></span>
                    <label class="option-label fw-medium text-dark" for="answer1">
                        {{ $qustions->option1 }}
                    </label>
                </label>
                 <label class="option-card d-flex align-items-center p-2 border rounded-5 cursor-pointer">
                     <input type="radio" id="answer2" name="answer" class="option-input d-none" value="2">
                     <span class="custom-radio mx-2"></span>
                    <label class="option-label fw-medium text-dark" for="answer2">
                        {{ $qustions->option2 }}
                    </label>
                </label>
                 <label class="option-card d-flex align-items-center p-2 border rounded-5 cursor-pointer">
                     <input type="radio" id="answer3" name="answer" class="option-input d-none" value="3">
                     <span class="custom-radio mx-2"></span>
                    <label class="option-label fw-medium text-dark" for="answer3">
                        {{ $qustions->option3 }}
                    </label>
                </label>
                 <label class="option-card d-flex align-items-center p-2 border rounded-5 cursor-pointer">
                     <input type="radio" id="answer4" name="answer" class="option-input d-none" value="4">
                     <span class="custom-radio mx-2"></span>
                    <label class="option-label fw-medium text-dark" for="answer4">
                        {{ $qustions->option4 }}
                    </label>
                </label>

                
            </div>

            <!-- Footer Navigation -->
            <div class="d-flex justify-content-between align-items-center mt-5">
                @if ($qust_no != 1)
                <a href="{{ $qust_no - 1 }}" class="btn btn-outline-secondary px-4 py-2 border-0 fw-semibold">
                    <i class="bi bi-arrow-left me-2"></i> Previous
                </a>
                @endif
                <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm rounded-pill next-btn">
                    Next <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </div>
            </form>
        </div>
    </div>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <!-- Question Display2 -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3729413945402608" data-ad-slot="1790108010"
            data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>




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

@section('script')
 <script>
    // Simple script to handle visual selection state
    document.querySelectorAll('.option-card').forEach(card => {
      card.addEventListener('click', () => {
        document.querySelectorAll('.option-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');
      });
    });
  </script>

    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{{ date('M d, Y H:i:s', strtotime(session('exam_end_time'))) }}").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("countdown").innerHTML = "<i class='tio-timer'></i> " + minutes + "m " +
                seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "Time Out";
            }
        }, 1000);
    </script>

@endsection
