 <nav aria-label="Page navigation example">
    @if ($paginator->lastPage() > 1)
    <ul class="pagination mt-50">
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
        @endfor
    </ul>
    @endif
</nav>