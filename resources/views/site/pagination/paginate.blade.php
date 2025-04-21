
@if ($paginator->hasPages())
        @if (!$paginator->onFirstPage())
            <a class="pagination__item group"  rel="prev" aria-label="Go to page 1" data-href="{{ $paginator->previousPageUrl() }}">
                <span class="animated-arrow animated-arrow--reverse"></span>
            </a>
        @else
            <span class="pagination__item pagination__item--disabled">
        <span class="animated-arrow animated-arrow--reverse"></span>
      </span>
        @endif

            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination__current">{{ $page }}   /   {{ $paginator->lastPage() }}</span>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                    <a class="pagination__item group"  rel="next" data-href="{{ $paginator->nextPageUrl() }}"
                       aria-label="Go to page 2" >
            <span class="animated-arrow">
            </span>
                </a>
            @else
                <span class="pagination__item pagination__item--disabled">
        <span class="animated-arrow"></span>
      </span>
            @endif

@endif

