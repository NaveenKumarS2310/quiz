@extends('Admin.master-layouts.admin-master')
@section('title', 'News category')
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
                </span> News Category
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
                        <h4 class="card-title">News Category</h4>
                        <p class="card-description"> create Or update </p>

                        @if (request()->route()->getName() == 'admin.news.category.edit.index')
                            <form class="forms-sample" action="{{ route('admin.news.category.edit.store') }}" method="POST"
                                enctype="multipart/form-data">
                            @else
                                <form class="forms-sample" action="{{ route('admin.news.category.create.store') }}"
                                    method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id ?? '' }}">

                        <div class="form-group">
                            <label for="category-name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="category_name" id="category-name"
                                placeholder="Enter your category name"
                                value="{{ old('category_name', $category->category_name ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="category-image">Category Image</label>
                            <input type="file" class="form-control" name="category_image" id="category-image">
                            @if (isset($category->category_image) && $category->category_image)
                                <div class="mt-2 text-center">
                                    <img src="{{ asset('images/categories/' . $category->category_image) }}"
                                        alt="Current Image" style="max-width: 150px; border: 1px solid #ddd; padding: 5px;">
                                    <div class="form-check form-check-flat form-check-danger mt-1 d-inline-block">
                                        <label class="form-check-label text-danger">
                                            <input type="checkbox" name="remove_image" value="1"
                                                class="form-check-input">
                                            Remove Image
                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" name="category_status" value="1" class="form-check-input"
                                    {{ old('category_status', $category->status ?? 0) ? 'checked' : '' }}>
                                Status
                                <i class="input-helper"></i>
                            </label>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">News Category</h4>
                        <div class="table-responsive"></div>
                        <table id="categoryTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($data->category_image)
                                                <img src="{{ asset('images/categories/' . $data->category_image) }}"
                                                    alt="Image"
                                                    style="width: 50px; height: 50px; border-radius: 5px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $data->category_name }}</td>
                                        <td class="text-center">
                                            <label class="switch">
                                                <input type="checkbox" onclick="category_update(event,this)"
                                                    class="toggle-status" data-id="{{ $data->id }}"
                                                    data-name="{{ $data->category_name }}"
                                                    {{ $data->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.news.category.edit.index', ['id' => $data->id]) }}"><button
                                                    type="button" class="btn btn-gradient-info btn-fw">Edit</button></a>
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
@stop
@section('js')

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable({
                pageLength: 10,
                ordering: true,
                searching: true,
                info: true
            });
        });

        function category_update(ev, el) {


            ev.stopPropagation(); // 1️⃣ stop parent events
            ev.preventDefault(); // 2️⃣ stop default toggle

            if (el.checked) {

                var status = 1;

                var stat = "Activated";


            } else {
                var status = 0;

                var stat = "Deactivated";


            }



            Swal.fire({
                title: 'Are you sure?',
                text: 'Change the status of the "' + el.getAttribute('data-name') + '" category to ' + stat + '?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, change it'
            }).then((result) => {
                if (result.isConfirmed) {
                    categoryChangeConfirmed(el.getAttribute('data-id'), status, el);
                }
            });


        }

        function categoryChangeConfirmed(id, status, el) {

            $.ajax({
                url: "{{ route('admin.news.category.status.update') }}",
                type: "POST",
                data: {
                    id: id,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Updated!',
                            text: 'Status changed successfully',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        if (response.data == 0) {
                            el.checked = false;
                        } else {
                            el.checked = true;
                        }



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
