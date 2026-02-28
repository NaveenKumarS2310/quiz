@section('title', 'Create Exam')
@section('description', 'Create Exam')
@section('keywords', 'Create Exam')
@section('css')
    <style>
        /* Custom Enhancements for the Form */

        :root {
            --primary-coral: #ff4d4d;
            --primary-coral-dark: #e63e3e;
        }

       

        .card {
            border-radius: 1.25rem;
        }

        /* Enhanced Form Controls */
        .custom-input,
        .custom-select {
            border: 2px solid #f1f5f9;
            border-radius: 0.75rem;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #fcfdfe;
        }

        .custom-input:focus,
        .custom-select:focus {
            border-color: var(--primary-coral);
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(255, 77, 77, 0.1);
        }

        /* Buttons */
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.75rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-primary:hover {
            background-color: #0069d9;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 123, 255, 0.2);
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-coral) 0%, var(--primary-coral-dark) 100%);
            color: white;
            border: none;
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--primary-coral-dark) 0%, #cc3333 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 77, 77, 0.3);
        }

        .letter-spacing-1 {
            letter-spacing: 1px;
        }

        /* Layout Utilities */
        .bg-primary-subtle {
            background-color: rgba(255, 77, 77, 0.1) !important;
        }

        .text-primary {
            color: var(--primary-coral) !important;
        }

        /* Animations */
        .card {
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .input-group {
            flex-wrap: nowrap;
        }
    </style>
@endsection
@extends('layouts.master')
@section('content')

    <section class="bg-light emPage__public padding-t-70 p-2 pt-5 mt-5">

        {{-- <!-- Start title -->
        <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">Create Exams</h2>
        </div>
        <!-- End. title --> --}}

        {{-- <div class="bg-white padding-20">

            <div class="form-group">
                <label>Exam Name</label>
                <input type="text" class="form-control" id="add_name">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" id="add_category">
                            <?php
                            foreach ($category as $da) {
                                echo "<option value='" . $da->id . "'>" . $da->name . ' - ' . $da->category_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label>Number of Questions</label>
                        <input type="number" class="form-control" id="add_numbers">
                    </div>
                </div>
                <div class="col-4">
                    <button id="qus_btn" style="margin-top: 34px;padding: 5px 35px;" class="btn btn-primary">Add</button>
                </div>
            </div>

            <div class="form-group" id="qustions_div"></div>

            <div class="form-group">
                <button type="button" class="btn bg-primary btn-block color-white justify-content-center"
                    id="add_btn">Submit Questions</button>
            </div>
            <br><br><br>
        </div> --}}
        <div class="card border-0 shadow-sm overflow-hidden">
            <!-- Header Section -->
            <div class="card-header bg-white border-bottom py-4 px-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="h4 fw-bold mb-1">Create New Exam</h1>
                        <p class="text-muted small mb-0">Set up your exam parameters and question bank.</p>
                    </div>
                    {{-- <div class="step-indicator">
                        <span class="badge rounded-pill bg-primary-subtle text-primary px-3">Step 1 of 2</span>
                    </div> --}}
                </div>
            </div>

            <div class="card-body p-3">
                
                    <!-- Exam Name Field -->
                    <div class="mb-4 form-group">
                        <label for="examName" class="form-label fw-semibold mb-2">
                            <i class="bi bi-pencil-square me-2 text-primary"></i>&nbsp;&nbsp;Exam Name
                        </label>
                        <input type="text" class="form-control form-control-lg custom-input" id="add_name"
                            placeholder="e.g. Political Science Midterm 2026">
                    </div>

                    <!-- Category Selection -->
                    <div class="mb-4 form-group">
                        <label for="category" class="form-label fw-semibold mb-2">
                            <i class="bi bi-tag me-2 text-primary"></i>&nbsp;&nbsp;Category
                        </label>
                        <select class="form-select form-select-md custom-select" id="add_category">
                             <?php
                            foreach ($category as $da) {
                                echo "<option value='" . $da->id . "'>" . $da->name . ' - ' . $da->category_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Questions Configuration -->
                    <div class="mb-5 form-group">
                        <label class="form-label fw-semibold mb-2">
                            <i class="bi bi-list-ol me-2 text-primary"></i>&nbsp;&nbsp;Number of Questions
                        </label>
                        <div class="input-group input-group-lg">
                            <input type="number" class="form-control form-control-sm custom-input" placeholder="Enter Question Numbers"
                                id="add_numbers">
                            <button class="btn btn-primary btn-sm px-4 fw-medium" type="button" id="qus_btn">
                                <i class="bi bi-plus-lg me-1"></i>Add
                            </button>
                        </div>
                        <div class="form-text mt-2">Recommended: 15-30 questions for better engagement.</div>
                    </div>
                    <div class="form-group" id="qustions_div"></div>
                    <!-- Submit Action -->
                    <div class="d-grid gap-2 form-group">
                        <button type="submit" class="btn btn-submit btn-sm py-3 fw-bold text-uppercase letter-spacing-1" id="add_btn">
                            Submit Questions <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
               
            </div>
        </div>

    </section>
@endsection

@section('script')


    <script type="text/javascript">
        $(document).ready(function() {

            $("#add_btn").click(function() {

                var name = $("#add_name").val();
                var category = $("#add_category").val();
                var numbers = $("#add_numbers").val();

                if (name === "") {
                    $("#add_name").css("border-color", "red");
                } else if (category === "") {
                    $("#add_category").css("border-color", "red");
                } else if (numbers === "") {
                    $("#add_numbers").css("border-color", "red");
                } else {
                    var qustions = [];

                    for (var i = 1; i <= numbers; i++) {
                        var temp_array = [];

                        temp_array[0] = $("#question" + i).val();
                        temp_array[1] = $("input[name=answer" + i + "]:checked").val();
                        temp_array[2] = $("#option1_of" + i).val();
                        temp_array[3] = $("#option2_of" + i).val();
                        temp_array[4] = $("#option3_of" + i).val();
                        temp_array[5] = $("#option4_of" + i).val();

                        qustions.push(temp_array);

                    }

                    $.ajax({
                        url: "{{ url('add-exam') }}",
                        data: {
                            name: name,
                            category: category,
                            numbers: numbers,
                            qustions: qustions,
                            _token: "{{ csrf_token() }}",
                        },
                        method: "POST",
                        success: function(response) {
                            location.reload();
                        },
                        error: function(e, a, b) {
                            alert("Error : " + e.statusText);
                        },
                    });
                }
            });
            $("#edit_btn").click(function() {

                var name = $("#edit_name").val();
                var category = $("#edit_category").val();
                var numbers = $("#edit_numbers").val();
                var exam_id = $("#edit_exam_id").val();

                if (name === "") {
                    $("#edit_name").css("border-color", "red");
                } else if (category === "") {
                    $("#edit_category").css("border-color", "red");
                } else {
                    var qustions = [];

                    for (var i = 1; i <= numbers; i++) {
                        var temp_array = [];

                        temp_array[0] = $("#question" + i).val();
                        temp_array[1] = $("input[name=answer" + i + "]:checked").val();
                        temp_array[2] = $("#option1_of" + i).val();
                        temp_array[3] = $("#option2_of" + i).val();
                        temp_array[4] = $("#option3_of" + i).val();
                        temp_array[5] = $("#option4_of" + i).val();
                        temp_array[6] = $("#question_id" + i).val();

                        qustions.push(temp_array);

                    }

                    // console.log(qustions);

                    $.ajax({
                        url: "edit_exam",
                        data: {
                            name: name,
                            category: category,
                            numbers: numbers,
                            qustions: qustions,
                            exam_id: exam_id,
                        },
                        method: "POST",
                        success: function(response) {
                            get_datas();
                            $("#edit_modal").modal("hide");
                            $("#qustions_div").html("");
                        },
                        error: function(e, a, b) {
                            alert("Error : " + e.statusText);
                        },
                    });
                }
            });
            $("#qus_btn").click(function() {
                var numbers = $("#add_numbers").val();

                if (numbers === "") {
                    $("#add_numbers").css("border-color", "red");
                } else {
                    var content = "";

                    for (var i = 1; i <= numbers; i++) {
                        content += '<div class="row">';
                        content += '<div class="col-sm-12">';
                        content += '<label>Question : ' + i + '</label>';
                        content += '<input type="text" class="form-control" id="question' + i + '">';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '<div class="col-sm-12">';
                        content += '<label>Options : </label>';
                        content += '</div>';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input type="radio" name="answer' + i +
                            '" value="1"></span>';
                        content += '</div>';
                        content += '<input type="text" id="option1_of' + i + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input type="radio" name="answer' + i +
                            '" value="2"></span>';
                        content += '</div>';
                        content += '<input type="text" id="option2_of' + i + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input type="radio" name="answer' + i +
                            '" value="3"></span>';
                        content += '</div>';
                        content += '<input type="text" id="option3_of' + i + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input type="radio" name="answer' + i +
                            '" value="4"></span>';
                        content += '</div>';
                        content += '<input type="text" id="option4_of' + i + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '</div><br><br>';
                    }

                    $("#edit_qustions_div").html("");
                    $("#import_view").html("");
                    $("#qustions_div").html(content);

                }
            });

            $("#import_btn").click(function() {

                var files = $("#import_file").prop('files')[0];
                var formdata = new FormData();
                formdata.append('file', files);

                $.ajax({
                    type: "POST",
                    url: "exam_import_submit",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'text',
                    beforeSend: function() {
                        $("#import_btn").attr("disabled", true);
                    },
                    success: function(response) {
                        // alert(response);
                        $("#import_btn").attr("disabled", false);

                        var content = "";

                        var obj_qustions = jQuery.parseJSON(response);

                        $("#import_numbers").val(obj_qustions.length);

                        for (var j = 0; j < obj_qustions.length; j++) {
                            var answer1 = "";
                            var answer2 = "";
                            var answer3 = "";
                            var answer4 = "";

                            if (obj_qustions[j].answer == "1") {
                                answer1 = "checked";
                            } else if (obj_qustions[j].answer == "2") {
                                answer2 = "checked";
                            } else if (obj_qustions[j].answer == "3") {
                                answer3 = "checked";
                            } else if (obj_qustions[j].answer == "4") {
                                answer4 = "checked";
                            }

                            var k = j + 1;
                            content += '<div class="row">';
                            content += '<div class="col-sm-12">';
                            content += '<label>Question : ' + k + '</label>';
                            content += '<input type="text" class="form-control" value="' +
                                obj_qustions[j].qustion + '" id="question' + k + '">';
                            content += '<input type="hidden" value="' + obj_qustions[j].id +
                                '" id="question_id' + k + '">';
                            content += '</div>';
                            content += '</div>';
                            content += '<div class="row">';
                            content += '<div class="col-sm-12">';
                            content += '<label>Options : </label>';
                            content += '</div>';
                            content += '<div class="col-sm-6">';
                            content += '<div class="input-group">';
                            content += '<div class="input-group-prepend">';
                            content += '<span class="input-group-text"><input ' + answer1 +
                                ' type="radio" name="answer' + k + '" value="1"></span>';
                            content += '</div>';
                            content += '<input type="text" value="' + obj_qustions[j].option1 +
                                '" id="option1_of' + k + '" class="form-control">';
                            content += '</div>';
                            content += '</div>';
                            content += '<div class="col-sm-6">';
                            content += '<div class="input-group">';
                            content += '<div class="input-group-prepend">';
                            content += '<span class="input-group-text"><input ' + answer2 +
                                ' type="radio" name="answer' + k + '" value="2"></span>';
                            content += '</div>';
                            content += '<input type="text" value="' + obj_qustions[j].option2 +
                                '" id="option2_of' + k + '" class="form-control">';
                            content += '</div>';
                            content += '</div>';

                            content += '<div class="col-sm-6">';
                            content += '<div class="input-group">';
                            content += '<div class="input-group-prepend">';
                            content += '<span class="input-group-text"><input ' + answer3 +
                                ' type="radio" name="answer' + k + '" value="3"></span>';
                            content += '</div>';
                            content += '<input type="text" value="' + obj_qustions[j].option3 +
                                '" id="option3_of' + k + '" class="form-control">';
                            content += '</div>';
                            content += '</div>';
                            content += '<div class="col-sm-6">';
                            content += '<div class="input-group">';
                            content += '<div class="input-group-prepend">';
                            content += '<span class="input-group-text"><input ' + answer4 +
                                ' type="radio" name="answer' + k + '" value="4"></span>';
                            content += '</div>';
                            content += '<input type="text" value="' + obj_qustions[j].option4 +
                                '" id="option4_of' + k + '" class="form-control">';
                            content += '</div>';
                            content += '</div>';
                            content += '</div>';
                        }

                        $("#edit_qustions_div").html("");
                        $("#import_view").html(content);
                        $("#qustions_div").html("");
                    },
                    error: function(e) {
                        alert(code.statusText);
                    },
                });
            });

            $("#import_submit_btn").click(function() {

                var name = $("#import_name").val();
                var category = $("#import_category").val();
                var numbers = $("#import_numbers").val();

                if (name === "") {
                    $("#import_name").css("border-color", "red");
                } else if (category === "") {
                    $("#import_category").css("border-color", "red");
                } else if (numbers === "") {
                    $("#import_numbers").css("border-color", "red");
                } else {
                    var qustions = [];

                    for (var i = 1; i <= numbers; i++) {
                        var temp_array = [];

                        temp_array[0] = $("#question" + i).val();
                        temp_array[1] = $("input[name=answer" + i + "]:checked").val();
                        temp_array[2] = $("#option1_of" + i).val();
                        temp_array[3] = $("#option2_of" + i).val();
                        temp_array[4] = $("#option3_of" + i).val();
                        temp_array[5] = $("#option4_of" + i).val();

                        qustions.push(temp_array);

                    }

                    $.ajax({
                        url: "add_exam",
                        data: {
                            name: name,
                            category: category,
                            numbers: numbers,
                            qustions: qustions,
                        },
                        method: "POST",
                        success: function(response) {
                            get_datas();
                            $("#import_name").val("");
                            $("#add_excel_modal").modal("hide");
                        },
                        error: function(e, a, b) {
                            alert("Error : " + e.statusText);
                        },
                    });
                }
            });
        });

        function get_datas() {
            var content = "";
            content += "<div>";
            content += "<table class='table table-striped' id='view_table'>";
            content += "<thead><th>S.No</th><th>Date</th><th>Name</th><th>Remove/Restore</th></thead>";
            content += "<tbody></tbody>";
            content += "</table>";
            content += "</div>";

            $("#table_view").html(content);

            $("#view_table").DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "pageLength": 10,
                "lengthMenu": [
                    [10, 25, 50],
                    [10, 25, 50]
                ],
                "ajax": {
                    url: "fetch_exam",
                },
            });
        }

        function get_excel_data(id) {
            $.ajax({
                url: "get_answers_in_excel",
                data: {
                    id: id
                },
                method: "POST",
                success: function(response) {

                },
                error: function(code) {
                    alert(code.statusText);
                },
            });
        }

        function edit_data(id) {
            $("#edit_exam_id").val(id);
            $.ajax({
                url: "fetch_edit_exam",
                data: {
                    id: id
                },
                method: "POST",
                success: function(response) {
                    // alert(response);
                    var obj = jQuery.parseJSON(response);
                    var exam = obj[0];
                    var qustions = obj[1];

                    var obj_exam = jQuery.parseJSON(exam);
                    for (var i = 0; i < obj_exam.length; i++) {
                        $("#edit_name").val(obj_exam[i].name);
                        $("#edit_category").val(obj_exam[i].category);
                        $("#edit_numbers").val(obj_exam[i].numbers);
                    }

                    var content = "";
                    var obj_qustions = jQuery.parseJSON(qustions);
                    for (var j = 0; j < obj_qustions.length; j++) {
                        var answer1 = "";
                        var answer2 = "";
                        var answer3 = "";
                        var answer4 = "";

                        if (obj_qustions[j].answer == "1") {
                            answer1 = "checked";
                        } else if (obj_qustions[j].answer == "2") {
                            answer2 = "checked";
                        } else if (obj_qustions[j].answer == "3") {
                            answer3 = "checked";
                        } else if (obj_qustions[j].answer == "4") {
                            answer4 = "checked";
                        }

                        var k = j + 1;
                        content += '<div class="row">';
                        content += '<div class="col-sm-12">';
                        content += '<label>Question : ' + k + '</label>';
                        content += '<input type="text" class="form-control" value="' + obj_qustions[j].qustion +
                            '" id="question' + k + '">';
                        content += '<input type="hidden" value="' + obj_qustions[j].id + '" id="question_id' +
                            k + '">';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '<div class="col-sm-12">';
                        content += '<label>Options : </label>';
                        content += '</div>';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input ' + answer1 +
                            ' type="radio" name="answer' + k + '" value="1"></span>';
                        content += '</div>';
                        content += '<input type="text" value="' + obj_qustions[j].option1 + '" id="option1_of' +
                            k + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input ' + answer2 +
                            ' type="radio" name="answer' + k + '" value="2"></span>';
                        content += '</div>';
                        content += '<input type="text" value="' + obj_qustions[j].option2 + '" id="option2_of' +
                            k + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="row">';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input ' + answer3 +
                            ' type="radio" name="answer' + k + '" value="3"></span>';
                        content += '</div>';
                        content += '<input type="text" value="' + obj_qustions[j].option3 + '" id="option3_of' +
                            k + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '<div class="col-sm-6">';
                        content += '<div class="input-group">';
                        content += '<div class="input-group-prepend">';
                        content += '<span class="input-group-text"><input ' + answer4 +
                            ' type="radio" name="answer' + k + '" value="4"></span>';
                        content += '</div>';
                        content += '<input type="text" value="' + obj_qustions[j].option4 + '" id="option4_of' +
                            k + '" class="form-control">';
                        content += '</div>';
                        content += '</div>';
                        content += '</div>';
                    }


                    $("#edit_modal").modal("show");

                    $("#edit_qustions_div").html(content);
                    $("#import_view").html("");
                    $("#qustions_div").html("");

                },
                error: function(e, a, b) {
                    alert("Error : " + e.statusText);
                },
            });
        }

        function delete_data(id) {
            if (confirm("Are you Confirm to Delete")) {
                $.ajax({
                    url: "delete_exam",
                    data: {
                        id: id
                    },
                    method: "POST",
                    success: function(response) {
                        get_datas();
                    },
                    error: function(e, a, b) {
                        alert("Error : " + e.statusText);
                    },
                });
            }
        }
    </script>
@endsection
