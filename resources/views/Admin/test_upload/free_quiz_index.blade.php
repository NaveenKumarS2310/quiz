@extends('Admin.master-layouts.admin-master')
@section('title', 'Free Test')
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
                </span> Free Test Master
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
                        <h4 class="card-title">Free Test Master Add</h4>
                        <p class="card-description"> create Test Master </p>


                        <form class="forms-sample" action="{{ route('upload.free-quiz.store') }}" method="POST">
                            @csrf

                            {{-- Correct hidden id --}}
                            <input type="hidden" name="id" value="{{ request('id') }}">

                            <div class="row">
                                {{-- Test Name --}}
                                <div class="form-group col-md-6">
                                    <label>Test Name <span class="text-danger">*</span></label>
                                    <input type="text" name="test_name"
                                        class="form-control @error('test_name') is-invalid @enderror"
                                        placeholder="Enter your Test name" value="{{ old('test_name') }}">

                                    @error('test_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="form-group col-md-6">
                                    <label>Select your category <span class="text-danger">*</span></label>
                                    <select name="test_category"
                                        class="form-control @error('test_category') is-invalid @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('test_category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('test_category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- URL Name --}}
                                <div class="form-group col-md-6">
                                    <label>URL Name <span class="text-danger">*</span></label>
                                    <input type="text" name="url_name"
                                        class="form-control @error('url_name') is-invalid @enderror"
                                        placeholder="Enter your URL name" value="{{ old('url_name') }}">

                                    @error('url_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Token <span class="text-danger">*</span></label>
                                    <input type="number" name="token"
                                        class="form-control @error('token') is-invalid @enderror"
                                        placeholder="Enter number of token" value="{{ old('token') }}">

                                    @error('token')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Optional global error block --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    Please correct the highlighted fields.
                                </div>
                            @endif

                            {{-- Success message --}}
                            @if (session('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
@stop
@section('js')

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
@stop
