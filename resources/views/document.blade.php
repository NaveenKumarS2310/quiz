@section('title', 'Home Page')
@section('description', 'Home Page')
@section('keywords', 'Home Page')

@extends('layouts.master')
@section('css')
    <style>
        .welcome {
            position: relative;
            margin-bottom: 20px;
        }

        .greeting {
            color: #888;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            color: #222;
        }

        .coins {
            position: absolute;
            top: 0;
            right: 0;
            background: #FFF3E0;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        /* Quizzes Section */
        .quizzes-section {
            margin-bottom: 20px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .see-all {
            color: #FF6B6B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .quiz-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .quiz-item {
            background: white;
            padding: 16px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-left: 4px solid #FF6B6B;
        }

        .quiz-content {
            flex: 1;
        }

        .quiz-tags {
            display: flex;
            gap: 6px;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .tag {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .tag-new {
            background: #E8F5E9;
            color: #4CAF50;
        }

        .tag-easy {
            background: #E8F5E9;
            color: #4CAF50;
        }

        .tag-medium {
            background: #FFF3E0;
            color: #FF9800;
        }

        .tag-hard {
            background: #FFEBEE;
            color: #F44336;
        }

        .tag-category {
            background: #F5F5F5;
            color: #666;
        }

        .quiz-title {
            font-size: 15px;
            font-weight: 600;
            color: #222;
            margin-bottom: 8px;
        }

        .quiz-meta {
            display: flex;
            gap: 16px;
            font-size: 12px;
            color: #888;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .play-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FF6B6B, #FF8787);
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        /* Community Banner */
        .community-banner {
            background: linear-gradient(135deg, #4FC3F7, #29B6F6);
            padding: 20px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(41, 182, 246, 0.3);
        }

        .banner-icon {
            font-size: 28px;
        }

        .banner-content {
            flex: 1;
        }

        .banner-content h3 {
            color: white;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .banner-content p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
        }

        .join-btn {
            background: white;
            color: #29B6F6;
            border: none;
            padding: 10px 24px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
   <div class="row mt-4 document-list">
            <div class="col-12 mb-3">
                <h4 class="card-title">Document List</h4>
                <h4 class="card-title float-end">Total Documents : {{ $articles->total() }}</h4>

            </div>

            @forelse ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="mb-2">{{ $article->title }}</h5>
                            <div class="content-preview text-muted">
                                {{-- {!! Str::limit(strip_tags($article->content), 200) !!} --}}
                                {{-- {!! $article->content !!} --}}
                                {!! Str::limit(strip_tags($article->content, '<img><br>'), 500) !!}
                            </div>
                        </div>

                   
                    </div>
                </div>

               
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No documents found.</div>
                </div>
            @endforelse

            @if (request()->route()->getName() != 'admin.document.upload.edit.index')
                <div class="d-flex justify-content-end mt-4">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
@endsection
