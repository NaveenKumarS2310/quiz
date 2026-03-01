@extends('Admin.master-layouts.admin-master')
@section('title', 'dashboard-full-calendar')
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

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
                    <i class="mdi mdi-format-align-left"></i>
                </span> Free Quiz List
            </h3>
            <a href="{{ route('upload.free-quiz') }}" class="btn btn-primary btn-sm">
                Add New Test
            </a>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List</h4>
                        <div class="table-responsive"></div>
                        <table id="usersTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Exam Name</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($free_quiz_list as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->test_name }}</td>
                                        <td>{{ $data->category_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('upload.free-quiz.edit', $data->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                ADD / Edit Questions
                                            </a>
                                        </td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('js')
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#usersTable').DataTable({
                    pageLength: 10,
                    ordering: true,
                    searching: true,
                    info: true
                });
            });
        </script>
    @stop
