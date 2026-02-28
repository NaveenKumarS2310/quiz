@section('title', 'Upload Qustion')
@section('description', 'Upload Qustion')
@section('keywords', 'Upload Qustion')
@section('css')
    <style>
        :root {
            --primary-color: #0066cc;
            --primary-hover: #0052a3;
            --accent-red: #ef5350;
            --accent-red-hover: #d93025;
            --text-main: #1a1a1a;
            --text-muted: #757575;
            --border-color: #e5e7eb;
            --bg-light: #f9fafb;
            --bg-success: #e8f5e9;
            --text-success: #2e7d32;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", sans-serif;
            color: var(--text-main);
            background: #f5f5f5;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: box-shadow 0.3s ease;
        }

        .form-card:hover {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        /* Form Header */
        .form-header {
            background: linear-gradient(135deg, #f5f7fa 0%, #f9fafb 100%);
            padding: 32px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .header-content {
            flex: 1;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .form-subtitle {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 400;
            margin: 0;
        }

        .header-icon {
            font-size: 48px;
            color: var(--primary-color);
            opacity: 0.1;
            margin-left: 20px;
        }

        /* Form Body */
        .form-body {
            padding: 32px;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        /* Form Group */
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-label {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0;
        }

        .label-text {
            letter-spacing: -0.2px;
        }

        .required-badge {
            color: var(--accent-red);
            font-size: 18px;
            line-height: 1;
        }

        /* Form Controls */
        .form-input {
            height: 48px;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-size: 15px;
            font-weight: 400;
            color: var(--text-main);
            background: white;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .form-input::placeholder {
            color: var(--text-muted);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23757575' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .form-select:focus {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%230066cc' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
        }

        .form-hint {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 400;
            line-height: 1.4;
        }

        /* File Upload */
        .file-upload-wrapper {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .file-input {
            display: none;
        }

        .file-upload-box {
            border: 2px dashed var(--border-color);
            border-radius: 12px;
            padding: 32px 24px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--bg-light);
            position: relative;
        }

        .file-upload-box:hover {
            border-color: var(--primary-color);
            background: rgba(0, 102, 204, 0.02);
        }

        .file-upload-box.drag-over {
            border-color: var(--primary-color);
            background: rgba(0, 102, 204, 0.05);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }

        .upload-icon {
            font-size: 40px;
            color: var(--primary-color);
            margin-bottom: 12px;
        }

        .upload-text {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .upload-main {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-main);
            margin: 0;
        }

        .upload-hint {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
        }

        .file-name {
            display: none;
            padding: 12px 16px;
            background: var(--bg-success);
            border-radius: 10px;
            font-size: 14px;
            color: var(--text-success);
            font-weight: 500;
        }

        .file-name.active {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .file-name::before {
            content: "✓";
            font-weight: 700;
            font-size: 16px;
        }

        /* Sample Download */
        .sample-download {
            display: flex;
            justify-content: center;
        }

        .download-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.2s ease;
            padding: 8px 12px;
            border-radius: 8px;
        }

        .download-link:hover {
            color: var(--primary-hover);
            background: rgba(0, 102, 204, 0.05);
        }

        .download-link i {
            font-size: 16px;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 12px;
            padding-top: 12px;
            margin-top: 8px;
        }

        .btn-primary,
        .btn-secondary {
            padding: 12px 24px;
            border-radius: 10px;
            border: none;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: -0.2px;
        }

        .btn-primary {
            background: var(--accent-red);
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            background: var(--accent-red-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(239, 83, 80, 0.2);
        }

        .btn-secondary {
            background: var(--bg-light);
            color: var(--text-main);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: #f0f0f0;
            border-color: #d0d0d0;
        }

        /* Info Box */
        .info-box {
            background: rgba(0, 102, 204, 0.05);
            border-left: 4px solid var(--primary-color);
            padding: 16px 20px;
            border-radius: 10px;
        }

        .info-content {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .info-content i {
            font-size: 20px;
            color: var(--primary-color);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
            margin: 0 0 4px 0;
        }

        .info-text {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.5;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .form-header {
                flex-direction: column;
                gap: 16px;
                padding: 24px;
            }

            .header-icon {
                opacity: 0.05;
                margin-left: 0;
            }

            .form-body {
                padding: 24px;
                gap: 24px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-secondary {
                flex: 1;
            }
        }
    </style>
@stop
@extends('layouts.master')
@section('content')

    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        {{-- <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">Upload Questions</h2>
        </div> --}}
        <!-- End. title -->

        {{-- <div class="bg-white padding-20">
            <div class="form-group">
                <label>Exam Name</label>
                <input type="text" class="form-control" id="import_name">
                <input type="hidden" id="import_numbers">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" id="import_category">
                    <?php
                    foreach ($category as $da) {
                        echo "<option value='" . $da->id . "'>" . $da->name . ' - ' . $da->category_name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Select File</label>
                <input type="file" class="form-control" name="import_file" id="import_file">
            </div>

            <a href="{{ url('Online-exam-excel-format.xlsx') }}">Sample File Download</a>
            <br>
            <div class="form-group">
                <button type="button" class="btn bg-primary btn-block color-white justify-content-center"
                    id="import_btn">Upload</button>
            </div>

            <div id="import_view"></div>

            <br>

            <div class="form-group d-none" id="import_submit_div">
                <button type="button" class="btn bg-primary btn-block color-white justify-content-center"
                    id="import_submit_btn">Confirm</button>
            </div>
            <br>
            <br>
        </div> --}}
        <div class="mx-auto mb-5 pb-5 padding-20">
            <div class="form-card">
                <!-- Header Section -->
                <div class="form-header">
                    <div class="header-content">
                        <h1 class="form-title">Upload Questions</h1>
                        <p class="form-subtitle">Add questions to your exam by uploading a file</p>
                    </div>

                </div>

                <!-- Form Body -->
                <form id="uploadQuestionsForm" class="form-body">
                    <!-- Exam Name Field -->
                    <div class="form-group">
                        <label for="examName" class="form-label">
                            <span class="label-text">Exam Name</span>
                            <span class="required-badge">*</span>
                        </label>
                        <input type="text" class="form-control" id="import_name">
                        <input type="hidden" id="import_numbers">
                        <div class="form-hint">Give your exam a unique and descriptive name</div>
                    </div>

                    <!-- Category Field -->
                    <div class="form-group">
                        <label for="categorySelect" class="form-label">
                            <span class="label-text">Category</span>
                            <span class="required-badge">*</span>
                        </label>
                        <select class="form-control" id="import_category">
                            <?php
                            foreach ($category as $da) {
                                echo "<option value='" . $da->id . "'>" . $da->name . ' - ' . $da->category_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- File Upload Field -->
                    <div class="form-group">
                        <label for="fileInput" class="form-label">
                            <span class="label-text">Select File</span>
                            <span class="required-badge">*</span>
                        </label>

                        <div class="file-upload-wrapper">
                            <input type="file" class="file-input" id="import_file" name="import_file" accept=".csv,.xlsx,.xls,.pdf" >
                            <div class="file-upload-box">
                                <div class="upload-icon">
                                    <i class="bi bi-file-earmark-arrow-up"></i>
                                </div>
                                <div class="upload-text">
                                    <p class="upload-main">Choose file or drag and drop</p>
                                    <p class="upload-hint">Supported formats: CSV, XLSX, PDF</p>
                                </div>
                            </div>
                            <div class="file-name" id="fileName"></div>
                        </div>
                        <div class="sample-download">
                                <a href="{{ url('Online-exam-excel-format.xlsx') }}" class="download-link">
                                    <i class="bi bi-download"></i>
                                    <span>Download Sample File</span>
                                </a>
                            </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="form-actions" id="import_submit_div">

                        <button type="submit" class="btn-primary" id="import_submit_btn">
                            <i class="bi bi-cloud-upload"></i>
                            <span>Upload Questions</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Info Box -->
        {{-- <div class="info-box mb-5 padding-20">
            <div class="info-content">
                <i class="bi bi-info-circle"></i>
                <div>
                    <p class="info-title">Tip:</p>
                    <p class="info-text">Ensure your file follows the correct format with question, options, and correct
                        answer columns.</p>
                </div>
            </div>
        </div> --}}
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#import_btn").click(function() {
                var files = $("#import_file").prop('files')[0];
                var formdata = new FormData();
                formdata.append('file', files);
                formdata.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    type: "POST",
                    url: "{{ url('exam-pre-upload') }}",
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

                        const obj_qustions = JSON.parse(response);

                        $("#import_btn").attr("disabled", false);

                        var content = "";


                        $("#import_numbers").val(obj_qustions.length);

                        for (var j = 0; j < obj_qustions.length; j++) {
                            var answer1 = "";
                            var answer2 = "";
                            var answer3 = "";
                            var answer4 = "";
                            if (obj_qustions[j].answer == "A") {
                                answer1 = "checked";
                            } else if (obj_qustions[j].answer == "B") {
                                answer2 = "checked";
                            } else if (obj_qustions[j].answer == "C") {
                                answer3 = "checked";
                            } else if (obj_qustions[j].answer == "D") {
                                answer4 = "checked";
                            }
                            var k = j + 1;

                            content += `<div class="row">`;
                            content += `<div class="col-sm-12">`;
                            content += `<label>Question : ` + k + `</label>`;
                            content += `<input type="text" class="form-control" value="` +
                                obj_qustions[j].qustion + `" id="question` + k + `">`;
                            content += `<input type="hidden" value="` + obj_qustions[j].id +
                                `" id="question_id` + k + `">`;
                            content += `</div>`;
                            content += `</div>`;
                            content += `<div class="row form-group">`;
                            content += `<div class="col-sm-12">`;
                            content += `<label>Options : </label>`;
                            content += `</div>`;
                            content += `<div class="col-sm-6">`;
                            content +=
                                `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer1 +
                                ` type="radio" name="answer` + k + `" value = "1"></span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option1 +
                                `" id="option1_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;
                            content += `<div class="col-sm-6">`;
                            content +=
                                `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer2 +
                                ` type="radio" name="answer` + k + `" value = "2" > </span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option2 +
                                `" id="option2_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;

                            content += `<div class="col-sm-6">`;
                            content +=
                                `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer3 +
                                ` type="radio" name="answer` + k + `" value = "3" > </span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option3 +
                                `" id="option3_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;
                            content += `<div class="col-sm-6">`;
                            content +=
                                `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer4 +
                                ` type="radio" name="answer` + k + `" value = "4" > </span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option4 +
                                `" id="option4_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;
                            content += `</div>`;
                        }

                        $("#edit_qustions_div").html("");
                        $("#import_view").html(content);
                        $("#qustions_div").html("");

                        $("#import_submit_div").removeClass("d-none");
                    },
                    error: function(code) {
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
        });
    </script>
@endsection
