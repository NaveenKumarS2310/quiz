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
                </span> Role managment
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
                        <h4 class="card-title">Users</h4>
                        <div class="table-responsive">
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical fs-4"></i>
                                                    </button>

                                                    <ul class="dropdown-menu">
                                                        @if ($data->role === 'User')
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Editor">
                                                                    Make Editor
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Admin">
                                                                    Make Admin
                                                                </a>
                                                            </li>
                                                        @elseif($data->role === 'Editor')
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="User">
                                                                    Make User
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Admin">
                                                                    Make Admin
                                                                </a>
                                                            </li>
                                                        @elseif($data->role === 'Admin')
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="User">
                                                                    Make User
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Editor">
                                                                    Make Editor
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                ordering: true,
                searching: true,
                info: true
            });
        });
    </script>

    <script>
        $(document).on('click', '.role-action', function() {
            let id = $(this).data('id');
            let role = $(this).data('role');

            Swal.fire({
                title: 'Are you sure?',
                text: 'Change role to ' + role + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it'
            }).then((result) => {
                if (result.isConfirmed) {
                    role_change(id, role);
                }
            });
        });

        function role_change(id, role) {
            $.ajax({
                url: "{{ route('role.change') }}",
                type: "POST",
                data: {
                    id: id,
                    type: role,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: 'Role changed successfully',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        setTimeout(() => location.reload(), 1600);
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Something went wrong', 'error');
                }
            });
        }
    </script>
@stop
