<div>
    {!! new InnoBrig\Paginator\Paginator($PaginatorTotalItems, env('PAGINATOR_IEMTS_PER_PAGE'), $PaginatorCurrentPage, \App\Helper::url('page/(:num)'))!!}
</div>