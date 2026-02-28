@section('title', $quiz->name)
@section('description', $quiz->name)
@section('keywords', $quiz->name)

@extends('layouts.master')
@section('content')

<section class="emPage__public padding-t-70">

    <div class="row">
        <div class="col-sm-12 text-center">
            <h5 id="countdown"></h5>
        </div>
    </div>
    <form action="{{ url('qustion_submit') }}" method="POST">
        @csrf

        @foreach($qustions as $index => $qustion)
        <!-- Start title -->
        <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">{{ $loop->iteration }}. {{ $qustion->qustion }}</h2>
        </div>
        <!-- End. title -->

        <input type="hidden" name="qustion_id[]" value="{{ $qustion->id }}">
        <div class="bg-white padding-20">
            <div class="custom-control custom-radio margin-b-10">
                <input type="radio" id="answer{{ $qustion->id }}1" name="answer{{ $qustion->id }}" class="custom-control-input" value="1">
                <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}1">
                    {{ $qustion->option1 }}
                </label>
            </div>
            <div class="custom-control custom-radio margin-b-10">
                <input type="radio" id="answer{{ $qustion->id }}2" name="answer{{ $qustion->id }}" class="custom-control-input" value="2">
                <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}2">
                    {{ $qustion->option2 }}
                </label>
            </div>
            <div class="custom-control custom-radio margin-b-10">
                <input type="radio" id="answer{{ $qustion->id }}3" name="answer{{ $qustion->id }}" class="custom-control-input" value="3">
                <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}3">
                    {{ $qustion->option3 }}
                </label>
            </div>
            <div class="custom-control custom-radio margin-b-10">
                <input type="radio" id="answer{{ $qustion->id }}4" name="answer{{ $qustion->id }}" class="custom-control-input" value="4">
                <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}4">
                    {{ $qustion->option4 }}
                </label>
            </div>
        </div>
        

        @endforeach

        <button class="btn btn-primary btn-block margin-t-20"> Submit </button>
                    
    </form>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
        crossorigin="anonymous"></script>
    <!-- qustion_view -->
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-3729413945402608"
        data-ad-slot="1542927828"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
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