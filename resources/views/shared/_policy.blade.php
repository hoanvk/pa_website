@isset($product)
    @if ($product->product_type == 'PA')
        @include('pa._policy')
    @elseif ($product->product_type == 'TVL')
        @include('travel._policy')
    @endif
@endisset
