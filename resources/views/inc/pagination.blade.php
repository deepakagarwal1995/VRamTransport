

 <div class="mt-4 flex items-center justify-between w-full px-4 py-2 mx-auto flex-wrap-inherit  mb-4 bg-clip-border bg-gray-50">
     @if ($items->hasPages())
    <div class="pagination-wrapper">
         {{ $items->links() }}
    </div>
@endif
 </div>
