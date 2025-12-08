@if ($paginator->hasPages())

    @if ($paginator->onFirstPage())
        <a class="btn btn-primary" href="#"><i class="tio-back_ui"></i> Previous</a>
    @else
        <a class="btn btn-primary" href="{{ $paginator->previousPageUrl() }}">
            <i class="tio-back_ui"></i> Previous</a>
    @endif


    <a class="btn" href="#"> {{ $paginator->currentPage() }} </a>


    @if ($paginator->hasMorePages())
        <a class="btn btn-primary" href="{{ $paginator->nextPageUrl() }}">Next <i class="tio-next_ui"></i></a>
    @else
        <a class="btn btn-primary" href="#">Next <i class="tio-next_ui"></i></a>
    @endif

@endif
