@section('title', 'Question List')
@section('description', 'Question List')
@section('keywords', 'Question List')

@extends('layouts.master')
@section('content')

    <style>
        .input-group {
            flex-wrap: nowrap;
        }
    </style>

    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">Edit Question</h2>
        </div>
        <!-- End. title -->
        <form action="{{ url('question-edit-submit') }}" method="POST">
            @csrf
            <input type="hidden" name="edit_id" value="{{ $quiz->id }}">
            <div class="bg-white padding-20">

                <div class="form-group">
                    <label>Exam Name</label>
                    <input type="text" class="form-control" id="edit_name" name="name" value="{{ $quiz->name }}">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="edit_category" name="category">
                                <option value="">Select Category</option>
                                <?php
                                foreach ($category as $da) {
                                    if ($da->id == $quiz->category_id) {
                                        echo "<option selected value='" . $da->id . "'>" . $da->name . ' - ' . $da->category_name . '</option>';
                                    } else {
                                        echo "<option value='" . $da->id . "'>" . $da->name . ' - ' . $da->category_name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    @foreach ($quiz_qustion as $index => $qust)
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Question : {{ $index + 1 }}</label>
                                <input type="text" class="form-control" name="question[]"
                                    id="question{{ $index }}" value="{{ $qust->qustion }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Options : </label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input type="radio"
                                                name="answer{{ $index }}" value="1"
                                                @if ($qust->answer == 1) checked @endif></span>
                                    </div>
                                    <input type="text" name="option1[]" id="option1_of{{ $index }}"
                                        class="form-control" value="{{ $qust->option1 }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input type="radio"
                                                name="answer{{ $index }}" value="2"
                                                @if ($qust->answer == 2) checked @endif></span>
                                    </div>
                                    <input type="text" name="option2[]" id="option2_of{{ $index }}"
                                        class="form-control" value="{{ $qust->option2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input type="radio"
                                                name="answer{{ $index }}" value="3"
                                                @if ($qust->answer == 3) checked @endif></span>
                                    </div>
                                    <input type="text" name="option3[]" id="option3_of{{ $index }}"
                                        class="form-control" value="{{ $qust->option3 }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input type="radio"
                                                name="answer{{ $index }}" value="4"
                                                @if ($qust->answer == 4) checked @endif></span>
                                    </div>
                                    <input type="text" name="option4[]" id="option4_of{{ $index }}"
                                        class="form-control" value="{{ $qust->option4 }}">
                                </div>
                            </div>
                        </div><br><br>
                    @endforeach


                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-primary btn-block color-white justify-content-center"
                        id="update_btn">Update Exam</button>
                </div>
                <br><br><br>
            </div>
        </form>


    </section>
@endsection

@section('script')
    <script type="text/javascript"></script>
@endsection
