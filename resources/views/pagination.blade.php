@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden pagination new_pagination">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            @endif

            @foreach ($elements as $element)
           
            @if (is_string($element))
                <a class="paginate_button page-link" aria-controls="example2" data-dt-idx="{{ $element }}" tabindex="0">{{ $element }}</a>
            @endif

        <!--    <div> -->
           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                        <a class="paginate_button current page-link" aria-controls="example2" data-dt-idx="1" tabindex="0">{{ $page }}</a>
                    @else
                      

                        <a href="{{ $url }}"class="paginate_button page-link" aria-controls="example2" data-dt-idx="1" tabindex="0">{{ $page }}</a>

                    @endif
                @endforeach
            @endif
        @endforeach

     <!--    </div> -->


            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
    </nav>
@endif

<style type="text/css">
.new_pagination a{
    padding: 5px 14px;
    margin: 0px 6px;
}
.new_pagination .current{
    color: white!important;
   background-color: #ffba33!important;
}
.dataTables_wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 57px 0px 0px;
}
.page-link:hover {
    color: white!important;
    background: #ffba33!important;
}
</style>
