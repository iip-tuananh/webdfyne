<div class="grid grid--uniform small--grid--flush" data-scroll-to>

    @foreach($productVariants as $variant)
        @include('site.partials.product_card', ['variant' => $variant])
    @endforeach

</div>
