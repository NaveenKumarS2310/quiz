@section('title', 'Question List')
@section('description', 'Question List')
@section('keywords', 'Question List')

@extends('layouts.master')
@section('content')

    <style>
        .input-group {
            flex-wrap: nowrap;
        }
    </style>

    <section class="emPage__public padding-t-70">

        <!-- Start title -->
        <div class="emTitle_co padding-20">
            <h2 class="size-16 weight-500 color-secondary mb-1">Question List</h2>
        </div>
        <!-- End. title -->

        <div class="bg-white padding-20">
            @foreach ($quiz_list as $ql)
                <span>{{ $ql->name }}</span>
                <div class="mt-2">
                    <a href="{{ url('edit-question') }}/{{ $ql->id }}" class="btn btn-sm btn-danger"> <i
                            class="tio-edit"></i> Edit</a>
                    @if(auth()->user()->role == 'Admin')
                        <a href="{{ url('delete-question') }}/{{ $ql->id }}" class="btn btn-sm btn-danger"> <i class="tio-delete"></i> Delete</a>
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
           

        </div>
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3729413945402608"
             crossorigin="anonymous"></script>
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="autorelaxed"
             data-ad-client="ca-pub-3729413945402608"
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
