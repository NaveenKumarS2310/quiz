@section('title', $quiz->test_name)
@section('description', $quiz->test_name)
@section('keywords', $quiz->test_name)

@extends('layouts.master')
@section('content')

    <section class="emPage__public padding-t-70">

        <div class="row">
            <div class="col-sm-12 text-center">
                <span id="countdown">
                    <i class="tio-timer"></i> --
                </span>
            </div>
        </div>
        <form action="{{ url('quiz_result') }}" method="GET">
            @csrf
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <input type="hidden" name="type" value="{{ $type }}">


            @foreach ($qustions as $index => $qustion)
                <!-- Start title -->
                <div class="emTitle_co padding-20">
                    <h2 class="size-16 weight-500 color-secondary mb-1">{{ $loop->iteration }}. {{ $qustion->question }}
                    </h2>
                </div>
                <!-- End. title -->

                {{-- <input type="hidden" name="qustion_id[]" value="{{ $qustion->id }}">
                <div class="bg-white padding-20">
                    <div class="custom-control custom-radio margin-b-10">
                        <input type="radio" id="answer{{ $qustion->id }}1" name="answer{{ $qustion->id }}"
                            class="custom-control-input" value="A">
                        <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}1">
                            {{ $qustion->option_a }}
                        </label>
                    </div>
                    <div class="custom-control custom-radio margin-b-10">
                        <input type="radio" id="answer{{ $qustion->id }}2" name="answer{{ $qustion->id }}"
                            class="custom-control-input" value="B">
                        <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}2">
                            {{ $qustion->option_b }}
                        </label>
                    </div>
                    <div class="custom-control custom-radio margin-b-10">
                        <input type="radio" id="answer{{ $qustion->id }}3" name="answer{{ $qustion->id }}"
                            class="custom-control-input" value="C">
                        <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}3">
                            {{ $qustion->option_c }}
                        </label>
                    </div>
                    <div class="custom-control custom-radio margin-b-10">
                        <input type="radio" id="answer{{ $qustion->id }}4" name="answer{{ $qustion->id }}"
                            class="custom-control-input" value="D">
                        <label class="custom-control-label padding-l-10" for="answer{{ $qustion->id }}4">
                            {{ $qustion->option_d }}
                        </label>
                    </div>
                </div> --}}
                <input type="hidden" name="questions[]" value="{{ $qustion->id }}">

                <div class="bg-white padding-20">
                    @foreach (['A' => 'option_a', 'B' => 'option_b', 'C' => 'option_c', 'D' => 'option_d'] as $key => $field)
                        <div class="custom-control custom-radio margin-b-10">
                            <input type="radio" id="answer{{ $qustion->id }}{{ $key }}"
                                name="answers[{{ $qustion->id }}]" class="custom-control-input"
                                value="{{ $key }}">
                            <label class="custom-control-label padding-l-10"
                                for="answer{{ $qustion->id }}{{ $key }}">
                                {{ $qustion->$field }}
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button class="btn btn-primary btn-block margin-t-20"> Submit </button>

        </form>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <!-- qustion_view -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3729413945402608" data-ad-slot="1542927828"
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
        // Server-side exam end time (UNIX timestamp in seconds)
        const EXAM_END_TIME = {{ strtotime(session('exam_end_time')) }} * 1000;
    </script>

    {{-- <script>
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
    </script> --}}

    <script>
        (function() {
            const countdownEl = document.getElementById('countdown');

            if (!countdownEl || !EXAM_END_TIME) {
                console.error('Countdown element or end time missing');
                return;
            }

            function updateCountdown() {
                const now = Date.now();
                let remaining = EXAM_END_TIME - now;

                // Time over
                if (remaining <= 0) {
                    countdownEl.innerHTML = '<i class="tio-timer"></i> Time Out';
                    clearInterval(timer);

                    // OPTIONAL: auto-submit exam
                    // document.getElementById('examForm')?.submit();

                    return;
                }

                const totalSeconds = Math.floor(remaining / 1000);
                const minutes = Math.floor(totalSeconds / 60);
                const seconds = totalSeconds % 60;

                countdownEl.innerHTML =
                    `<i class="tio-timer"></i> ${minutes}m ${seconds.toString().padStart(2, '0')}s`;
            }

            // Initial render (no 1s delay)
            updateCountdown();

            // Update every second
            const timer = setInterval(updateCountdown, 1000);
        })();
    </script>

@endsection
