@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)
@section('css')
<style>
 

    .tracking-tighter {
      letter-spacing: -0.05em;
    }

    .tracking-tight {
      letter-spacing: -0.025em;
    }

    .leading-snug {
      line-height: 1.4;
    }

    .question-index {
      color: #eaeaea;
      font-variant-numeric: tabular-nums;
      min-width: 40px;
    }

    .option-letter {
      color: #999;
    }

    .option-item {
      transition: all 0.2s ease;
      border-width: 1px !important;
    }

    .bg-success-subtle {
      background-color: #f0fdf4 !important;
    }

    .text-success {
      color: #16a34a !important;
    }

    .border-success {
      border-color: #16a34a !important;
    }

    .question-block {
      animation: fadeIn 0.5s ease-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Hover effects for better interactivity */
    .option-item:hover {
      border-color: #000;
      opacity: 1 !important;
    }

    @media (max-width: 768px) {
      .display-5 {
        font-size: 2.5rem;
      }

      .question-index {
        min-width: 30px;
        font-size: 1.25rem !important;
      }
    }
  </style>
@endsection
@extends('layouts.master')
@section('content')

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

        @php $qust_no = 1; @endphp
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
        @endforeach

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
