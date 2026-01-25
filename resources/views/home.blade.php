@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')

@extends('layouts.master')
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
@section('content')
    <section class="emPage__public padding-t-70">

        <!-- Start em_swiper_products -->

        <div class="em_swiper_products emCoureses__grid margin-b-20">
            <div class="em_bodyCarousel padding-l-20 padding-r-20">
                <div class="welcome">
                    <p class="greeting">Good Afternoon 👋</p>
                    <h2 class="title">Ready to Quiz?</h2>
                    <div class="coins">🔥 7</div>
                </div>
                <div class="em_itemCourse_grid w-100">
                    <div class="cardd">
                        <div class="card-dbody" style="text-align: center;">
                            {{-- <h5 class="size-17">
                                For Daily Updates Join our Telegram Group
                            </h5>
                            <center>
                                <a href="https://t.me/quizunivers"><button type="button" class="btn btn_default margin-t-20">
                                        <div class="icon">
                                            <i class="tio-link" style="color: #fff;"></i>
                                        </div>
                                        <span>Join our Telegram Group</span>
                                    </button></a>
                            </center> --}}
                            <a href="https://t.me/quizunivers">
                                <div class="community-banner">
                                    <div class="banner-icon"><i class="bi bi-telegram"></i></div>
                                    <div class="banner-content">
                                        <h3>Join Our Community</h3>
                                        <p>Daily updates & exclusive quizzes</p>
                                    </div>
                                    <button class="join-btn">Join</button>
                                </div>
                            </a>
                            @if (auth()->check())
                                {{-- Divider --}}
                                <hr class="my-3">

                                {{-- Daily Token Section --}}
                                @php
                                    $collectedToday =
                                        $users->last_token_collected_at &&
                                        $users->last_token_collected_at->toDateString() === now()->toDateString();
                                @endphp


                                <button id="collectTokenBtn"
                                    class="btn btn-success {{ $collectedToday ? 'disabled' : '' }}">
                                    🎁 Collect {{ $token->token_limit }} Daily Tokens
                                </button>

                                <p class="mt-2 mb-0">
                                    Your Tokens:
                                    <strong id="tokenCount">{{ auth()->user()->my_tokens ?? 0 }}</strong>
                                </p>

                                @if ($collectedToday)
                                    <small class="text-muted">
                                        You already collected today. Come back tomorrow!
                                    </small>
                                @endif

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
            data-ad-format="fluid" data-ad-client="ca-pub-3729413945402608" data-ad-slot="3898015154"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>





        <!-- End. em_swiper_products -->
        <!-- Start title -->
        {{-- <div class="emTitle_co padding-5 padding-l-20">
            <h2 class="size-16 weight-500 color-primary mb-1">Latest Quiz</h2>
        </div> --}}
        <!-- End. title -->


        <!-- Start em__pkLink -->

        @foreach ($latest_quiz as $index => $lq)
            @if ($index == 10 || $index == 20 || $index == 30)
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                    data-ad-format="fluid" data-ad-client="ca-pub-3729413945402608" data-ad-slot="3898015154"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || [])
                    .push({});
                </script>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
                    crossorigin="anonymous"></script>
                <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                    data-ad-format="fluid" data-ad-client="ca-pub-3729413945402608" data-ad-slot="6200227944"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            @endif
            <section class="quizzes-section m-2 mb-3">
                {{-- <div class="section-header">
                <h3 class="section-title">:dart: Latest Quizzes</h3>
                <a href="#" class="see-all">See all ›</a>
            </div> --}}
                <div class="quiz-list">
                    <!-- Quiz Item 1 -->
                    <a href="{{ url('quiz') }}/{{ $lq->slug }}">
                        <div class="quiz-item">
                            <div class="quiz-content">
                                <h4 class="quiz-title">{{ $index + 1 }}. {{ $lq->name }}</h4>
                                <div class="quiz-meta">
                                    <span class="meta-item">⏱️ {{ $lq->noq }} Qs</span>
                                    <span class="meta-item">⏰ {{ $lq->noq }}mins</span>
                                </div>
                            </div>
                            <button class="play-btn">▶</button>
                        </div>
                    </a>
                </div>
            </section>
            {{-- <div class="card m-2">
                <div class="card-body">
                    <a href="{{ url('quiz') }}/{{ $lq->slug }}" class="item-link">
                        <div class="group">
                            <span class="path__name">{{ $index + 1 }}. {{ $lq->name }}</span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7">
                                <label style="color: var(--bg-primary)">Number Of Qustion : {{$lq->noq}}</label>
                            </div>
                            <div class="col-5">
                                <label style="color: var(--bg-primary)">Time : <i class="tio-alarm"></i> {{$lq->noq}}mins</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary" style="display: flex;">
                                    <div class="icon">
                                        <i class="tio-next_ui" style="color: #fff;"></i>
                                    </div>
                                    <span>&nbsp;&nbsp;Start Now</span>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}
        @endforeach

        <br>
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
        $('#collectTokenBtn').click(function() {


            @if (isset($collectedToday))


                Swal.fire({

                    title: 'You have Already Collected your token',
                    text: 'Come back tomorrow!',
                    icon: 'info',
                    showCancelButton: false,
                    confirmButtonText: 'Ok'
                });

                return;
            @endif

            Swal.fire({
                title: 'Collect Daily Tokens?',
                text: 'You will receive 10 tokens',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Collect'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{ route('token.collect') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {

                            if (res.status === 'success') {
                                Swal.fire('Success!', res.message, 'success');
                                $('#tokenCount').text(res.tokens);
                                setTimeout(() => location.reload(), 1600);
                            } else {
                                Swal.fire('Oops!', res.message, 'warning');
                            }



                        }
                    });

                }
            });

        });
    </script>
@endsection
