@extends('site.layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')
    <main class="main-content" id="MainContent">
        <div id="shopify-section-template--18159281602653__slideshow" class="shopify-section index-section--hero"><div data-section-id="template--18159281602653__slideshow" data-section-type="slideshow-section"><div class="slideshow-wrapper"><style data-shopify="">@media screen and (max-width: 768px) {
                            .hero-natural-mobile--template--18159281602653__slideshow {
                                height: 0;
                                padding-bottom: 180.07202881152463%;
                            }
                        }</style>
                    <div class=" hero-natural-mobile--template--18159281602653__slideshow">
                        <div id="Slideshow-template--18159281602653__slideshow" class="hero hero--650px hero--template--18159281602653__slideshow hero--mobile--auto loaded" data-mobile-natural="true" data-autoplay="true" data-speed="7000" data-dots="true" data-bars="true" data-slide-count="1"><div class="slideshow__slide slideshow__slide--slideshow-0 is-selected" data-index="0" data-id="slideshow-0"><style data-shopify="">.slideshow__slide--slideshow-0 .hero__title {
                                        font-size: 20.0px;
                                    }
                                    @media only screen and (min-width: 769px) {
                                        .slideshow__slide--slideshow-0 .hero__title {
                                            font-size: 40px;
                                        }
                                    }


                                </style>
                                <div class="hero__image-wrapper hero__image-wrapper--no-overlay">
                                    @php
                                        $sizes = [352, 832, 1200, 1920, 2400];

                                        $srcset = collect($sizes)->map(function($size) use ($about) {
                                            return (@$about->image->path ?? '' ). "?width={$size} {$size}w";
                                        })->implode(', ');
                                    @endphp
                                    <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">
                                        <img src="{{@$about->image->path ?? ''}}?width=2400" alt=""
                                             srcset="{{ $srcset }}" width="2400" height="1332.8"
                                             loading="lazy" class="small--hide hero__image hero__image--slideshow-0 image-element" sizes="100vw">
                                    </image-element>


                                    <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">
                                        <img src="{{@$about->image->path ?? ''}}?width=3332"
                                             alt="" srcset="{{ $srcset }}" width="3332" height="6000.0"
                                             loading="lazy" class="medium-up--hide hero__image hero__image--slideshow-0 image-element" sizes="100vw">
                                    </image-element>
                                </div></div></div>
                    </div>
                </div></div>


        </div><div id="shopify-section-template--18159281602653__16508138760659e5fd" class="shopify-section">
            <style data-shopify="">


            </style>

            <div class="index-section">

                <div class="page-width feature-row-wrapper feature-row--50">
                                {!! $about->body !!}
                </div>

            </div>
        </div>
        <div id="shopify-section-template--18159281602653__1650816935ae38ac54" class="shopify-section index-section--flush">




        </div>
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
    </main>@endsection

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
            <div data-tool-tip-title>Motion Square Neck Bra</div>
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


    </div><div id="shopify-block-AVFIySTFEaVpmWUFPS__144831480468751239" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: vite-tag -->


        <script src="/site/js/app-embed-C2qg5SV6.js" type="module" crossorigin="anonymous"></script>
        <link rel="modulepreload" href="https://cdn.shopify.com/extensions/9c652dcc-fd78-477d-9e73-b38f552f64b9/essential-upsell-136/assets/stylex-K6Pfmy25.js" crossorigin="anonymous">
        <link href="/site/css/stylex-DFEZgduC.css" rel="stylesheet" type="text/css" media="all" />
        @endsection

        @push('scripts')
            <script>

            </script>
    @endpush
