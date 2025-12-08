@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)

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
        
        
       
       <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"-->
       <!--      crossorigin="anonymous"></script>-->
       <!-- <ins class="adsbygoogle"-->
       <!--      style="display:block; text-align:center;"-->
       <!--      data-ad-layout="in-article"-->
       <!--      data-ad-format="fluid"-->
       <!--      data-ad-client="ca-pub-3729413945402608"-->
       <!--      data-ad-slot="6200227944"></ins>-->
       <!-- <script>-->
       <!--      (adsbygoogle = window.adsbygoogle || []).push({});-->
       <!-- </script>-->
        
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
             crossorigin="anonymous"></script>
        <!-- Questionresult1 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-3729413945402608"
             data-ad-slot="9932979428"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
        
        <div class="card">
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
                        <label>Currect Answer</label>
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
        </div>
        
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
        <!-- Questionresult2 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-3729413945402608"
             data-ad-slot="6521014309"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        
         <br>
        <br>
        
    </section>
@endsection

@section('script')

@endsection
