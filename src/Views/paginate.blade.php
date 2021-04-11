<div>
    {!! new InnoBrig\Paginator\Paginator($PaginatorTotalItems, env('PAGINATOR_IEMTS_PER_PAGE'), $PaginatorCurrentPage, \App\Helper::urlWithParameters('page/(:num)',[],false))!!}
</div>