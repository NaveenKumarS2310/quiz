@section('title', 'Home Page')
@section('description', 'Role Management')
@section('keywords', 'Role-Management')
@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

@endsection
@section('content')

    {{-- <div class="container mt-4">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
            
                    <div class="card-body">

                        <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Krishna</td>
                            <td>krishna@gmail.com</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Ravi</td>
                            <td>ravi@gmail.com</td>
                            <td>User</td>
                        </tr>
                    </tbody>
                </table>
                       
                    </div>
                </div>
                

            </div>
        </div>

    </div> --}}

    <section class="emPage__public padding-t-70">

        <!-- Start em_swiper_products -->

        <div class="em_swiper_products emCoureses__grid margin-b-20">
            <div class="em_bodyCarousel padding-l-20 padding-r-20">
                <div class="em_itemCourse_grid w-100">
                    <div class="card">
                        <div class="card-body">
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Convert</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td>
                                                @if ($data->role == 'User')
                                                    <button type="button" class="btn btn-sm btn-primary role-btn"
                                                        data-id="{{ base64_encode($data->id) }}"
                                                        data-role="{{ base64_encode($data->role) }}"><i
                                                            class="bi bi-pencil-square mr-2"></i>Make Editor</button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-warning role-btn"
                                                        data-id="{{ base64_encode($data->id) }}"
                                                        data-role="{{ base64_encode($data->role) }}"><i
                                                            class="bi bi-pencil-square mr-2"></i>Make Non-Editor</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    {{-- <tr>
                                        <td>2</td>
                                        <td>Ravi</td>
                                        <td>ravi@gmail.com</td>
                                        <td>User</td>
                                    </tr> --}}
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



@endsection
@section('script')

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
        $(document).on('click', '.role-btn', function() {
            let id = $(this).data('id');
            let role = $(this).data('role');

            role_change(id, role);
        });

        function role_change(id, role) {

            $.ajax({

                url: "{{ route('role.change') }}",
                method: 'post',
                data: {

                    id: id,
                    type: role,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {

                    if(response.status == 'success'){
                        alert('successfully converted');
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }

                }


            });

        }
    </script>

@endsection
