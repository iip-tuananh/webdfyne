@extends('site.layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')
    <main class="main-content" id="MainContent">
        <section id="shopify-section-template--18169556205661__main" class="shopify-section"><div class="page-width page-width--narrow page-content">
                <header class="section-header">
                    <h1 class="section-header__title">{{ $privacy->title }}</h1>
                </header>

                <div class="rte rte--nomargin">
                    {!! $privacy->body !!}
                </div>
            </div>


        </section>


        <div id="shopify-section-template--18159281602653__16508169396cdfd180" class="shopify-section index-section">
            <div id="CollectionSection-template--18159281602653__16508169396cdfd180" data-section-id="template--18159281602653__16508169396cdfd180" data-section-type="collection-grid" data-context="featured-collection"><div class="page-width">
                    <div class="section-header section-header--with-link">
                        <h2 class="section-header__title">
                            {{ $category->name }}
                        </h2>
                        <a href="{{route('front.getProductListFeatured', $category->slug)}}" class="btn btn--secondary btn--small section-header__link">Xem tất cả</a>
                    </div>
                </div>
                <div class="page-width page-width--flush-small">
                    <div class="grid-overflow-wrapper">
                        <div class="grid grid--uniform aos-init aos-animate" data-aos="overflow__animation">

                            @foreach($productVariants as $variant)
                                @include('site.partials.product_card', ['variant' => $variant])
                            @endforeach



                            <div class="grid__item grid__item--view-all text-center small--one-half medium-up--one-quarter medium-up--hide">
                                <a href="{{route('front.getProductListFeatured', $category->slug)}}" class="grid-product__see-all">
                                    Xem tất cả<br>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both"></div></div>
            </div>
        </div>



    </main>

@endsection

@section('extends')

@endsection

@push('scripts')
    <script>

    </script>
@endpush
