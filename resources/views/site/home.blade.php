@extends('site.layouts.master')
@section('title')

@endsection

@section('css')

@endsection

@section('content')

    <main class="main-content" id="MainContent">
{{--        <div id="shopify-section-template--18159281537117__slideshow_ccTga3" class="shopify-section index-section--hero">--}}
{{--            <div data-section-id="template--18159281537117__slideshow_ccTga3" data-section-type="slideshow-section">--}}
{{--                <div class="slideshow-wrapper">--}}
{{--                    <style data-shopify="">@media only screen and (min-width: 769px) {--}}
{{--                            .hero-natural--template--18159281537117__slideshow_ccTga3 {--}}
{{--                                height: 0;--}}
{{--                                padding-bottom: 55.56%;--}}
{{--                            }--}}
{{--                        }</style>--}}
{{--                    <style data-shopify="">@media screen and (max-width: 768px) {--}}
{{--                            .hero-natural-mobile--template--18159281537117__slideshow_ccTga3 {--}}
{{--                                height: 0;--}}
{{--                                padding-bottom: 179.98560115190784%;--}}
{{--                            }--}}
{{--                        }</style>--}}
{{--                    <div class="hero-natural--template--18159281537117__slideshow_ccTga3 hero-natural-mobile--template--18159281537117__slideshow_ccTga3">--}}
{{--                        <div id="Slideshow-template--18159281537117__slideshow_ccTga3" class="hero hero--natural hero--template--18159281537117__slideshow_ccTga3 hero--mobile--auto loaded" data-natural="true" data-mobile-natural="true" data-autoplay="false" data-speed="5000" data-dots="true" data-bars="true" data-slide-count="1"><div class="slideshow__slide slideshow__slide--image_MtaHVQ is-selected" data-index="0" data-id="image_MtaHVQ"><style data-shopify="">.slideshow__slide--image_MtaHVQ .hero__title {--}}
{{--                                        font-size: 20.0px;--}}
{{--                                    }--}}
{{--                                    @media only screen and (min-width: 769px) {--}}
{{--                                        .slideshow__slide--image_MtaHVQ .hero__title {--}}
{{--                                            font-size: 40px;--}}
{{--                                        }--}}
{{--                                    }--}}

{{--                                </style>--}}

{{--                                <div class="hero__image-wrapper">--}}

{{--                                    @php--}}
{{--                                        $sizes = [352, 832, 1200, 1920, 2778];--}}

{{--                                        $srcset = collect($sizes)->map(function($size) use ($cateSpecialForBanner) {--}}
{{--                                            return (@$cateSpecialForBanner->image->path ?? '' ). "?width={$size} {$size}w";--}}
{{--                                        })->implode(', ');--}}
{{--                                    @endphp--}}

{{--                                    @if($cateSpecialForBanner)--}}
{{--                                        <image-element >--}}

