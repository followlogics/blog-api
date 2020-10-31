@if ($paginator->hasPages())
    <ul class="pagination" _vik>

        @if ($paginator->onFirstPage())
            <li class="disabled" _vik><span _vik>PREV</span></li>
        @else
            <li _vik><a _vik href="{{ $paginator->previousPageUrl() }}" rel="prev">PREV</a></li>
        @endif

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled" _vik><span _vik>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" _vik><span _vik>{{ $page }}</span></li>
                    @else
                        <li _vik><a _vik href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li _vik><a _vik href="{{ $paginator->nextPageUrl() }}" rel="next">NEXT</a></li>
        @else
            <li _vik class="disabled"><span _vik>NEXT</span></li>
        @endif
    </ul>
@endif