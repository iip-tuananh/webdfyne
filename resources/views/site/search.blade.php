@extends('site.layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')
    <main class="main-content" id="MainContent" ng-controller="productCategory">
        <div id="shopify-section-template--18169557024861__main" class="shopify-section">
            <div class="search-content" data-section-id="template--18169557024861__main" data-section-type="collection-grid">
                <div class="page-width page-content">
                    <header class="section-header">
                        <h1 class="section-header__title">
                            Tìm kiếm
                        </h1>
                    </header>
                    <predictive-search data-context="search-page" data-enabled="true" data-dark="false">
                        <div class="predictive__screen" data-screen=""></div>
                        <form action="#" method="get" role="search">
                            <label for="Search" class="hidden-label">Search</label>
                            <div class="search__input-wrap">
                                <input class="search__input" id="Search" type="search" name="q"
                                       role="combobox"
                                       ng-model="keyword"
                                       aria-expanded="false" aria-owns="predictive-search-results"
                                       aria-controls="predictive-search-results"
                                       aria-haspopup="listbox" aria-autocomplete="list" autocorrect="off" autocomplete="off"
                                       autocapitalize="off" spellcheck="false" placeholder="Search" tabindex="0">
                                <input name="options[prefix]" type="hidden" value="last">
                                <button class="btn--search" type="button" ng-click="search()">
                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 64 64"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:2px}</style></defs><path class="cls-1" d="M47.16 28.58A18.58 18.58 0 1 1 28.58 10a18.58 18.58 0 0 1 18.58 18.58zM54 54L41.94 42"></path></svg>
                                    <span class="icon__fallback-text">Search</span>
                                </button>
                            </div>

                            <button class="btn--close-search">
                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:2px}</style></defs><path class="cls-1" d="M19 17.61l27.12 27.13m0-27.13L19 44.74"></path></svg>
                            </button>
                            <div id="predictive-search" class="search__results" tabindex="-1"></div>
                        </form>
                    </predictive-search>
                    <hr class="hr--medium">

                    <div class="section-header"></div>
                    <div id="CollectionAjaxContent" class="grid grid--uniform" data-scroll-to="">

                        <div class="grid__item medium-up--four-fifths-search grid__item--content">

                            <div class="collection-grid__wrapper">
                                <div class="collection-filter" style="top: 94px;">
                                    <div class="collection-filter__item collection-filter__item--drawer">
                                        <button type="button" class="js-drawer-open-collection-filters btn btn--tertiary" aria-controls="FilterDrawer" aria-expanded="false">
                                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-filter" viewBox="0 0 64 64"><title>icon-filter</title><path d="M48 42h10m-10 0a5 5 0 1 1-5-5 5 5 0 0 1 5 5ZM7 42h31M16 22H6m10 0a5 5 0 1 1 5 5 5 5 0 0 1-5-5Zm41 0H26"></path></svg>
                                            Filter
                                        </button>
                                    </div>

                                    <div class="collection-filter__item collection-filter__item--count small--hide">{{ $productVariants->count() }} kết quả
                                    </div>

