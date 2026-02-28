@extends('Admin.master-layouts.admin-master')
@section('title', 'Free Test')
@section('css')
@stop
@section('pageheader')
    @include('Admin.master-layouts.page-header')
@stop
@section('sidemenu')
    @include('Admin.master-layouts.sidemenu')
@stop
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Free Test Master
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Free Test Master Add</h4>
                        <p class="card-description"> create Test Master </p>
                        {{-- Correct hidden id --}}
                        <input type="hidden" name="id" value="{{ request('id') }}">
                        <div class="row">
                            {{-- Test Name --}}
                            <div class="form-group col-md-6">
                                <label>Test Name <span class="text-danger">*</span></label>
                                <input type="text" name="test_name"
                                    class="form-control @error('test_name') is-invalid @enderror"
                                    placeholder="Enter your Test name" value="{{ $test->test_name }}" disabled>
                            </div>
                            {{-- Category --}}
                            <div class="form-group col-md-6">
                                <label>Select your category <span class="text-danger">*</span></label>
                                <select name="test_category"
                                    class="form-control @error('test_category') is-invalid @enderror"
                                    @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('test_category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option> @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>URL Name <span class="text-danger">*</span></label>
                                <input type="text" name="url_name" class="form-control "
                                    placeholder="Enter your URL name" value="{{ $test->url_name }}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Token <span class="text-danger">*</span></label>
                                <input type="text" name="url_name" class="form-control "
                                    placeholder="Enter your URL name" value="{{ $test->number_of_token }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Questions</h4>
                        <p class="card-description"> Add Question and answer </p>
                        <form action="{{ route('upload.free-quiz.question.save', $test->id) }}" method="POST">
                            @csrf
                            <div id="question-wrapper">

                                @foreach ($test->questions as $index => $question)
                                    <div class="question-item border p-3 mb-3">

                                        <input type="hidden" name="questions[{{ $index }}][id]"
                                            value="{{ $question->id }}">

                                        <div class="form-group">
                                            <label>Question</label>
                                            <textarea name="questions[{{ $index }}][question]" class="form-control">{{ $question->question }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="questions[{{ $index }}][option_a]"
                                                    value="{{ $question->option_a }}" class="form-control mb-2"
                                                    placeholder="Option A">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="questions[{{ $index }}][option_b]"
                                                    value="{{ $question->option_b }}" class="form-control mb-2"
                                                    placeholder="Option B">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="questions[{{ $index }}][option_c]"
                                                    value="{{ $question->option_c }}" class="form-control mb-2"
                                                    placeholder="Option C">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="questions[{{ $index }}][option_d]"
                                                    value="{{ $question->option_d }}" class="form-control mb-2"
                                                    placeholder="Option D">
                                            </div>
                                        </div>

                                        <select name="questions[{{ $index }}][correct_answer]"
                                            class="form-control mt-2">
                                            <option value="">Select Correct Answer</option>
                                            <option value="A"
                                                {{ $question->correct_answer == 'A' ? 'selected' : '' }}>Option A</option>
                                            <option value="B"
                                                {{ $question->correct_answer == 'B' ? 'selected' : '' }}>Option B</option>
                                            <option value="C"
                                                {{ $question->correct_answer == 'C' ? 'selected' : '' }}>Option C</option>
                                            <option value="D"
                                                {{ $question->correct_answer == 'D' ? 'selected' : '' }}>Option D</option>
                                        </select>

                                        <div class="form-group mt-2">
                                            <label>Answer Description</label>
                                            <textarea name="questions[{{ $index }}][answer_description]" class="form-control" rows="2">{{ $question->answer_description }}</textarea>
                                        </div>

                                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-question">
                                            Remove
                                        </button>

                                    </div>
                                @endforeach

                            </div>

                            <button type="button" id="add-question" class="btn btn-success btn-sm">
                                + Add More Question
                            </button>
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    Save All Questions
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        let questionIndex = {{ $test->questions->count() }};

        document.getElementById('add-question').addEventListener('click', function() {

            let wrapper = document.getElementById('question-wrapper');

            let newBlock = `
    <div class="question-item border p-3 mb-3">

        <div class="form-group">
            <label>Question</label>
            <textarea name="questions[${questionIndex}][question]" 
                      class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="text" name="questions[${questionIndex}][option_a]" 
                       class="form-control mb-2" placeholder="Option A">
            </div>
            <div class="col-md-6">
                <input type="text" name="questions[${questionIndex}][option_b]" 
                       class="form-control mb-2" placeholder="Option B">
            </div>
            <div class="col-md-6">
                <input type="text" name="questions[${questionIndex}][option_c]" 
                       class="form-control mb-2" placeholder="Option C">
            </div>
            <div class="col-md-6">
                <input type="text" name="questions[${questionIndex}][option_d]" 
                       class="form-control mb-2" placeholder="Option D">
            </div>
        </div>

        <select name="questions[${questionIndex}][correct_answer]" 
                class="form-control mt-2">
            <option value="">Select Correct Answer</option>
            <option value="A">Option A</option>
            <option value="B">Option B</option>
            <option value="C">Option C</option>
            <option value="D">Option D</option>
        </select>

        <div class="form-group mt-2">
            <label>Answer Description</label>
            <textarea name="questions[${questionIndex}][answer_description]" 
                      class="form-control" rows="2"></textarea>
        </div>

        <button type="button" 
                class="btn btn-danger btn-sm mt-2 remove-question">
            Remove
        </button>

    </div>
    `;

            wrapper.insertAdjacentHTML('beforeend', newBlock);
            questionIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-question')) {
                e.target.closest('.question-item').remove();
            }
        });
    </script>
    <script>
        let questionIndex = 1;

        $('#add-question').click(function() {

            let newQuestion = $('.question-item:first').clone();

            newQuestion.find('textarea, input').val('');

            newQuestion.find('select').val('');

            // Update name index
            newQuestion.find('textarea, input, select').each(function() {
                let name = $(this).attr('name');
                name = name.replace(/\d+/, questionIndex);
                $(this).attr('name', name);
            });

            $('#question-wrapper').append(newQuestion);

            questionIndex++;
        });

        $(document).on('click', '.remove-question', function() {
            if ($('.question-item').length > 1) {
                $(this).closest('.question-item').remove();
            }
        });
    </script>

@stop