{{--                                            <img src="{{@$cateSpecialForBanner->image->path ?? ''}}?width=2400" alt=""--}}
{{--                                                 srcset="{{ $srcset }}" width="2778"--}}
{{--                                                 height=1333.44" loading="lazy" class="medium-up--hide hero__image hero__image--image_MtaHVQ image-element" sizes="100vw">--}}
{{--                                        </image-element>--}}

{{--                                    @else--}}
{{--                                            <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">--}}

{{--                                                <img src="//dfyne.com/cdn/shop/files/IMPACT_HERO.jpg?v=1744039527&amp;width=2400" alt=""--}}
{{--                                                     srcset="//dfyne.com/cdn/shop/files/IMPACT_HERO.jpg?v=1744039527&amp;width=352 352w,--}}
{{--                                             //dfyne.com/cdn/shop/files/IMPACT_HERO.jpg?v=1744039527&amp;width=832 832w,--}}
{{--                                              //dfyne.com/cdn/shop/files/IMPACT_HERO.jpg?v=1744039527&amp;width=1200 1200w,--}}
{{--                                               //dfyne.com/cdn/shop/files/IMPACT_HERO.jpg?v=1744039527&amp;width=1920 1920w,--}}
{{--                                               //dfyne.com/cdn/shop/files/IMPACT_HERO.jpg?v=1744039527&amp;width=2400 2400w" width="2400" height="1333.44"--}}
{{--                                                     loading="lazy" class="small--hide hero__image hero__image--image_MtaHVQ image-element" sizes="100vw">--}}
{{--                                            </image-element>--}}
{{--                                    @endif--}}



{{--                                    @if($cateSpecialForBanner)--}}
{{--                                        <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">--}}

{{--                                            <img src="{{@$cateSpecialForBanner->image->path ?? ''}}?width=2778" alt=""--}}
{{--                                                 srcset="{{@$cateSpecialForBanner->image->path ?? ''}}?width=352 352w,--}}
{{--                                                 {{@$cateSpecialForBanner->image->path ?? ''}}?width=832 832w,--}}
{{--                                                  {{@$cateSpecialForBanner->image->path ?? ''}}?width=1200 1200w,--}}
{{--                                                  {{@$cateSpecialForBanner->image->path ?? ''}}?width=1920 1920w,--}}
{{--                                                  {{@$cateSpecialForBanner->image->path ?? ''}}?width=2778 2778w" width="2778"--}}
{{--                                                 height="5000.0" loading="lazy" class="medium-up--hide hero__image hero__image--image_MtaHVQ image-element" sizes="100vw">--}}
{{--                                        </image-element>--}}
{{--                                    @else--}}
{{--                                        <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">--}}
{{--                                            <img src="//dfyne.com/cdn/shop/files/IMPACT_HERO_MOBILE.jpg?v=1744039699&amp;width=2778" alt="" srcset="//dfyne.com/cdn/shop/files/IMPACT_HERO_MOBILE.jpg?v=1744039699&amp;width=352 352w, //dfyne.com/cdn/shop/files/IMPACT_HERO_MOBILE.jpg?v=1744039699&amp;width=832 832w, //dfyne.com/cdn/shop/files/IMPACT_HERO_MOBILE.jpg?v=1744039699&amp;width=1200 1200w, //dfyne.com/cdn/shop/files/IMPACT_HERO_MOBILE.jpg?v=1744039699&amp;width=1920 1920w, //dfyne.com/cdn/shop/files/IMPACT_HERO_MOBILE.jpg?v=1744039699&amp;width=2778 2778w" width="2778" height="5000.0" loading="lazy" class="medium-up--hide hero__image hero__image--image_MtaHVQ image-element" sizes="100vw">--}}
{{--                                        </image-element>--}}
{{--                                    @endif--}}

{{--                                </div>--}}
{{--                                <a href="#" class="hero__slide-link" aria-hidden="true">--}}

{{--                                </a>--}}
{{--                                <div class="hero__text-wrap">--}}
{{--                                    <div class="page-width">--}}
{{--                                        <div class="hero__text-content vertical-bottom horizontal-center">--}}
{{--                                            <div class="hero__text-shadow"><div class="hero__link"><a href="#" class="btn btn--inverse">--}}
{{--                                                        SHOP IMPACT--}}
{{--                                                    </a></div></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--        </div>--}}



            <div id="shopify-section-template--18159281537117__slideshow_NXh4cP-{{$cateSpecialForBanner->id}}" class="shopify-section index-section--hero">
                <div data-section-id="template--18159281537117__slideshow_NXh4cP" data-section-type="slideshow-section">
                    <div class="slideshow-wrapper">
                        <style data-shopify="">@media only screen and (min-width: 769px) {
                                .hero-natural--template--18159281537117__slideshow_NXh4cP {
                                    height: 0;
                                    padding-bottom: 55.56%;
                                }
                            }</style><style data-shopify="">@media screen and (max-width: 768px) {
                                .hero-natural-mobile--template--18159281537117__slideshow_NXh4cP {
                                    height: 0;
                                    padding-bottom: 179.98560115190784%;
                                }
                            }</style>
                        <div class="hero-natural--template--18159281537117__slideshow_NXh4cP hero-natural-mobile--template--18159281537117__slideshow_NXh4cP">

                            <div id="Slideshow-template--18159281537117__slideshow_NXh4cP"
                                 class="hero hero--natural hero--template--18159281537117__slideshow_NXh4cP hero--mobile--auto loading loading--delayed"
                                 data-natural="true" data-mobile-natural="true" data-autoplay="false" data-speed="5000" data-dots="true" data-bars="true" data-slide-count="1">
                                <div class="slideshow__slide slideshow__slide--image_qPAA7t" data-index="0" data-id="image_qPAA7t">
                                    <style data-shopify="">.slideshow__slide--image_qPAA7t .hero__title {
                                            font-size: 20.0px;
                                        }
                                        @media only screen and (min-width: 769px) {
                                            .slideshow__slide--image_qPAA7t .hero__title {
                                                font-size: 40px;
                                            }
                                        }


                                    </style>

                                    @php
                                        $sizes = [352, 832, 1200, 1920, 2778];

                                        $srcset = collect($sizes)->map(function($size) use ($cateSpecialForBanner) {
                                            return (@$cateSpecialForBanner->image->path ?? '' ). "?width={$size} {$size}w";
                                        })->implode(', ');
                                    @endphp

                                    <div class="hero__image-wrapper">
                                        <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init">
                                            <img src="{{@$cateSpecialForBanner->image->path ?? ''}}?width=2400"
                                                 alt="" srcset="{{$srcset}}"
                                                 width="2400" height="1333.44" loading="lazy" class="small--hide hero__image hero__image--image_qPAA7t image-element" sizes="100vw">
                                        </image-element>


                                        <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init">
                                            <img src="{{@$cateSpecialForBanner->image->path ?? ''}}?width=2778" alt="" srcset="{{$srcset}}"
                                                 width="2778" height="5000.0" loading="lazy"
                                                 class="medium-up--hide hero__image hero__image--image_qPAA7t image-element"
                                                 sizes="100vw">
                                        </image-element>
                                    </div>

                                    <a href="{{route('front.getProductListFeatured', $cateSpecialForBanner->slug)}}" class="hero__slide-link" aria-hidden="true"></a>
                                    <div class="hero__text-wrap">
                                        <div class="page-width">
                                            <div class="hero__text-content vertical-bottom horizontal-center">
                                                <div class="hero__text-shadow"><div class="hero__link">
                                                        <a href="{{route('front.getProductListFeatured', $cateSpecialForBanner->slug)}}" class="btn btn--inverse">
                                                            {{ $cateSpecialForBanner->name }}
                                                        </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @foreach($categoriesSpecial as $categorySpecial)

            <div id="shopify-section-template--18159281537117__featured_collection_w9HQWE-{{$categorySpecial->id}}" class="shopify-section index-section">
                <div id="CollectionSection-template--18159281537117__featured_collection_w9HQWE" data-section-id="template--18159281537117__featured_collection_w9HQWE" data-section-type="collection-grid" data-context="featured-collection">
                    <div class="page-width">
                        <div class="section-header section-header--with-link">
                            <h2 class="section-header__title">
                                <left><h4 style="font-size:14px;">{{ $categorySpecial->name }}</h4>
                                    <h4 style="font-size:10px;"> {{ $categorySpecial->category->name }}</h4>
                                </left>
                            </h2></div>
                    </div>
                    <div class="page-width page-width--flush-small">
                        <div class="grid-overflow-wrapper">
                            <div class="grid grid--uniform aos-init aos-animate" data-aos="overflow__animation">


                                @foreach($categorySpecial->variants as $variant)
                                    @include('site.partials.product_card', ['variant' => $variant])
                                @endforeach

                                <div class="grid__item text-center small--hide">
                                    <a href="{{route('front.getProductListFeatured', $categorySpecial->slug)}}" class="btn">View All</a>
                                </div>
                                <div class="grid__item grid__item--view-all text-center small--one-half medium-up--one-quarter medium-up--hide">
                                    <a href="{{route('front.getProductListFeatured', $categorySpecial->slug)}}" class="grid-product__see-all">
                                        View All<br>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach



        @foreach($categoriesCollection as $categoryCollection)
        <div id="shopify-section-template--18159281537117__slideshow_NXh4cP-{{$categoryCollection->id}}" class="shopify-section index-section--hero">
            <div data-section-id="template--18159281537117__slideshow_NXh4cP" data-section-type="slideshow-section">
                <div class="slideshow-wrapper">
                    <style data-shopify="">@media only screen and (min-width: 769px) {
                            .hero-natural--template--18159281537117__slideshow_NXh4cP {
                                height: 0;
                                padding-bottom: 55.56%;
                            }
                        }</style><style data-shopify="">@media screen and (max-width: 768px) {
                            .hero-natural-mobile--template--18159281537117__slideshow_NXh4cP {
                                height: 0;
                                padding-bottom: 179.98560115190784%;
                            }
                        }</style>
                    <div class="hero-natural--template--18159281537117__slideshow_NXh4cP hero-natural-mobile--template--18159281537117__slideshow_NXh4cP">

                        <div id="Slideshow-template--18159281537117__slideshow_NXh4cP"
                             class="hero hero--natural hero--template--18159281537117__slideshow_NXh4cP hero--mobile--auto loading loading--delayed"
                             data-natural="true" data-mobile-natural="true" data-autoplay="false" data-speed="5000" data-dots="true" data-bars="true" data-slide-count="1">
                            <div class="slideshow__slide slideshow__slide--image_qPAA7t" data-index="0" data-id="image_qPAA7t">
                                <style data-shopify="">.slideshow__slide--image_qPAA7t .hero__title {
                                        font-size: 20.0px;
                                    }
                                    @media only screen and (min-width: 769px) {
                                        .slideshow__slide--image_qPAA7t .hero__title {
                                            font-size: 40px;
                                        }
                                    }


                                </style>

                                @php
                                    $sizes = [352, 832, 1200, 1920, 2400];

                                    $srcset = collect($sizes)->map(function($size) use ($categoryCollection) {
                                        return (@$categoryCollection->image->path ?? '' ). "?width={$size} {$size}w";
                                    })->implode(', ');
                                @endphp

                                <div class="hero__image-wrapper">
                                    <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init">
                                        <img src="{{@$categoryCollection->image->path ?? ''}}?width=2400"
                                             alt="" srcset="{{$srcset}}"
                                             width="2400" height="1333.44" loading="lazy" class="small--hide hero__image hero__image--image_qPAA7t image-element" sizes="100vw">
                                    </image-element>


                                    <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init">
                                        <img src="{{@$categoryCollection->image->path ?? ''}}?width=2778" alt="" srcset="{{$srcset}}"
                                             width="2778" height="5000.0" loading="lazy"
                                             class="medium-up--hide hero__image hero__image--image_qPAA7t image-element"
                                             sizes="100vw">
                                    </image-element>
                                </div>

                                <a href="{{route('front.getProductListCollection', $categoryCollection->slug)}}" class="hero__slide-link" aria-hidden="true"></a>
                                <div class="hero__text-wrap">
                                    <div class="page-width">
                                        <div class="hero__text-content vertical-bottom horizontal-center">
                                            <div class="hero__text-shadow"><div class="hero__link">
                                                    <a href="{{route('front.getProductListCollection', $categoryCollection->slug)}}" class="btn btn--inverse">
                                                        {{ $categoryCollection->name }}
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="shopify-section-template--18159281537117__featured_collection_3yJKAc" class="shopify-section index-section">
                <div id="CollectionSection-template--18159281537117__featured_collection_3yJKAc"
                     data-section-id="template--18159281537117__featured_collection_3yJKAc"
                     data-section-type="collection-grid" data-context="featured-collection">
                    <div class="page-width">
                        <div class="section-header section-header--with-link">
                            <h2 class="section-header__title">
                                <left><h4 style="font-size:14px">{{ $categoryCollection->name }}</h4>
                                    <h4 style="font-size:10px;">{{ $categoryCollection->parent->name }}</h4>
                                </left>
                            </h2>
                        </div>
                    </div>

                    <div class="page-width page-width--flush-small">
                        <div class="grid-overflow-wrapper">
                            <div class="grid grid--uniform aos-init" data-aos="overflow__animation">


                                @foreach($categoryCollection->variants as $variant)
                                    @include('site.partials.product_card', ['variant' => $variant])
                                @endforeach



                                <div class="grid__item text-center small--hide">
                                    <a href="{{route('front.getProductListCollection', $categoryCollection->slug)}}" class="btn">View All</a>
                                </div><div class="grid__item grid__item--view-all text-center small--one-half medium-up--one-quarter medium-up--hide">
                                    <a href="{{route('front.getProductListCollection', $categoryCollection->slug)}}" class="grid-product__see-all">
                                        View All<br>
                                    </a>
                                </div></div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach


        <div id="shopify-section-template--18159281537117__promo_grid_maLAre" class="shopify-section"><div data-section-id="template--18159281537117__promo_grid_maLAre" data-section-type="promo-grid"><div class="page-width"><style data-shopify="">.flex-grid--template--18159281537117__promo_grid_maLAre {
                            margin-top: -20px;
                            margin-left: -20px;

                        }

                        .flex-grid--template--18159281537117__promo_grid_maLAre .flex-grid--gutters {
                            margin-top: -20px;
                            margin-left: -20px;
                        }

                        .flex-grid--template--18159281537117__promo_grid_maLAre .flex-grid__item {
                            padding-top: 20px;
                            padding-left: 20px;
                        }

                        @media only screen and (max-width: 589px) {
                            .flex-grid--template--18159281537117__promo_grid_maLAre {
                                margin-top: -10px;
                                margin-left: -10px;

                            }

                            .flex-grid--template--18159281537117__promo_grid_maLAre .flex-grid--gutters {
                                margin-top: -10px;
                                margin-left: -10px;
                            }

                            .flex-grid--template--18159281537117__promo_grid_maLAre .flex-grid__item {
                                padding-top: 10px;
                                padding-left: 10px;
                            }
                        }</style><div class="promo-grid promo-grid--space-bottom">
                        <div class="flex-grid flex-grid--gutters flex-grid--template--18159281537117__promo_grid_maLAre"><style data-shopify="">

                                .flex-grid__item--banner_dhYMYg .btn {
                                    background:  !important;
                                    border: none !important;
                                }




                                .flex-grid__item--banner_dhYMYg .btn--tint-border {
                                    border: 1px solid rgba(217, 225, 240, 0.2) !important;
                                }





                                .flex-grid__item--banner_dhYMYg .promo-grid__container--tint:before {background: rgba(217, 225, 240, 0.2);
                                }



                            </style><div class="flex-grid__item flex-grid__item-- flex-grid__item--banner_dhYMYg type-banner"><div class="promo-grid__container promo-grid__container--tint">
                                    <div class="type-banner__content text-center"><div class="type-banner__image">
                                            <div class="image-wrap" style="height: 0; padding-bottom: 40.34188034188035%;">



                                                <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init">



                                                    <img src="//dfyne.com/cdn/shop/files/klarna_logo_copy.png?v=1730274080&amp;width=460" alt="" srcset="//dfyne.com/cdn/shop/files/klarna_logo_copy.png?v=1730274080&amp;width=180 180w, //dfyne.com/cdn/shop/files/klarna_logo_copy.png?v=1730274080&amp;width=360 360w, //dfyne.com/cdn/shop/files/klarna_logo_copy.png?v=1730274080&amp;width=460 460w" width="460" height="185.5726495726496" loading="lazy" class=" image-element" sizes="(min-width: 769px) 200px, 45vw" role="presentation">



                                                </image-element>
                                            </div>
                                        </div><div class="type-banner__text"><p>Buy Now. Pay Later.</p></div>
                                    </div>
                                </div></div></div>
                    </div>
                    <div style="clear:both"></div></div></div>


            <style> #shopify-section-template--18159281537117__promo_grid_maLAre img {display: block; width: 100%; padding-top: 8px; padding-left: 40px; padding-bottom: 10px;} </style></div><div id="shopify-section-template--18159281537117__5bf52533-6839-4da3-a386-4c92a3e61e12" class="shopify-section"><div class="custom-content"><div class="custom__item one-whole align--center">
                    <div class="custom__item-inner custom__item-inner--liquid">

                    </div>
                </div></div>
            <style> #shopify-section-template--18159281537117__5bf52533-6839-4da3-a386-4c92a3e61e12 div {background-color: #f9f9f9;} </style></div>
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

                    })

                </script>
    @endpush
