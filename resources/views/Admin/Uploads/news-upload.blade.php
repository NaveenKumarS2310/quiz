@extends('Admin.master-layouts.admin-master')
@section('title', 'News Upload')
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
    <style>
        .news-list img {
            width: 100% !important;
            margin-bottom: 5px !important;
        }

        .content-preview.collapsed {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 7;
            /* show 4 lines */
            overflow: hidden;
        }

        .content-preview.expanded {
            -webkit-line-clamp: unset;
        }

        .rich-text-content img {
            max-width: 100%;
            max-height: 180px;
            object-fit: cover;
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
                </span> News Upload - @if (request()->route()->getName() == 'admin.news.upload.edit.index')
                    Update
                @else
                    Create
                @endif
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
                        <h4 class="card-title">News Upload</h4>
                        <p class="card-description"> create Or update </p>
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
                        @if (request()->route()->getName() == 'admin.news.upload.edit.index')
                            <form action="{{ route('admin.news.upload.edit.store') }}" method="POST"
                                enctype="multipart/form-data">
                            @else
                                <form class="forms-sample" action="{{ route('admin.news.upload.create.store') }}"
                                    method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($_GET['id']) }}">
                        <div class="form-group">
                            <label>
                                Select your category <span class="text-danger">*</span>
                            </label>

                            <select name="article_category_id" class="form-control">
                                <option value="">Select Category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('article_category_id', $article->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" name="article_title" class="form-control"
                                value="{{ old('article_title', $article->title ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>Content <span class="text-danger">*</span></label>
                            <textarea name="article_content" id="editor" class="form-control">{{ old('article_content', $article->content ?? '') }}</textarea>
                        </div>
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" name="article_status" value="1" class="form-check-input"
                                    {{ old('status', $article->status ?? 0) ? 'checked' : '' }}>
                                Status
                                <i class="input-helper"></i>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" id="saveArticle">Save Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- ================= NEWS LIST ================= --}}
        {{-- <div class="row mt-4 news-list">
            <div class="col-12 mb-3">
                <h4 class="card-title">News List</h4>
                <h4 class="card-title float-end">Total News : {{ $articles->total() }}</h4>

            </div>

            @forelse ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-2">{{ $article->title }}</h5>
                            <div class="content-preview text-muted">
                                
                                {!! Str::limit(strip_tags($article->content, '<img><br>'), 500) !!}
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                data-target="#previewModal-{{ $article->id }}">
                                Preview
                            </button>

                            <a href="{{ route('admin.news.upload.edit.index', ['id' => $article->id,'page'=> isset($_GET['page']) ? $_GET['page'] : 1 ]) }}"
                                class="btn btn-sm btn-outline-success">
                                Edit
                            </a>

                            <label class="switch">
                                <input type="checkbox" class="toggle-status" data-id="{{ $article->id }}"
                                    data-name="{{ $article->title }}" {{ $article->status ? 'checked' : '' }}
                                    onclick="category_update(event, this)">
                                <span class="slider round"></span>
                            </label>



                        </div>
                    </div>
                </div>

                <div class="modal fade" id="previewModal-{{ $article->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $article->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                {!! $article->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No news found.</div>
                </div>
            @endforelse

            @if (request()->route()->getName() != 'admin.news.upload.edit.index')

            <div class="d-flex justify-content-end mt-4">
                {{ $articles->links() }}
            </div>

            @endif
        </div> --}}
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Job Category</h4>
                        <div class="table-responsive"></div>
                        <table id="categoryTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $article->title }}</td>
                                        <td class="text-center">
                                            <label class="switch">
                                                <input type="checkbox" onclick="category_update(event,this)"
                                                    class="toggle-status" data-id="{{ $article->id }}"
                                                    data-name="{{ $article->title }}"
                                                    {{ $article->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                                data-target="#previewModal-{{ $article->id }}">
                                                Preview
                                            </button>
                                            <a href="{{ route('admin.news.upload.edit.index', ['id' => $article->id, 'page' => isset($_GET['page']) ? $_GET['page'] : 1]) }}"
                                                class="btn btn-sm btn-outline-success">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="previewModal-{{ $article->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $article->title }}</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $article->content !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#editor').summernote({
            height: 300,
            placeholder: 'Write your content here...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    </script>
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
                url: "{{ route('admin.news.upload.status.update') }}",
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
        $('#saveArticle').click(function() {
            $.ajax({
                @if (request()->route()->getName() == 'admin.news.upload.edit.index')
                    url: "{{ route('admin.news.category.edit.store') }}",
                @else
                    url: "{{ route('admin.news.category.create.store') }}",
                @endif
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
        });
    </script>
@stop
