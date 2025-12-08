@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)

@extends('layouts.master')
@section('content')

    <section class="emPage__public padding-t-70">

        <div class="bg-white padding-20 emBlock__border">
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
        </div>

        <div class="sharethis-inline-share-buttons"></div> <br><br>s
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
             crossorigin="anonymous"></script>
        <!-- Question Topics -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-3729413945402608"
             data-ad-slot="2707465216"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        

    </section>
@endsection

@section('script')
    <script>
        var start_count = 5;
        $(document).ready(function() {
            $("#start_btn").click(function(){
                start_in();
            });
        });

        function start_in()
        {
            $("#start_btn").html("Start in "+start_count+" Sec");
            if(start_count > 0)
            {
                start_count--;
                setTimeout(start_in, 1000);
            }
            else
            {
                $("#start_btn").html("Let's Go");
                window.location.href = "{{url('quiz_start')}}/{{$quiz->id}}";
            }
        }
    </script>
@endsection
