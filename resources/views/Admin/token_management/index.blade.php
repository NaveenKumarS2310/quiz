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
                    <i class="mdi mdi-home"></i>
                </span> Token managment
            </h3>
            {{-- <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav> --}}
        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">

                        <div class="container-fluid">

                            {{-- Top Section --}}
                            <div class="row">
                                {{-- Configure Daily Token Limit --}}
                                <div class="col-md-8 mb-4">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="font-weight-bold mb-3">
                                                <i class="mdi mdi-cog-outline text-primary"></i>
                                                Configure Daily Token Limit
                                            </h5>
                                            <p class="text-muted">
                                                Set the maximum number of tokens users can collect daily
                                            </p>

                                            <div class="bg-light p-4 rounded mb-4 border">
                                                <small class="text-muted">Current Daily Limit</small>
                                                <h2 class="text-primary font-weight-bold mb-0">{{ $dailyLimit ?? 20 }}</h2>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-bold">New Daily Limit</label>
                                                <div class="d-flex">
                                                    <input type="number" class="form-control w-25 h-50" id="newLimit"
                                                        value="{{ $dailyLimit ?? 20 }}">
                                                    <button class="btn btn-primary ml-3" id="saveLimit">Save</button>
                                                    {{-- <button class="btn btn-outline-secondary ml-2">Reset</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Quick Stats --}}
                                <div class="col-md-4 mb-4">
                                    <div class="card shadow-sm h-100">
                                        <div class="card-body">
                                            <h5 class="font-weight-bold mb-4">
                                                <i class="mdi mdi-chart-line text-success"></i>
                                                Quick Stats
                                            </h5>

                                            <div class="mb-3">
                                                <small class="text-muted">Total Users</small>
                                                <h3 class="font-weight-bold">{{ $activity['users'] }}</h3>
                                            </div>

                                            <div class="mb-3">
                                                <small class="text-muted">Tokens Distributed</small>
                                                <h3 class="font-weight-bold text-primary">{{ $activity['distributed'] }}</h3>
                                            </div>

                                            <div>
                                                <small class="text-muted">Today's Collections</small>
                                                <h3 class="font-weight-bold text-success">{{ $activity['today'] }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Recently Collected Tokens --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <div>
                                                    <h5 class="font-weight-bold mb-0">
                                                        <i class="mdi mdi-account-clock-outline text-primary"></i>
                                                        Recently Collected Tokens
                                                    </h5>
                                                    <small class="text-muted">Users who collected tokens recently</small>
                                                </div>
                                                {{-- <span class="badge badge-light">Last 30 days</span> --}}
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table table-hover" id="usersTable">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>User</th>
                                                            <th>Email</th>
                                                            <th>Tokens Collected</th>
                                                            <th>Date</th>
                                                            {{-- <th>Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $a)
                                                            <tr>
                                                                <td>
                                                                    <span
                                                                        class="badge badge-primary rounded-circle p-2 mr-2">{{ mb_substr($a->name, 0, 1) }}</span>
                                                                    {{$a->name}}
                                                                </td>
                                                                <td>{{$a->email}}</td>
                                                                <td>{{$a->my_tokens}}</td>
                                                                <td>{{ $a->last_token_collected_at ?  date('d-M-Y', strtotime($a->last_token_collected_at)) : 'Not Collected'}}</td>
                                                                {{-- <td>
                                                                <a href="#"
                                                                    class="text-primary font-weight-bold">View</a>
                                                            </td> --}}
                                                            </tr>
                                                        @endforeach
                                                        {{-- <tr>
                                                            <td>
                                                                <span
                                                                    class="badge badge-primary rounded-circle p-2 mr-2">SS</span>
                                                                Sarah Smith
                                                            </td>
                                                            <td>sarah@example.com</td>
                                                            <td>
                                                                <span class="badge badge-dark">100 tokens</span>
                                                            </td>
                                                            <td>5 hours ago</td>
                                                            <td>
                                                                <a href="#"
                                                                    class="text-primary font-weight-bold">View</a>
                                                            </td>
                                                        </tr> --}}
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
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
        $(document).ready(function() {
            $('#usersTable').DataTable({
                pageLength: 3,
                ordering: false,
                searching: true,
                info: true,
                order: [[3, 'desc']],
            });
        });
    </script>

    <script>
        $('#saveLimit').click(function() {
            let limit = $('#newLimit').val();


            $.ajax({
                url: "{{ route('token.limit.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    limit: limit
                },
                success: function(res) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Token updated !',
                        timer: 1500,
                        showConfirmButton: false
                    });

                    setTimeout(() => location.reload(), 1600);

                },
                error: function(xhr, status, error) {
                    console.log(xhr);

                    let message = 'Something went wrong';

                    // Laravel validation error
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        message = Object.values(errors)[0][0];
                    }
                    // Server error message
                    else if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                    // Fallback
                    else {
                        message = error;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: message,
                        timer: 2500,
                        showConfirmButton: true
                    });
                }

            });
        });
    </script>


@stop