{{--                                    <div class="collection-filter__item collection-filter__item--sort">--}}
{{--                                        <div class="collection-filter__sort-container"><label for="SortBy" class="hidden-label">Sort</label>--}}
{{--                                            <select name="SortBy" id="SortBy" data-default-sortby="relevance">--}}
{{--                                                <option value="title-ascending" selected="selected">Sort</option><option value="relevance" selected="selected">Relevance</option><option value="price-ascending">Price, low to high</option><option value="price-descending">Price, high to low</option></select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                                <div class="ias-spinner ias-spinner-prev" id="ias_spinner_prev_1745790219267" style="display: none;"><img src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTBweCIgaGVpZ2h0PSI1MHB4IiB2aWV3Qm94PSIwIDAgNDAgNDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDQwIDQwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4KICAgICAgPHBhdGggb3BhY2l0eT0iMSIgZmlsbD0iIzAwMDAwMCIgZD0iTTIwLjIwMSw1LjE2OWMtOC4yNTQsMC0xNC45NDYsNi42OTItMTQuOTQ2LDE0Ljk0NmMwLDguMjU1LDYuNjkyLDE0Ljk0NiwxNC45NDYsMTQuOTQ2JiMxMDsgICAgICAgIHMxNC45NDYtNi42OTEsMTQuOTQ2LTE0Ljk0NkMzNS4xNDYsMTEuODYxLDI4LjQ1NSw1LjE2OSwyMC4yMDEsNS4xNjl6IE0yMC4yMDEsMzEuNzQ5Yy02LjQyNSwwLTExLjYzNC01LjIwOC0xMS42MzQtMTEuNjM0JiMxMDsgICAgICAgIGMwLTYuNDI1LDUuMjA5LTExLjYzNCwxMS42MzQtMTEuNjM0YzYuNDI1LDAsMTEuNjMzLDUuMjA5LDExLjYzMywxMS42MzRDMzEuODM0LDI2LjU0MSwyNi42MjYsMzEuNzQ5LDIwLjIwMSwzMS43NDl6Ii8+CiAgICAgIDxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik0yNi4wMTMsMTAuMDQ3bDEuNjU0LTIuODY2Yy0yLjE5OC0xLjI3Mi00Ljc0My0yLjAxMi03LjQ2Ni0yLjAxMmgwdjMuMzEyaDAmIzEwOyAgICAgICAgQzIyLjMyLDguNDgxLDI0LjMwMSw5LjA1NywyNi4wMTMsMTAuMDQ3eiI+CiAgICAgICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlVHlwZT0ieG1sIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyMCAyMCIgdG89IjM2MCAyMCAyMCIgZHVyPSIwLjVzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIvPgogICAgICAgIDwvcGF0aD4KICAgIDwvc3ZnPg=="><span><em>Loading ...</em></span></div><div class="ias-trigger ias-trigger-prev" id="ias_trigger_prev_1745790219267" style="display: none;"><button class="load-more load-prev"></button></div><div class="grid grid--uniform infinitescroll-grid">

                                    @foreach($productVariants as $variant)
                                        @include('site.partials.product_card', ['variant' => $variant])
                                    @endforeach

                                    <magepow-infinitescroll style="display:none">🚀</magepow-infinitescroll>
                                </div><div class="ias-trigger ias-trigger-next" id="ias_trigger_next_1745790219267" style="display: none;"><button class="load-more load-next">Load More</button></div><div class="ias-spinner ias-spinner-next" id="ias_spinner_next_1745790219267" style="display: none;"><img src="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTBweCIgaGVpZ2h0PSI1MHB4IiB2aWV3Qm94PSIwIDAgNDAgNDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDQwIDQwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4KICAgICAgPHBhdGggb3BhY2l0eT0iMSIgZmlsbD0iIzAwMDAwMCIgZD0iTTIwLjIwMSw1LjE2OWMtOC4yNTQsMC0xNC45NDYsNi42OTItMTQuOTQ2LDE0Ljk0NmMwLDguMjU1LDYuNjkyLDE0Ljk0NiwxNC45NDYsMTQuOTQ2JiMxMDsgICAgICAgIHMxNC45NDYtNi42OTEsMTQuOTQ2LTE0Ljk0NkMzNS4xNDYsMTEuODYxLDI4LjQ1NSw1LjE2OSwyMC4yMDEsNS4xNjl6IE0yMC4yMDEsMzEuNzQ5Yy02LjQyNSwwLTExLjYzNC01LjIwOC0xMS42MzQtMTEuNjM0JiMxMDsgICAgICAgIGMwLTYuNDI1LDUuMjA5LTExLjYzNCwxMS42MzQtMTEuNjM0YzYuNDI1LDAsMTEuNjMzLDUuMjA5LDExLjYzMywxMS42MzRDMzEuODM0LDI2LjU0MSwyNi42MjYsMzEuNzQ5LDIwLjIwMSwzMS43NDl6Ii8+CiAgICAgIDxwYXRoIGZpbGw9IiNmZmZmZmYiIGQ9Ik0yNi4wMTMsMTAuMDQ3bDEuNjU0LTIuODY2Yy0yLjE5OC0xLjI3Mi00Ljc0My0yLjAxMi03LjQ2Ni0yLjAxMmgwdjMuMzEyaDAmIzEwOyAgICAgICAgQzIyLjMyLDguNDgxLDI0LjMwMSw5LjA1NywyNi4wMTMsMTAuMDQ3eiI+CiAgICAgICAgPGFuaW1hdGVUcmFuc2Zvcm0gYXR0cmlidXRlVHlwZT0ieG1sIiBhdHRyaWJ1dGVOYW1lPSJ0cmFuc2Zvcm0iIHR5cGU9InJvdGF0ZSIgZnJvbT0iMCAyMCAyMCIgdG89IjM2MCAyMCAyMCIgZHVyPSIwLjVzIiByZXBlYXRDb3VudD0iaW5kZWZpbml0ZSIvPgogICAgICAgIDwvcGF0aD4KICAgIDwvc3ZnPg=="><span><em>Loading ...</em></span></div>
                            </div>
                            <style data-shopify="">
                                @media screen and (min-width: 769px) {
                                    .collection-filter__item--drawer {
                                        display: none;
                                    }
                                    .collection-filter__item--count {
                                        text-align: left;
                                    }
                                    html[dir="rtl"] .collection-filter__item--count {
                                        text-align: right;
                                    }
                                }
                            </style>

                        </div>
                    </div>
                    <div style="clear:both"></div></div>
            </div>


        </div>
    </main>
@endsection

@section('extends')
    <div id="VideoModal" class="modal modal--solid">
        <div class="modal__inner">
            <div class="modal__centered page-width text-center">
                <div class="modal__centered-content">
                    <div class="video-wrapper video-wrapper--modal">
                        <div id="VideoHolder"></div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="modal__close js-modal-close text-link">
            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
            <span class="icon__fallback-text">"Close (esc)"</span>
        </button>
    </div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <button class="btn btn--body btn--circle pswp__button pswp__button--arrow--left" title="Previous">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><path d="M249.49 0a35 35 0 0 1 24.75 59.75L84.49 249.49l189.75 189.74a35.002 35.002 0 1 1-49.5 49.5L10.25 274.24a35 35 0 0 1 0-49.5L224.74 10.25A34.89 34.89 0 0 1 249.49 0Z"/></svg>
                </button>

                <button class="btn btn--body btn--circle btn--large pswp__button pswp__button--close" title="Close (esc)">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
                </button>

                <button class="btn btn--body btn--circle pswp__button pswp__button--arrow--right" title="Next">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98"><title>icon-chevron</title><path d="M35 498.98a35 35 0 0 1-24.75-59.75l189.74-189.74L10.25 59.75a35.002 35.002 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L59.75 488.73A34.89 34.89 0 0 1 35 498.98Z"/></svg>
                </button>
            </div>
        </div>
    </div>
    <tool-tip data-tool-tip="">
        <div class="tool-tip__inner" data-tool-tip-inner>
            <button class="tool-tip__close" data-tool-tip-close=""><svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg></button>
            <div data-tool-tip-title>Joggers - Mens</div>
            <div class="tool-tip__content" data-tool-tip-content>
            </div>
        </div>
    </tool-tip>

    <template id="naturalImageMarkup">
        <div class="image-wrap" style="height: 0;">
            <image-element data-aos="image-fade-in" data-aos-offset="150">
                <img class="grid-product__image image-element" width height src srcset loading="lazy" alt>
            </image-element>
        </div>
    </template>
    <template id="fixedRatioImageMarkup">
        <div class="grid__image-ratio">
            <image-element data-aos="image-fade-in" data-aos-offset="150">
                <img class="image-element" width height src srcset loading="lazy" alt>
            </image-element>
        </div>
    </template>


    <script>
        (function(w,d,t,s,n,p,e,z){
            w['NaizFitSizeFormObject'] = n;
            a=d.createElement(t),
                m=d.getElementsByTagName(t)[0];
            a.async = 1;
            a.src = s;
            a.onload = function() {
                w[n] = new w.naizjs.SizeForm({ partnerKey: p, endpoint: e, mode: z})
            }
            m.parentNode.insertBefore(a, m)
        }) (window, document, 'script', 'https://backend.production.naiz.fit/bundle', 'nfsfo', 'e602a67a6d7d79e0e4e6075fc3d9d3af', 'https://backend.production.naiz.fit/api/partners');
    </script>

    <style>  </style>
    <div id="shopify-block-AR2FMSW9nNERWcU9kV__6174324309569838175" class="shopify-block shopify-app-block">


        <div class="smile-shopify-init"
             data-channel-key="channel_R2Pa8rhJdoQ83FJF02s72Zmd"

        ></div>


    </div>
    <div id="shopify-block-AVFIySTFEaVpmWUFPS__144831480468751239" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: vite-tag -->


        <script>
            (function(w,d,t,s,n,p,e,z){
                w['NaizFitSizeFormObject'] = n;
                a=d.createElement(t),
                    m=d.getElementsByTagName(t)[0];
                a.async = 1;
                a.src = s;
                a.onload = function() {
                    w[n] = new w.naizjs.SizeForm({ partnerKey: p, endpoint: e, mode: z})
                }
                m.parentNode.insertBefore(a, m)
            }) (window, document, 'script', 'https://backend.production.naiz.fit/bundle', 'nfsfo', 'e602a67a6d7d79e0e4e6075fc3d9d3af', 'https://backend.production.naiz.fit/api/partners');
        </script>

        <style>  </style>
        <div id="shopify-block-AVFIySTFEaVpmWUFPS__144831480468751239" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: vite-tag -->


            <script src="/site/js/app-embed-DZ0oyfQO.js" type="module" crossorigin="anonymous"></script>
            <link rel="modulepreload" href="https://cdn.shopify.com/extensions/73db0107-382a-40b4-8a78-ef536cfa0614/essential-upsell-138/assets/stylex-9DS1jsY4.js" crossorigin="anonymous">
            <link href="/site/css/stylex-DFEZgduC.css" rel="stylesheet" type="text/css" media="all" />

            <!-- END app snippet -->

            <essential-upsell-app-embed
                upsell-app-data="{&quot;funnels&quot;:[{&quot;id&quot;:&quot;02ccd4be-24a1-4591-a4ec-3547c0942e81&quot;,&quot;content&quot;:{&quot;offerType&quot;:&quot;CROSS_SELL&quot;,&quot;titleText&quot;:&quot;You may also like&quot;,&quot;buttonText&quot;:&quot;Add&quot;},&quot;upsell&quot;:{&quot;productsType&quot;:&quot;SPECIFIC&quot;,&quot;discountType&quot;:&quot;NONE&quot;,&quot;discountValue&quot;:null,&quot;specificProducts&quot;:[{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7237855379549&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-pink-apparel-accessories-240112&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7237855445085&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240112&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7551498616925&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240303&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208654941&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-midnight-black-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208687709&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-pistachio-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208720477&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-ice-blue-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208753245&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-light-rose-pink-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7551498584157&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240302&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7551498551389&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240301&quot;}]},&quot;design&quot;:{&quot;layoutType&quot;:&quot;STACKED&quot;,&quot;stackedProductsCount&quot;:1,&quot;backgroundType&quot;:&quot;MONOCHROME&quot;,&quot;monochromeBackgroundColor&quot;:&quot;#ffffff&quot;,&quot;gradientBackgroundStartColor&quot;:null,&quot;gradientBackgroundEndColor&quot;:null,&quot;gradientBackgroundAngle&quot;:null,&quot;borderRadius&quot;:8,&quot;borderSize&quot;:1,&quot;borderColor&quot;:&quot;#c5c8d1&quot;,&quot;insideTopSpacing&quot;:10,&quot;insideBottomSpacing&quot;:10,&quot;outsideTopSpacing&quot;:20,&quot;outsideBottomSpacing&quot;:20,&quot;font&quot;:&quot;INHERIT&quot;,&quot;titleSize&quot;:16,&quot;titleColor&quot;:&quot;#202223&quot;,&quot;productTitleSize&quot;:14,&quot;productTitleColor&quot;:&quot;#202223&quot;,&quot;productVariantSize&quot;:14,&quot;productVariantColor&quot;:&quot;#96a4b6&quot;,&quot;productPriceSize&quot;:14,&quot;productPriceColor&quot;:&quot;#96a4b6&quot;,&quot;discountedPriceSize&quot;:14,&quot;discountedPriceColor&quot;:&quot;#fa493d&quot;,&quot;buttonBackgroundColor&quot;:&quot;#202223&quot;,&quot;buttonTextSize&quot;:14,&quot;buttonTextColor&quot;:&quot;#fafafa&quot;,&quot;buttonBorderRadius&quot;:4,&quot;navigationIconColor&quot;:&quot;#333333&quot;,&quot;checkboxIconColor&quot;:null,&quot;checkboxBackgroundColor&quot;:null,&quot;checkboxBorderColor&quot;:null},&quot;placement&quot;:{&quot;type&quot;:&quot;CART_PAGE&quot;,&quot;triggerType&quot;:&quot;ALL&quot;,&quot;cartPagePositionType&quot;:&quot;BOTTOM_OF_THE_CART&quot;,&quot;specificProducts&quot;:[],&quot;specificCollections&quot;:[]}}]}"
                product-page-product="null"
                product-page-collection-ids="[]"
                cart-product-ids="[]"
                first-shop-product-id="7237855248477"
                shop-money-format="&lt;span class=money&gt;&lt;/span&gt;"
                cart-items='
[]'
            ></essential-upsell-app-embed>


        </div>

        <div id="shopify-block-AYkpjcWFINkF3RWlJV__1513253815146976218" class="shopify-block shopify-app-block">
        </div>

        <div id="shopify-block-AR2FMSW9nNERWcU9kV__6174324309569838175" class="shopify-block shopify-app-block">


            <div class="smile-shopify-init" data-channel-key="channel_R2Pa8rhJdoQ83FJF02s72Zmd">
            </div>
            @endsection

            @push('scripts')
                <script>
                    app.controller('productCategory', function ($rootScope, $scope, $sce, $interval) {
                        $scope.keyword = "{{$keyWord}}"
                        $scope.search = function () {
                            if (!$scope.keyword) return;
                            var frontSearchUrl = "{{ route('front.search') }}";

                            var q = encodeURIComponent($scope.keyword);
                            window.location.href = frontSearchUrl + '?keyword=' + q;
                        }
                    })

                </script>
    @endpush
