@extends('Admin.master-layouts.admin-master')
@section('title', 'dashboard-full-calendar')
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <style>
        /* body {
                                                                                                      background-color: #f8f9fb;
                                                                                                    } */

        .card-stat {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .badge-admin {
            background: #dc3545;
        }

        .badge-editor {
            background: #ffc107;
            color: #000;
        }

        .badge-user {
            background: #0d6efd;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }

        .status-active {
            background: #198754;
        }

        .status-offline {
            background: #6c757d;
        }

        .modal-content {
            border-radius: 12px;
        }

        .modal-header {
            padding-bottom: 0;
        }

        .form-control {
            height: 45px;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }
    </style>

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
                </span> User Creation
            </h3>

        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <!-- Stats -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-3">
                                <div class="card card-stat p-3">
                                    <h6>Total Users</h6>
                                    <h3>{{ count($users) }}</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stat p-3">
                                    <h6>Admins</h6>
                                    <h3>{{ count($users->where('role', 'Admin')) }}</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stat p-3">
                                    <h6>Editors</h6>
                                    <h3>{{ count($users->where('role', 'Editor')) }}</h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-stat p-3">
                                    <h6>Users</h6>
                                    <h3>{{ count($users->where('role', 'User')) }}</h3>
                                </div>
                            </div>
                        </div>

                        <div class="card p-3 mb-3">
                            <div class="row align-items-center g-2">
                                <!-- Role Filter -->
                                <div class="col-md-3">
                                    <select id="roleFilter" class="form-select">
                                        <option value="">All Roles</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Editor">Editor</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>

                                <!-- Search Filter -->
                                <div class="col-md-4">
                                    <input type="text" id="customSearch" class="form-control"
                                        placeholder="Search users...">
                                </div>
                                <div class="col-md-5">
                                    {{-- <button class="btn btn-primary btn-sm float-end">
                                        Create New User
                                    </button> --}}

                                    <button class="btn btn-primary btn-sm float-end" onclick="modal()">
                                        <i class="bi bi-plus-lg"></i> Create New User
                                    </button>

                                </div>
                            </div>
                        </div>


                        <!-- Table -->
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" id="userTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $data)
                                            <tr data-role="{{ $data->role }}" data-status="Active">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="avatar">{{ mb_substr($data->name, 0, 1) }}</div>
                                                        {{ $data->name }}
                                                    </div>
                                                </td>
                                                <td> {{ $data->email }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $data->role == 'Admin' ? 'badge-admin' : ($data->role == 'Editor' ? 'badge-editor' : 'badge-user') }}">
                                                        {{ $data->role }}
                                                    </span>
                                                </td>

                                                {{-- <td><span class="status-dot status-active"></span>Active</td> --}}
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                                        <i class="bi bi-pencil"></i></button>


                                                    <ul class="dropdown-menu">
                                                        @if ($data->role === 'User')
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Editor" style="cursor: pointer">
                                                                    Make as Editor
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Admin" style="cursor: pointer">
                                                                    Make as Admin
                                                                </a>
                                                            </li>
                                                        @elseif($data->role === 'Editor')
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="User" style="cursor: pointer">
                                                                    Make as User
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Admin" style="cursor: pointer">
                                                                    Make as Admin
                                                                </a>
                                                            </li>
                                                        @elseif($data->role === 'Admin')
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="User" style="cursor: pointer">
                                                                    Make as User
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item role-action text-success"
                                                                    data-id="{{ base64_encode($data->id) }}"
                                                                    data-role="Editor" style="cursor: pointer">
                                                                    Make as Editor
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>

                                                    <button class="btn btn-sm btn-light text-danger"
                                                        onclick='delete_user("{{ $data->email }}", "{{ base64_encode($data->id) }}")'>
                                                        <i class="bi bi-trash"></i>
                                                    </button>

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
    </div>

    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3">

                <!-- Modal Header -->
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body pt-0">
                    <form>

                        <!-- Full Name -->
                        <div class="form-group">
                            <label class="font-weight-bold">Full Name</label><span class="text-danger">*</span>
                            <input type="text" class="form-control" placeholder="e.g. Robert Brown">
                            <div class="invalid-feedback">
                                Full name is required.
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="font-weight-bold">Email Address</label><span class="text-danger">*</span>
                            <input type="email" class="form-control" placeholder="robert@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="form-group">
                            <label class="font-weight-bold">Assign Role</label><span class="text-danger">*</span>
                            <select class="form-control">
                                <option value="">Select Role</option>
                                <option>User</option>
                                <option>Editor</option>
                                <option>Admin</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a role.
                            </div>
                        </div>


                        {{-- <!-- Permissions -->
                        <p class="text-muted small mb-3">
                            <strong>Permissions:</strong> Read-only access to basic features.
                        </p> --}}

                        <!-- Submit -->
                        <button type="button" class="btn btn-primary btn-block py-2" onclick="new_user()">
                            Create User Account
                        </button>

                    </form>
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

            let table = $('#userTable').DataTable({
                dom: 'lrtip', // hides default search
                pageLength: 5,
                ordering: true,
                info: true
            });

            // Role filter
            $('#roleFilter').on('change', function() {
                table.column(3).search(this.value).draw();
            });

            // Custom search filter
            $('#customSearch').on('keyup', function() {
                table.search(this.value).draw();
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


        function new_user() {

            let isValid = true;

            let nameField = $('#createUserModal input[type="text"]');
            let emailField = $('#createUserModal input[type="email"]');
            let roleField = $('#createUserModal select');

            // Reset validation
            nameField.removeClass('is-invalid');
            emailField.removeClass('is-invalid');
            roleField.removeClass('is-invalid');

            // Validate name
            if ($.trim(nameField.val()) === '') {
                nameField.addClass('is-invalid');
                isValid = false;
            }

            // Validate email
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ($.trim(emailField.val()) === '' || !emailPattern.test(emailField.val())) {
                emailField.addClass('is-invalid');
                isValid = false;
            }

            // Validate role
            if ($.trim(roleField.val()) === '') {
                roleField.addClass('is-invalid');
                isValid = false;
            }

            if (!isValid) return;

            Swal.fire({
                title: 'Are you sure?',
                text: 'Create a new user account with this email ' + emailField.val() + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, create user'
            }).then((result) => {
                if (result.isConfirmed) {
                    proceed(
                        nameField.val(),
                        emailField.val(),
                        roleField.val()
                    );
                }
            });
        }


        function proceed(name, email, role) {



            $.ajax({
                url: "{{ route('user.create') }}",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    role: role,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: 'Account Created Successfully',
                            timer: 2500,
                            showConfirmButton: false
                        });

                        setTimeout(() => location.reload(), 1600);
                    }
                    if (response.status === 'error') {
                        Swal.fire({
                            icon: 'error',
                            title: response.status,
                            text: response.message + ' ' + response.email,
                            timer: 2500,
                            showConfirmButton: false
                        });
                    }
                },

            });

            /*  // Example success
             Swal.fire({
                 icon: 'success',
                 title: 'User Created',
                 text: 'The user has been created successfully!',
                 timer: 1500,
                 showConfirmButton: false
             });

             // Reset & close modal
             $('#createUserModal form')[0].reset();
             $('#createUserModal').modal('hide'); */
        }

        function delete_user(email,id) {

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do youn want to delete this account ' + email + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete the Account'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('user.delete') }}",
                        type: "POST",
                        data: {
                            id: id,
                            email: email,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            if (response.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'This Account Deleted !',
                                    timer: 2500,
                                    showConfirmButton: false
                                });

                                setTimeout(() => location.reload(), 1600);
                            }
                            if (response.status === 'error') {
                                Swal.fire({
                                    icon: 'error',
                                    title: response.status,
                                    text: response.message + ' ' + response.email,
                                    timer: 2500,
                                    showConfirmButton: false
                                });
                            }
                        },

                    });
                }
            });

        }


        function modal() {
            $('#createUserModal').modal('show');
        }

        $('.form-control').on('input change', function() {
            if ($(this).val()) {
                $(this).removeClass('is-invalid');
            }
        });
    </script>
@stop
