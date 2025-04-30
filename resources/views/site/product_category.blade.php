@extends('site.layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')
    <style>
        .drawer__action {
            border-top: 1px solid #e5e5e5;
            padding: 12px;
            text-align: center;
            background-color: #fff;
        }

        .drawer__search-btn {
            display: inline-block;
            padding: 8px 16px;
            font-size: 14px;
            border-radius: 20px;
            text-transform: uppercase;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .drawer__search-btn:hover {
            background-color: #444;
            transform: translateY(-2px);
        }

        /* Highlight toàn bộ ô màu */
        .tag--swatch.tag--active {
            transform: scale(1.05);               /* nhích to hơn */
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            border-radius: 50%;    /* bo tròn cả container nếu nó vuông */

        }

        /* Hoặc chỉ viền quanh color-swatch */
        .tag--swatch.tag--active .color-swatch {
            outline-offset: 2px;
            border-radius: 50%;    /* bo tròn thành hình tròn */

        }

        /* Thêm transition mượt mà */
        .tag--swatch .color-swatch,
        .tag--swatch {
            transition: transform 0.2s ease, box-shadow 0.2s ease, outline 0.2s ease;
        }
    </style>
    <main class="main-content" id="MainContent" ng-controller="productCategory">
        <div id="shopify-section-template--18121749332061__collection-header" class="shopify-section"><div class="page-width page-content page-content--top">
                <header class="section-header section-header--flush">
                    <h1 class="section-header__title">
                        Joggers - Mens
                    </h1>
                </header>
            </div>
            <div
                id="CollectionHeaderSection"
                data-section-id="template--18121749332061__collection-header"
                data-section-type="collection-header">
            </div>
        </div><div id="shopify-section-template--18121749332061__main-collection" class="shopify-section"><div
                class="collection-content"
                data-section-id="template--18121749332061__main-collection"
                data-section-type="collection-grid"
            >
                <div id="CollectionAjaxContent">
                    <div class="page-width">
                        <div class="grid">
                            <div class="grid__item medium-up--one-fifth grid__item--sidebar">
                                <div id="CollectionSidebar" data-style="drawer"><div id="FilterDrawer" class="drawer drawer--left">
                                        <div class="drawer__contents">
                                            <div class="drawer__fixed-header">
                                                <div class="drawer__header appear-animation appear-delay-1">
                                                    <div class="h2 drawer__title">
                                                        Filter
                                                    </div>
                                                    <div class="drawer__close">
                                                        <button type="button" class="drawer__close-button js-drawer-close">
                                                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
                                                            <span class="icon__fallback-text">Close menu</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div><div class="drawer__scrollable appear-animation appear-delay-2">

                                                <ul class="no-bullets tag-list tag-list--active-tags"></ul>

                                                <form class="">
                                                    <div class="collection-sidebar__group--1">
                                                        <div class="">
                                                            <button
                                                                type="button"
                                                                class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height is-open tag-list__header"
                                                                aria-controls="SidebarDrawer-2-filter-colour"
                                                                data-collapsible-id="filter-colour">
                                                                Colors
                                                                <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
                                                            </span>
                                                            </button>
                                                            <div
                                                                id="SidebarDrawer-2-filter-colour"
                                                                class="collapsible-content collapsible-content--sidebar is-open"
                                                                data-collapsible-id="filter-colour"
                                                                style="height: auto;">
                                                                <div class="collapsible-content__inner">
                                                                    <ul class="no-bullets tag-list  tag-list--swatches">
                                                                        <li class="tag tag--swatch" ng-repeat="color in colors" ng-class="{'tag--active': filter.colourIds.indexOf(color.id) > -1}">
                                                                            <label for="colour-<%color.id%>" class="tag__checkbox-wrapper text-label">
                                                                                <input
                                                                                    id="colour-<%color.id%>"
                                                                                    type="checkbox"
                                                                                    class="tag__input"
                                                                                    ng-checked="filter.colourIds.indexOf(color.id) > -1"
                                                                                    ng-click="toggleColour(color.id)"
                                                                                />
                                                                                <span
                                                                                    class="color-swatch color-swatch--<%color.id%>"
                                                                                    title="<%color.name%>"
                                                                                    ng-style="{'background-color': color.hex_code}"
                                                                                >
                                                                                    <%color.name%>
                                                                                 </span>
                                                                            </label>
                                                                        </li>


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="collection-sidebar__group--3">
                                                        <div class="collection-sidebar__group">
                                                            <button
                                                                type="button"
                                                                class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height is-open tag-list__header"
                                                                aria-controls="SidebarDrawer-3-filter-size"
                                                                data-collapsible-id="filter-size">
                                                                Size
                                                                <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
  <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
</span>
                                                            </button>
                                                            <div
                                                                id="SidebarDrawer-3-filter-size"
                                                                class="collapsible-content collapsible-content--sidebar is-open"
                                                                data-collapsible-id="filter-size"
                                                                style="height: auto;">
                                                                <div class="collapsible-content__inner">
                                                                    <ul class="no-bullets tag-list ">
                                                                        <li class="tag" ng-repeat="size in sizes">
                                                                            <label for="size-<%size.id%>" class="tag__checkbox-wrapper text-label">
                                                                                <input
                                                                                    id="size-<%size.id%>"
                                                                                    type="checkbox"
                                                                                    class="tag__input"
                                                                                    ng-checked="filter.sizeIds.indexOf(size.id) > -1"
                                                                                    ng-click="toggleSize(size.id)"
                                                                                />
                                                                                <span class="tag__checkbox"></span>
                                                                                <span>
                                                                                 <span class="tag__text"><%size.name%></span>
                                                                                 </span>
                                                                            </label>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collection-sidebar__group--4">
                                                        <div class="collection-sidebar__group">
                                                            <button
                                                                type="button"
                                                                class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height is-open tag-list__header"
                                                                aria-controls="SidebarDrawer-4-filter-price"
                                                                data-collapsible-id="filter-price">
                                                                Price Range
                                                                <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
  <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59"
                                                                                                                                    stroke-width="2" stroke="#000" fill="none"/></svg>
</span>
                                                            </button>
                                                            <div
                                                                id="SidebarDrawer-4-filter-price"
                                                                class="collapsible-content collapsible-content--sidebar is-open"
                                                                data-collapsible-id="filter-price"
                                                                style="height: auto;">
                                                                <div class="collapsible-content__inner">
                                                                    <div
                                                                        class="price-range"
                                                                        data-min-value=""
                                                                        data-min-name="filter.v.price.gte"
                                                                        data-min=""
                                                                        data-max-value=""
                                                                        data-max-name="filter.v.price.lte"
                                                                        data-max="20000000"
                                                                    >
                                                                        <div class="price-range__display-wrapper">
                                                                            <span class="price-range__display-min"></span>
                                                                            <span class="price-range__display-max"></span>
                                                                        </div>
                                                                        <div class="price-range__slider-wrapper">
                                                                            <div class="price-range__slider"></div>
                                                                        </div>
                                                                        <input
                                                                            class="price-range__input price-range__input-min"
                                                                            name="filter.v.price.gte"
                                                                            value="0"
                                                                            readonly>
                                                                        <input
                                                                            class="price-range__input price-range__input-max"
                                                                            name="filter.v.price.lte"
                                                                            value="20000000"
                                                                            readonly>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div><div class="collection-sidebar__group--5">
                                                        <div class="collection-sidebar__group">
                                                            <button
                                                                type="button"
                                                                class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height is-open tag-list__header"
                                                                aria-controls="SidebarDrawer-5-filter-availability"
                                                                data-collapsible-id="filter-availability">
                                                                In Stock
                                                                <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
  <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
</span>
                                                            </button>
                                                            <div
                                                                id="SidebarDrawer-5-filter-availability"
                                                                class="collapsible-content collapsible-content--sidebar is-open"
                                                                data-collapsible-id="filter-availability"
                                                                style="height: auto;">
                                                                <div class="collapsible-content__inner">
                                                                    <ul class="no-bullets tag-list ">
                                                                        <li class="tag">
                                                                            <label for="avail-1" class="tag__checkbox-wrapper text-label">
                                                                                <input
                                                                                    id="avail-1"
                                                                                    type="checkbox"
                                                                                    class="tag__input"
                                                                                    ng-model="filter.availability.inStock"
                                                                                    ng-true-value="true"
                                                                                    ng-false-value="false"
                                                                                />
                                                                                <span class="tag__checkbox"></span>
                                                                                <span>
                                                                                    <span class="tag__text">In stock</span>
                                                                                </span>
                                                                            </label>
                                                                        </li>

                                                                        <li class="tag">
                                                                            <label for="avail-2" class="tag__checkbox-wrapper text-label">
                                                                                <input
                                                                                    id="avail-2"
                                                                                    type="checkbox"
                                                                                    class="tag__input"
                                                                                    ng-model="filter.availability.outStock"
                                                                                    ng-true-value="true"
                                                                                    ng-false-value="false"
                                                                                />
                                                                                <span class="tag__checkbox"></span>
                                                                                <span>
                                                                                    <span class="tag__text">Out of Stock</span>
                                                                                </span>
                                                                            </label>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div></form>

                                                <div class="drawer__action">
                                                    <button type="button"
                                                            class="button button--primary drawer__search-btn"
                                                            ng-click="filterProduct()">
                                                        Filter
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div></div>
                            <div class="grid__item medium-up--four-fifths grid__item--content"><div  ></div><div  ><div data-scroll-to>




                                        <div class="collection-grid__wrapper">
                                            <div class="collection-filter">
                                                <div class="collection-filter__item collection-filter__item--drawer">
                                                    <button
                                                        type="button"
                                                        class="js-drawer-open-collection-filters btn btn--tertiary"
                                                        aria-controls="FilterDrawer">
                                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-filter" viewBox="0 0 64 64"><title>icon-filter</title><path d="M48 42h10m-10 0a5 5 0 1 1-5-5 5 5 0 0 1 5 5ZM7 42h31M16 22H6m10 0a5 5 0 1 1 5 5 5 5 0 0 1-5-5Zm41 0H26"/></svg>
                                                        Filter
                                                    </button>
                                                </div>

                                                <div class="collection-filter__item collection-filter__item--count small--hide"></div>

                                                <div class="collection-filter__item collection-filter__item--sort">
                                                    <div class="collection-filter__sort-container"><label for="SortBy" class="hidden-label">Sắp xếp</label>
                                                        <select ng-model="sortOption"
                                                                ng-change="sortOptionChanged()" >
                                                            <option value="">Default</option>
                                                            <option value="name_asc">Name (A–Z)</option>
                                                            <option value="name_desc">Name (Z–A)</option>
                                                            <option value="price_asc">Price: Low to High</option>
                                                            <option value="price_desc">Price: High to Low</option>
                                                            <option value="date_asc">Date: Oldest to Newest</option>
                                                            <option value="date_desc">Date: Newest to Oldest</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="grid grid--uniform small--grid--flush" data-scroll-to ng-if="!searching">

                                                @foreach($productVariants as $variant)
                                                    @include('site.partials.product_card', ['variant' => $variant])
                                                @endforeach

                                            </div>

                                            <div ng-if="searching" ng-bind-html="productListHtml">

                                            </div>
                                        </div>
                                    </div></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <style data-shopify>
                .collection-content .grid__item--sidebar { width: 0; padding:0; }
                .collection-content .grid__item--content { width: 100%; }
                .grid__item--sidebar { position: static; overflow: hidden; }
            </style>
            <script type="application/ld+json">
                {
                  "@context": "http://schema.org",
                  "@type": "CollectionPage",



                    "image": {
                      "@type": "ImageObject",
                      "height": 1000,
                      "url": "https:\/\/dfyne.com\/cdn\/shop\/files\/F5154D91-05C0-4592-BA6D-3B94C19CE16A_1000x.jpg?v=1630941657",
                      "width": 1000
                    },

                  "name": "Joggers - Mens"
                }
            </script>


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
                    $scope.colors = @json($colors);
                    $scope.sizes = @json($sizes);
                    $scope.availabilities = [
                        { id: 1, name: 'Trong kho' },
                        { id: 2, name: 'Hết hàng' }
                    ];

                    $scope.filter = {}
                    $scope.filter.priceGte = 0;
                    $scope.filter.priceLte = 20000000;

                    $scope.filter.category_id = {{ $category->id }};
                    // tình trạng hàng hóa
                    $scope.filter.availability = {
                        "inStock": false,
                        "outStock": false
                    }

                    // colors
                    $scope.filter.colourIds= []
                    $scope.toggleColour = function(colourId) {
                        var idx = $scope.filter.colourIds.indexOf(colourId);
                        if (idx === -1) {
                            $scope.filter.colourIds.push(colourId);
                        } else {
                            $scope.filter.colourIds.splice(idx, 1);
                        }
                    };

                    // sizes
                    $scope.filter.sizeIds = []
                    $scope.toggleSize = function(sizeId) {
                        var idx = $scope.filter.sizeIds.indexOf(sizeId);
                        if (idx === -1) {
                            $scope.filter.sizeIds.push(sizeId);
                        } else {
                            $scope.filter.sizeIds.splice(idx, 1);
                        }
                    };

                    $scope.searching = false;

                    $scope.filterProduct = function () {
                        $scope.searchProduct();
                    }

                    $scope.sortOptionChanged = function () {
                        $scope.searchProduct();
                    }

                    $scope.searchProduct = function () {
                        let minInput = document.querySelector('input[name="filter.v.price.gte"]');
                        let maxInput = document.querySelector('input[name="filter.v.price.lte"]');
                        $scope.filter.priceGte = minInput.value;
                        $scope.filter.priceLte = maxInput.value;
                        const url = window.location.pathname;
                        const segments = url.split('/');
                        const folder = segments[1];

                        let page_type = 'category';

                        if(folder == 'collections') {
                            page_type = 'collections';
                        } else if(folder == 'featured') {
                            page_type = 'featured';
                        }



                        console.log(page_type)
                        jQuery.ajax({
                            type: "POST",
                            url: "{{route('front.ajax-search-products')}}",
                            headers: {
                                'X-CSRF-TOKEN': "{{csrf_token()}}"
                            },
                            data: {
                                categoryId: {{ $category->id }},
                                filter: $scope.filter,
                                sortOption: $scope.sortOption,
                                page_type: page_type,
                            },
                            beforeSend: function () {
                                jQuery('.loading-spin').show();
                                // showOverlay();
                            },
                            success: function (response) {
                                if (response.success) {
                                    $scope.searching = true;
                                    $scope.errors = null;
                                    $scope.productListHtml = $sce.trustAsHtml(response.data);

                                    // window.location.href = "/dat-hang-thanh-cong/";
                                } else {
                                    $scope.errors = response.errors;
                                }
                            },
                            error: function () {
                            },
                            complete: function () {
                                jQuery('.loading-spin').hide();
                                // hideOverlay();
                                // $scope.loading.submit = false;
                                $scope.$applyAsync();
                            },
                        });
                    }
                })

            </script>
    @endpush
