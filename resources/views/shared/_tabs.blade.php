@isset($product)
    @if ($product->product_type == 'PA')
        @include('pa._tabs')
    @elseif ($product->product_type == 'TVL')
        @include('travel._tabs')
    @endif
@endisset