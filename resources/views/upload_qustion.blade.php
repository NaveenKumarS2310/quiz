@section('title', 'Upload Qustion')
@section('description', 'Upload Qustion')
@section('keywords', 'Upload Qustion')

@extends('layouts.master')
@section('content')

    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">Upload Questions</h2>
        </div>
        <!-- End. title -->

        <div class="bg-white padding-20">
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
        </div>

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
                            content += `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer1 + ` type="radio" name="answer` + k + `" value = "1"></span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option1 +
                                `" id="option1_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;
                            content += `<div class="col-sm-6">`;
                            content += `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer2 + ` type="radio" name="answer` + k + `" value = "2" > </span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option2 +
                                `" id="option2_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;

                            content += `<div class="col-sm-6">`;
                            content += `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer3 + ` type="radio" name="answer` + k + `" value = "3" > </span>`;
                            content += `</div>`;
                            content += `<input type="text" value="` + obj_qustions[j].option3 +
                                `" id="option3_of` + k + `" class = "form-control" > `;
                            content += `</div>`;
                            content += `</div>`;
                            content += `<div class="col-sm-6">`;
                            content += `<div class="input-group" style="display:flex;flex-wrap: nowrap;">`;
                            content += `<div class="input-group-prepend">`;
                            content += `<span class="input-group-text"><input ` + answer4 + ` type="radio" name="answer` + k + `" value = "4" > </span>`;
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
