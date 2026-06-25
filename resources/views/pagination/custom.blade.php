@if ($paginator->hasPages())
<nav>
    <div class="flex items-center gap-1">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg cursor-not-allowed"
              style="background:#F1F5F9; color:#CBD5E1; border:1px solid #E2E8F0;">
            <i class="fas fa-chevron-left"></i>
        </span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:#fff; color:#278EA5; border:1px solid rgba(39,142,165,0.35);"
           onmouseover="this.style.background='#EEF9F7'; this.style.color='#278EA5'; this.style.borderColor='#278EA5';"
           onmouseout="this.style.background='#fff'; this.style.color='#278EA5'; this.style.borderColor='rgba(39,142,165,0.35)';">
            <i class="fas fa-chevron-left"></i>
        </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold"
              style="color:#94A3B8;">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-black rounded-lg"
              style="background:linear-gradient(135deg,#278EA5,#21E6C1); color:#fff; border:1px solid transparent;">{{ $page }}</span>
        @else
        <a href="{{ $url }}"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:#fff; color:#64748B; border:1px solid #E2E8F0;"
           onmouseover="this.style.background='#EEF9F7'; this.style.color='#278EA5'; this.style.borderColor='#278EA5';"
           onmouseout="this.style.background='#fff'; this.style.color='#64748B'; this.style.borderColor='#E2E8F0';">
            {{ $page }}
        </a>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:#fff; color:#278EA5; border:1px solid rgba(39,142,165,0.35);"
           onmouseover="this.style.background='#EEF9F7'; this.style.color='#278EA5'; this.style.borderColor='#278EA5';"
           onmouseout="this.style.background='#fff'; this.style.color='#278EA5'; this.style.borderColor='rgba(39,142,165,0.35)';">
            <i class="fas fa-chevron-right"></i>
        </a>
        @else
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg cursor-not-allowed"
              style="background:#F1F5F9; color:#CBD5E1; border:1px solid #E2E8F0;">
            <i class="fas fa-chevron-right"></i>
        </span>
        @endif
    </div>
</nav>
@endif