@section('title', 'Question List')
@section('description', 'Question List')
@section('keywords', 'Question List')
@section('css')
    <style>
        :root {
            --primary-color: #ef5350;
            --primary-dark: #e53935;
            --secondary-color: #3b82f6;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-light: #9ca3af;
            --bg-primary: #ffffff;
            --bg-secondary: #f9fafb;
            --bg-tertiary: #f3f4f6;
            --border-color: #e5e7eb;
            --hover-color: #fafafa;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef5350;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --transition: all 0.2s ease;
        }



        .question-list-wrapper {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Header Section */
        .list-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .list-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .list-subtitle {
            font-size: 15px;
            color: var(--text-secondary);
            margin: 0;
            font-weight: 400;
        }

        /* Questions Container */
        .questions-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Question Item */
        .question-item {
            background: var(--bg-primary);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .question-item:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.08);
            background-color: var(--hover-color);
        }

        /* Question Content */
        .question-content {
            display: flex;
            align-items: center;
            gap: 16px;
            flex: 1;
        }

        .question-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #f24545 100%);
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(239, 83, 80, 0.2);
        }

        .question-info {
            flex: 1;
        }

        .question-name {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 4px 0;
            letter-spacing: -0.2px;
        }

        .question-meta {
            font-size: 13px;
            color: var(--text-light);
            margin: 0;
        }

        /* Question Actions */
        .question-actions {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 14px;
            border: none;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            letter-spacing: -0.2px;
        }

        .btn-edit {
            background: var(--primary-color);
            color: white;
        }

        .btn-edit:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.3);
        }

        .btn-edit:active {
            transform: translateY(0);
        }

        .btn-delete {
            background: #fee2e2;
            color: var(--danger);
        }

        .btn-delete:hover {
            background: var(--danger);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 83, 80, 0.3);
        }

        .btn-delete:active {
            transform: translateY(0);
        }

        .btn-action i {
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--bg-primary);
            border: 2px dashed var(--border-color);
            border-radius: var(--radius-lg);
        }

        .empty-state i {
            font-size: 64px;
            color: var(--text-light);
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .list-title {
                font-size: 24px;
            }

            .question-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .question-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .btn-action {
                flex: 1;
                justify-content: center;
            }

            .list-header {
                margin-bottom: 24px;
            }
        }
    </style>
@stop
@extends('layouts.master')
@section('content')

    <style>
        .input-group {
            flex-wrap: nowrap;
        }
    </style>

    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        {{-- <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">Question List</h2>
        </div> --}}
        <!-- End. title -->

        {{-- <div class="bg-white padding-20">
            @foreach ($quiz_list as $ql)
                <span>{{ $ql->name }}</span>
                <div class="mt-2">
                    <a href="{{ url('edit-question') }}/{{ $ql->id }}" class="btn btn-sm btn-danger"> <i
                            class="tio-edit"></i> Edit</a>
                    @if (auth()->user()->role == 'Admin')
                        <a href="{{ url('delete-question') }}/{{ $ql->id }}" class="btn btn-sm btn-danger"> <i
                                class="tio-delete"></i> Delete</a>
                    @endif
                </div>
                <hr>
            @endforeach




            <div class="row">
                <div class="col-sm-12">
                    {{ $quiz_list->links('custom-pagination') }}
                </div>
            </div>
            <br>


        </div> --}}

        <div class="question-list-wrapper padding-20">
            <!-- Header Section -->
            <div class="list-header mb-5">
                <h1 class="list-title">Question List</h1>
                <p class="list-subtitle">Manage your quiz questions and content</p>
            </div>

            <!-- Questions Container -->
            <div class="questions-container">
                <!-- Question Item 1 -->
                @foreach ($quiz_list as $ql)
                    <div class="question-item">
                        <div class="question-content">
                            <div class="question-icon">
                                <i class="bi bi-bookmark-fill"></i>
                            </div>
                            <div class="question-info">
                                <h3 class="question-name">{{ $ql->name }}</h3>
                                {{-- <p class="question-meta">&nbsp;</p> --}}
                            </div>
                        </div>
                        <div class="question-actions">
                            <a href="{{ url('edit-question') }}/{{ $ql->id }}" class="btn-action btn-edit" title="Edit question">
                                <i class="bi bi-pencil"></i>
                                <span>Edit</span>
                            </a>
                            @if (auth()->user()->role == 'Admin')
                            <a href="{{ url('delete-question') }}/{{ $ql->id }}" class="btn-action btn-delete" title="Delete question">
                                <i class="bi bi-trash"></i>
                                <span>Delete</span>
                            </a>
                            @endif
                        </div>
                    </div>
                 @endforeach

            </div>
            <div class="row my-4 text-center">
                <div class="col-sm-12">
                    {{ $quiz_list->links('custom-pagination') }}
                </div>
            </div>
            <!-- Empty State (hidden by default) -->
            <div class="empty-state d-none">
                <i class="bi bi-inbox"></i>
                <h3>No Questions Yet</h3>
                <p>Start by creating your first question group</p>
                <button class="btn btn-primary">Create Question</button>
            </div>
        </div>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
            crossorigin="anonymous"></script>
        <ins class="adsbygoogle" style="display:block" data-ad-format="autorelaxed" data-ad-client="ca-pub-3729413945402608"
            data-ad-slot="3594762825"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>


        <br>
        <br>
        <br>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br> <br>
        <br>
        <br>
    </section>
@endsection

@section('script')
    <script type="text/javascript"></script>
@endsection
