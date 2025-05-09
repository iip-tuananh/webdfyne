@extends('site.layouts.master')
@section('title')

@endsection

@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.min.css"/>


    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <style>
        /* Hiển thị sao rỗng khi off */
        .jdgm-star.jdgm--off::before {
            content: '☆';       /* Unicode empty star */
            font-size: 1.5rem;
            color: #ccc;
            display: inline-block;
        }

        /* Hiển thị sao đầy khi on */
        .jdgm-star.jdgm--on::before {
            content: '★';       /* Unicode filled star */
            font-size: 1.5rem;
            color: #f5b301;
            display: inline-block;
        }
    </style>

    <style>
        .invalid-feedback {
            font-size: 14.5px;
            color: #dc3545;
        }
    </style>
@endsection

@section('content')
    <main class="main-content" id="MainContent" ng-controller="productDetail">
        <div id="shopify-section-template--18121751003229__main" class="shopify-section">
            <div id="ProductSection-template--18121751003229__main-7589307777117"
                 class="product-section"
                 data-section-id="template--18121751003229__main"
                 data-product-id="7589307777117"
                 data-section-type="product"
                 data-product-handle="dfyne-dynamic-berry-sports-bras-24036"
                 data-product-title="Dynamic Twist Back Bra"
                 data-product-url="/products/dfyne-dynamic-berry-sports-bras-24036"
                 data-aspect-ratio="100.0"
                 data-img-url="//dfyne.com/cdn/shop/files/IMG_2336-Edit-2_{width}x.jpg?v=1726481687"
                 data-history="true"
                 data-modal="false">
                <script type="application/ld+json">
                    {
                      "@context": "http://schema.org",
                      "@type": "Product",
                      "offers": [{
                            "@type" : "Offer","sku": "24036-21-7-18-13","availability" : "http://schema.org/OutOfStock",
                            "price" : 42.5,
                            "priceCurrency" : "USD",
                            "priceValidUntil": "2025-04-26",
                            "url" : "https:\/\/dfyne.com\/products\/dfyne-dynamic-berry-sports-bras-24036?variant=42334572216413"
                          },
                    {
                            "@type" : "Offer","sku": "24036-21-7-18-14","availability" : "http://schema.org/OutOfStock",
                            "price" : 42.5,
                            "priceCurrency" : "USD",
                            "priceValidUntil": "2025-04-26",
                            "url" : "https:\/\/dfyne.com\/products\/dfyne-dynamic-berry-sports-bras-24036?variant=42334572249181"
                          },
                    {
                            "@type" : "Offer","sku": "24036-21-7-18-15","availability" : "http://schema.org/InStock",
                            "price" : 42.5,
                            "priceCurrency" : "USD",
                            "priceValidUntil": "2025-04-26",
                            "url" : "https:\/\/dfyne.com\/products\/dfyne-dynamic-berry-sports-bras-24036?variant=42334572281949"
                          },
                    {
                            "@type" : "Offer","sku": "24036-21-7-18-16","availability" : "http://schema.org/InStock",
                            "price" : 42.5,
                            "priceCurrency" : "USD",
                            "priceValidUntil": "2025-04-26",
                            "url" : "https:\/\/dfyne.com\/products\/dfyne-dynamic-berry-sports-bras-24036?variant=42334572314717"
                          },
                    {
                            "@type" : "Offer","sku": "24036-21-7-18-17","availability" : "http://schema.org/OutOfStock",
                            "price" : 42.5,
                            "priceCurrency" : "USD",
                            "priceValidUntil": "2025-04-26",
                            "url" : "https:\/\/dfyne.com\/products\/dfyne-dynamic-berry-sports-bras-24036?variant=42334572347485"
                          }
                    ],
                      "brand": "Berry",
                      "sku": "24036-21-7-18-17",
                      "name": "Dynamic Twist Back Bra",
                      "description": "Dynamic Collection",
                      "category": "",
                      "url": "https://dfyne.com/products/dfyne-dynamic-berry-sports-bras-24036","image": {
                        "@type": "ImageObject",
                        "url": "https://dfyne.com/cdn/shop/files/IMG_2336-Edit-2_1024x1024.jpg?v=1726481687",
                        "image": "https://dfyne.com/cdn/shop/files/IMG_2336-Edit-2_1024x1024.jpg?v=1726481687",
                        "name": "Dynamic Twist Back Bra",
                        "width": 1024,
                        "height": 1024
                      }
                    }
                </script>
                <div class="page-content page-content--product">

                    <div class="page-width">
                        <div class="grid">


                            <div class="grid__item medium-up--one-half product-single__sticky">


{{--                                <div--}}
{{--                                    data-product-images--}}
{{--                                    data-zoom="true"--}}
{{--                                    data-has-slideshow="true">--}}
{{--                                    <div class="product__photos product__photos-template--18121751003229__main product__photos--below">--}}

{{--                                        <div class="product__main-photos" data-aos data-product-single-media-group>--}}
{{--                                            <div--}}
{{--                                                data-product-photos--}}
{{--                                                data-zoom="true"--}}
{{--                                                class="product-slideshow"--}}
{{--                                                id="ProductPhotos-template--18121751003229__main">--}}

{{--                                                @php--}}
{{--                                                    $sizes = [360, 540, 720, 900, 1080];--}}

{{--                                                    $srcset = collect($sizes)->map(function($size) use ($productVariant) {--}}
{{--                                                        return (@$productVariant->image->path ?? '' ). "?width={$size} {$size}w";--}}
{{--                                                    })->implode(', ');--}}
{{--                                                @endphp--}}

{{--                                                @if(isset($productVariant->galleries) && count($productVariant->galleries))--}}
{{--                                                    @foreach($productVariant->galleries as $key => $gallery)--}}
{{--                                                        @php--}}
{{--                                                            $srcsetGallery = collect($sizes)->map(function($size) use ($gallery) {--}}
{{--                                                           return $gallery->image->path . "?width={$size} {$size}w";--}}
{{--                                                       })->implode(', ');--}}
{{--                                                        @endphp--}}
{{--                                                        <div--}}
{{--                                                            class="product-main-slide {{ $loop->first ? 'starting-slide' : 'secondary-slide' }}"--}}
{{--                                                            data-index="{{ $key }}">--}}

{{--                                                            <div data-product-image-main class="product-image-main">--}}
{{--                                                                <div class="image-wrap" style="height: 0; padding-bottom: 100.0%;">--}}
{{--                                                                    <image-element data-aos="image-fade-in" data-aos-offset="150">--}}
{{--                                                                        <img src="{{ @$gallery->image->path ?? '' }}?width=1080"--}}
{{--                                                                             width="1080"--}}
{{--                                                                             height="1080.0"--}}
{{--                                                                             class="photoswipe__image--}}
{{--                                                image-element"--}}
{{--                                                                             loading="eager"--}}
{{--                                                                             alt="Dynamic Twist Back Bra"--}}
{{--                                                                             srcset="{{ $srcsetGallery }}"--}}
{{--                                                                             data-photoswipe-src="{{ @$gallery->image->path ?? '' }}?width=1080"--}}
{{--                                                                             data-photoswipe-width="2000"--}}
{{--                                                                             data-photoswipe-height="2000"--}}
{{--                                                                             data-index="{{ $key + 1 }}"--}}
{{--                                                                             sizes="(min-width: 769px) 50vw, 100vw"--}}
{{--                                                                        >--}}
{{--                                                                    </image-element>--}}

{{--                                                                    <button type="button" class="btn btn--body btn--circle js-photoswipe__zoom product__photo-zoom">--}}
{{--                                                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 64 64">--}}
{{--                                                                            <title>icon-search</title>--}}
{{--                                                                            <path d="M47.16 28.58A18.58 18.58 0 1 1 28.58 10a18.58 18.58 0 0 1 18.58 18.58ZM54 54 41.94 42"/>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <span class="icon__fallback-text">Close (esc)</span>--}}
{{--                                                                    </button>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}

{{--                                                    @endforeach--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div--}}
{{--                                            data-product-thumbs--}}
{{--                                            class="product__thumbs product__thumbs--below product__thumbs-placement--left small--hide"--}}
{{--                                            data-position="below"--}}
{{--                                            data-arrows="false"--}}
{{--                                            data-aos>--}}
{{--                                            <div class="product__thumbs--scroller">--}}
{{--                                                @php--}}
{{--                                                    $sizes = [120, 360, 540, 720];--}}

{{--                                                    $srcset = collect($sizes)->map(function($size) use ($productVariant) {--}}
{{--                                                        return (@$productVariant->image->path ?? '' ). "?width={$size} {$size}w";--}}
{{--                                                    })->implode(', ');--}}
{{--                                                @endphp--}}

{{--                                                @if(isset($productVariant->galleries) && count($productVariant->galleries))--}}
{{--                                                    @foreach($productVariant->galleries as $key => $gallery)--}}
{{--                                                        @php--}}
{{--                                                            $srcsetGallery = collect($sizes)->map(function($size) use ($gallery) {--}}
{{--                                                           return $gallery->image->path . "?width={$size} {$size}w";--}}
{{--                                                       })->implode(', ');--}}
{{--                                                        @endphp--}}
{{--                                                        <div class="product__thumb-item"--}}
{{--                                                             data-index="{{$key}}"--}}
{{--                                                        >--}}
{{--                                                            <a--}}
{{--                                                                href="{{ @$gallery->image->path ?? '' }}"--}}
{{--                                                                data-product-thumb--}}
{{--                                                                class="product__thumb"--}}
{{--                                                                data-index="{{$key}}"--}}
{{--                                                                data-id="{{$productVariant->id}}">--}}
{{--                                                                <div class="image-wrap image-wrap__thumbnail" style="height: 0; padding-bottom: 100.0%;">--}}
{{--                                                                    <image-element data-aos="image-fade-in" data-aos-offset="150">--}}
{{--                                                                        <img src="{{ @$gallery->image->path ?? '' }}?width=720"--}}
{{--                                                                             alt="Dynamic Twist Back Bra"--}}
{{--                                                                             srcset="{{$srcsetGallery}}"--}}
{{--                                                                             width="720" height="720.0" loading="eager" class=" image-element" sizes="(min-width: 769px) 80px, 100vw">--}}
{{--                                                                    </image-element>--}}
{{--                                                                </div>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}

{{--                                                    @endforeach--}}
{{--                                                @endif--}}


{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="product-gallery">

                                    <style>
                                        .product-gallery {
                                            max-width: 600px;    /* hoặc bao nhiêu bạn muốn */
                                            margin: auto;
                                        }
                                        .product-gallery .swiper {
                                            width: 100%;
                                            overflow: hidden;    /* quan trọng */
                                        }
                                        .product-gallery .swiper-slide img {
                                            display: block;
                                            width: 100%;
                                            height: auto;
                                        }

                                        /* Thumbnail styling */
                                        .gallery-thumbs {
                                            margin-top: 10px;
                                        }
                                        .gallery-thumbs .swiper-slide {
                                            width: 80px !important;
                                            height: 80px;
                                            padding: 0;              /* padding nếu cần, nhưng border nên nằm ngoài */
                                            box-sizing: border-box;  /* bao gồm cả border trong width/height */
                                            border: 1px solid transparent;
                                            border-radius: 4px;
                                            overflow: hidden;        /* đảm bảo ảnh không tràn */
                                            cursor: pointer;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        }

                                        .gallery-thumbs .swiper-slide img {
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                            display: block;          /* loại bỏ khoảng trắng bên dưới ảnh */
                                            border: none;            /* xóa border cũ nếu có */
                                        }

                                        .gallery-thumbs .swiper-slide-thumb-active {
                                            border-color: #000;      /* viền đen toàn diện */
                                        }
                                    </style>

{{--                                    <div class="swiper gallery-top">--}}
{{--                                        <div class="swiper-wrapper">--}}
{{--                                            @foreach($productVariant->galleries ?? collect() as $gallery)--}}
{{--                                                @php--}}
{{--                                                    $sizes = [360,540,720,900,1080];--}}
{{--                                                    $srcset = collect($sizes)--}}
{{--                                                      ->map(function($size) use($gallery){--}}
{{--                                                        return "{$gallery->image->path}?width={$size} {$size}w";--}}
{{--                                                      })->implode(', ');--}}
{{--                                                @endphp--}}
{{--                                                <div class="swiper-slide">--}}
{{--                                                    <div class="swiper-zoom-container">--}}
{{--                                                        <img--}}
{{--                                                            src="{{ $gallery->image->path }}?width=1080"--}}
{{--                                                            srcset="{{ $srcset }}"--}}
{{--                                                            sizes="(min-width:769px)50vw,100vw"--}}
{{--                                                            alt="Ảnh SP"--}}
{{--                                                            loading="eager"--}}
{{--                                                        >--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                        <div class="swiper-button-next"></div>--}}
{{--                                        <div class="swiper-button-prev"></div>--}}
{{--                                    </div>--}}


{{--                                    --}}{{-- Thumbnail swiper --}}
{{--                                    <div class="swiper gallery-thumbs">--}}
{{--                                        <div class="swiper-wrapper">--}}
{{--                                            @foreach($productVariant->galleries ?? collect() as $gallery)--}}
{{--                                                @php--}}
{{--                                                    $sizes2 = [120,360,540,720];--}}
{{--                                                    $srcset2 = collect($sizes2)--}}
{{--                                                      ->map(function($s) use($gallery){--}}
{{--                                                        return "{$gallery->image->path}?width={$s} {$s}w";--}}
{{--                                                      })->implode(', ');--}}
{{--                                                @endphp--}}
{{--                                                <div class="swiper-slide">--}}
{{--                                                    <img--}}
{{--                                                        src="{{ $gallery->image->path }}?width=360"--}}
{{--                                                        srcset="{{ $srcset2 }}"--}}
{{--                                                        sizes="80px"--}}
{{--                                                        alt="Thumb"--}}
{{--                                                        loading="eager"--}}
{{--                                                    >--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </div>--}}





                                    <div class="swiper gallery-top" ng-if="galleries.length">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide" ng-repeat="gallery in galleries">
                                                <div class="swiper-zoom-container">
                                                    <img
                                                        ng-src="<%gallery.image.path%>?width=1080"
                                                        srcset="<% getSrcset(gallery, [360,540,720,900,1080]) %>"
                                                        sizes="(min-width:769px)50vw,100vw"
                                                        alt="Ảnh SP"
                                                        loading="eager"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>

                                    <!-- Swiper thumbnail -->
                                    <div class="swiper gallery-thumbs" ng-if="galleries.length">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide" ng-repeat="gallery in galleries">
                                                <img
                                                    ng-src="<%gallery.image.path%>?width=360"
                                                    srcset="<% getSrcset(gallery, [120,360,540,720]) %>"
                                                    sizes="80px"
                                                    alt="Thumb"
                                                    loading="eager"
                                                >
                                            </div>
                                        </div>
                                    </div>







                                </div>

                                <script type="application/json" id="ModelJson-template--18121751003229__main">
                                    []
                                </script>
                            </div>






                            <div class="grid__item medium-up--one-half">
                                <div class="product-single__meta">
                                    <div class="product-block product-block--header">
                                        <div class="product-single__vendor"><a href="/collections/vendors?q=Berry" title="{{ $product->category->name }}">{{ $product->category->name }}</a></div>
                                        <h1 class="h2 product-single__title">{{ $product->name }}</h1>
                                    </div>
                                    <span>
                           <h4 style="font-size:8px;font-weight:lighter;margin-bottom:-10px;margin-top:-20px;align:middle;"></h4>
                        </span>
                                    <div data-product-blocks>
                                        <div class="product-block product-block--price" >
                                            <span data-a11y-price class="visually-hidden"
                                            >Regular price</span>
                                            <span data-product-price class="product__price"><span class=money>{{ formatCurrency($product->price) }} đ</span></span>
                                            <span data-save-price class="product__price-savings hide"></span>
                                            <div
                                                data-unit-price-wrapper
                                                class="product__unit-price product__unit-price--spacing  hide"><span data-unit-price></span>/<span data-unit-base></span>
                                            </div>
                                            <span>
                                 <h4 style="font-size:8px;font-weight:lighter;margin-bottom:-10px;margin-top:-20px;align:middle;"></h4>
                              </span>
                                        </div>
                                        <div id="shopify-block-ANjZTck5zOGl3RUhZV__judge_me_reviews_preview_badge_tCQ3AY" class="shopify-block shopify-app-block">
                                            <div class="jdgm-widget jdgm-preview-badge jdgm-preview-badge--with-link jdgm--done-setup" data-id="7589307678813"
                                                 data-template="manual-installation" data-widget-name="preview_badge"
                                                 data-impressions-tracked="true" data-views-tracked="true">
                                                <div style="display:none" class="jdgm-prev-badge" data-average-rating="4.83"
                                                     data-number-of-reviews="1119" data-number-of-questions="0">
                                                    @php
                                                        $avgFloat  = $product->reviews()
                                                        ->where('status', \App\Model\Admin\Review::STATUS_APPROVED)
                                                        ->avg('rating') ?: 0;
                                                        $avgDisplay= number_format($avgFloat, 2);
                                                        $fullStars = floor($avgFloat);
                                                    @endphp

                                                    <span class="jdgm-prev-badge__stars"
                                                          data-score="{{ $avgDisplay }}"
                                                          tabindex="0"
                                                          aria-label="{{ $avgDisplay }} stars"
                                                          role="button">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <span class="jdgm-star {{ $i <= $fullStars ? 'jdgm--on' : 'jdgm--off' }}"></span>
                                                        @endfor
                                                    </span>

                                                    <span class="jdgm-prev-badge__text">
                                                            {{ $product->reviews()
                                                                        ->where('status', \App\Model\Admin\Review::STATUS_APPROVED)
                                                                        ->count() }} đánh giá
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-block" >
                                        </div>
                                        <div class="product-block" >
                                            <hr>
                                        </div>

                                        <variant-swatch-king style="max-width: 100%;">
                                            <div class="swatches swatches-type-products hover-enabled">
                                                <div sa-group-position="top">
                                                    <div id="swatch-group4966814" option-name="Selected option" option-target="group4966814" type-group="true">
                                                        <div class="swatch-single swatch-preset-1078678 swatch-view-slide" data-group-index="24">
                                                            <fieldset>
                                                                <legend><label class="swatch-label swatch-label-image ">
                                                                        <input type="checkbox" name="Selected option" value="true" checked="checked">
                                                                        <span class="swatch-option-name">Selected option</span>
                                                                    </label>
                                                                </legend>
                                                                <span class="swatch-label-container">
                                                                    <label class="visually-hidden-label"><span class="swatch-option-name">Selected option</span></label></span>
                                                                <div class="swatch-navigable-wrapper">
                                                                    <div class="swatch-navigable" swatch-slider="true" data-slider-data="{&quot;swatchSliderItemWidth&quot;:66,&quot;totalScrollWidth&quot;:626,&quot;sliderWidth&quot;:654,&quot;visibleSwatches&quot;:9,&quot;marginRight&quot;:4,&quot;swatchType&quot;:&quot;polaroid-swatch&quot;,&quot;assocViewType&quot;:&quot;swatch&quot;,&quot;arrowMode&quot;:&quot;mode_1&quot;}">
                                                                        <div class="swatch-navigation-wrapper" navigation="left">
                                                                            <div class="swatch-navigation swatch-navigation-left" data-navigation="left" role="presentation" tabindex="0">
                                                                                <svg viewBox="0 0 24 24" focusable="false" swatch-inside="true" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                                                                                    <path swatch-inside="true" d="M0 0h24v24H0z" fill="none"></path>
                                                                                    <path swatch-inside="true" d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        <ul class="swatch-view swatch-view-image " role="radiogroup" style="transform: translateX(0px); display: flex;">

{{--                                                                            @foreach($product->variants as $variant)--}}
{{--                                                                               <a href="{{ route('front.show-product-detail', $variant->slug) }}">--}}
{{--                                                                                   <li class="swatch-view-item" orig-value=">{{ $variant->color->name }}" aria-label=">{{ $variant->color->name }}" role="radio" aria-checked="{{ $variant->id == $productVariant->id ? 'true' : 'false' }}" tabindex="0" style="width: 66px; margin-right: 8px;">--}}
{{--                                                                                       <div class="swatch-image swatch-group-selector {{ $variant->id == $productVariant->id ? 'swatch-selected' : '' }} " type="image" data-value="Berry" orig-value="Berry"--}}
{{--                                                                                            swatch-url="{{ route('front.show-product-detail', $variant->slug) }}"--}}
{{--                                                                                            swatch-option="group4966814" current-product="true">--}}
{{--                                                                                           <div style="width:66px;height:99px;--}}
{{--                                                                                        background-image:url('{{ @$variant->image->path ?? '' }}');"--}}
{{--                                                                                                class="star-set-image" swatch-inside="true"><i class="hidden"></i></div>--}}
{{--                                                                                           <div class="swatch-img-text-adjacent" swatch-inside="true">--}}
{{--                                                                                               <p swatch-inside="true">{{ $variant->color->name }}</p>--}}
{{--                                                                                           </div>--}}
{{--                                                                                       </div>--}}
{{--                                                                                   </li>--}}
{{--                                                                               </a>--}}
{{--                                                                            @endforeach--}}



                                                                                @foreach($product->variants as $variant)
                                                                                    <a href="javascript:void(0)" ng-click="chooseVariant({{$variant}})">
                                                                                        <li class="swatch-view-item" orig-value=">{{ $variant->color->name }}" aria-label=">{{ $variant->color->name }}" role="radio" aria-checked="{{ $variant->id == $productVariant->id ? 'true' : 'false' }}" tabindex="0" style="width: 66px; margin-right: 8px;">
                                                                                            <div class="swatch-image swatch-group-selector <% '{{$variant->id}}' == selectedVariant.id ? 'swatch-selected' : '' %> " type="image" data-value="Berry" orig-value="Berry"
                                                                                                 swatch-url="{{ route('front.show-product-detail', $variant->slug) }}"
                                                                                                 swatch-option="group4966814" current-product="true">
                                                                                                <div style="width:66px;height:99px;
                                                                                        background-image:url('{{ @$variant->image->path ?? '' }}');"
                                                                                                     class="star-set-image" swatch-inside="true"><i class="hidden"></i></div>
                                                                                                <div class="swatch-img-text-adjacent" swatch-inside="true">
                                                                                                    <p swatch-inside="true">{{ $variant->color->name }}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </li>
                                                                                    </a>
                                                                                @endforeach
                                                                        </ul>
                                                                        <div class="swatch-navigation-wrapper" navigation="right">
                                                                            <div class="swatch-navigation swatch-navigation-right" data-navigation="right" role="presentation" tabindex="0">
                                                                                <svg viewBox="0 0 24 24" focusable="false" swatch-inside="true" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                                                                                    <path swatch-inside="true" d="M0 0h24v24H0z" fill="none"></path>
                                                                                    <path swatch-inside="true" d="M8.59,16.59L13.17,12L8.59,7.41L10,6l6,6l-6,6L8.59,16.59z"></path>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div sa-group-position="bottom"></div>
                                            </div>
                                        </variant-swatch-king>

                                        <div class="product-block" data-dynamic-variants-enabled >
                                            <div class="variant-wrapper js" data-type="button">
                                                <label class="variant__label"
                                                       for="ProductSelect-template--18121751003229__main-7589307777117-option-0">
                                                    Size
                                                </label>
                                                <fieldset class="variant-input-wrap"
                                                          name="Size"
                                                          data-index="option1"
                                                          data-handle="size"
                                                          id="ProductSelect-template--18121751003229__main-7589307777117-option-0">
                                                    <legend class="hide">Size</legend>

{{--                                                    @foreach($productVariant->sizesStock as $key => $sizeStock)--}}
{{--                                                        <div--}}
{{--                                                            class="variant-input"--}}
{{--                                                            data-index="option{{$key}}"--}}
{{--                                                            data-value="{{ $sizeStock->size->name }}">--}}
{{--                                                            <input type="radio"--}}
{{--                                                                   value="{{ $sizeStock->size->name }}"--}}
{{--                                                                   data-index="option{{$key}}"--}}
{{--                                                                   name="Size"--}}
{{--                                                                   ng-click="chooseSize({{ $sizeStock }})"--}}
{{--                                                                   ng-checked="sizeVariantSelected && sizeVariantSelected.size.name === '{{ $sizeStock->size->name }}'"--}}
{{--                                                                   class="{{ $sizeStock->stock == 0 ? 'disabled' : '' }}"--}}
{{--                                                                   id="ProductSelect-template--18121751003229__main-7589307777117-option-size-{{ $sizeStock->size->name }}"><label--}}
{{--                                                                for="ProductSelect-template--18121751003229__main-7589307777117-option-size-{{ $sizeStock->size->name }}"--}}
{{--                                                                class="variant__button-label {{ $sizeStock->stock == 0 ? 'disabled' : '' }}">{{ $sizeStock->size->name }}</label>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}

                                                    <div class="variant-input"
                                                         ng-repeat="(key, sizeStock) in selectedVariant.sizesStock"
                                                         data-index="option<%$index%>"
                                                         data-value="<%sizeStock.size.name %>">
                                                        <input type="radio"
                                                               name="Size"
                                                               value="<% sizeStock.size.name %>"
                                                               data-index="option<%$index%>"
                                                               id="ProductSelect-template--18121751003229__main-7589307777117-option-size-<% sizeStock.size.name %>"
                                                               ng-click="chooseSize(sizeStock)"
                                                               ng-checked="sizeVariantSelected && sizeVariantSelected.size.name === sizeStock.size.name"
                                                               ng-class="{'disabled': sizeStock.stock == 0}">
                                                        <label for="ProductSelect-template--18121751003229__main-7589307777117-option-size-<% sizeStock.size.name %>"
                                                               class="variant__button-label"
                                                               ng-class="{'disabled': sizeStock.stock == 0}">
                                                            <% sizeStock.size.name %>
                                                        </label>
                                                    </div>

                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="product-block" >
                                            <div class="product-block">

                                                <button type="button" name="add" class="btn btn--full add-to-cart"
                                                        ng-if="sizeVariantSelected.stock == 0"
                                                        disabled="disabled">
                                                       <span data-add-to-cart-text data-default-text="Add to cart">Sold out</span>
                                                </button>

                                                <a href="#" class="js-drawer-open-cart" aria-controls="CartDrawer">
                                                    <button type="submit" name="add" ng-if="sizeVariantSelected.stock > 0"
                                                            ng-click="addToCart({{ $product->id }},  $event)"
                                                            class="btn btn--full add-to-cart">
                                                        <span data-add-to-cart-text="" data-default-text="Add to cart">Add to cart</span>
                                                    </button>
                                                </a>


                                            </div>


                                        </div>
                                        <div class="product-block" >
                                            <hr style="margin-top:-25px; margin-bottom:-15px;" width="175px" align="left">
                                        </div>

                                        <div class="product-block" >
                                        </div>
                                        <div class="product-block product-block--tab" >
                                            <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom">
                                                <button type="button"
                                                        class="label collapsible-trigger collapsible-trigger-btn collapsible-trigger-btn--borders collapsible--auto-height" aria-controls="Product-content-d6cb0be8-3250-4a9e-9573-54adeeb61a637589307777117"
                                                >
                                                    Product Features
                                                    <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                       <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                          <path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/>
                                       </svg>
                                    </span>
                                                </button>

                                                <div id="Product-content-d6cb0be8-3250-4a9e-9573-54adeeb61a637589307777117"
                                                     class="collapsible-content collapsible-content--all"
                                                >
                                                    <div class="collapsible-content__inner rte">
                                                        {!! $product->features !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-block product-block--tab" >
                                            <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom">
                                                <button type="button"
                                                        class="label collapsible-trigger collapsible-trigger-btn collapsible-trigger-btn--borders collapsible--auto-height" aria-controls="Product-content-a6fc2c8f-c5b8-4590-9610-88fa7d9de6c57589307777117"
                                                >
                                                    Size Chart
                                                    <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                       <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                          <path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/>
                                       </svg>
                                    </span>
                                                </button>
                                                <div id="Product-content-a6fc2c8f-c5b8-4590-9610-88fa7d9de6c57589307777117"
                                                     class="collapsible-content collapsible-content--all"
                                                >
                                                    <div class="collapsible-content__inner rte">
                                                        <meta charset="utf-8">
                                                        <div style="text-align: center;" data-mce-style="text-align: center;"></div>
                                                        <div style="text-align: center;" data-mce-style="text-align: center;">
                                                           {!! $product->model_sizes !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-block product-block--tab" >
                                            <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom">
                                                <button type="button"
                                                        class="label collapsible-trigger collapsible-trigger-btn collapsible-trigger-btn--borders collapsible--auto-height" aria-controls="Product-content-tab7589307777117"
                                                >
                                                    Shipping & Returns
                                                    <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                       <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                          <path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/>
                                       </svg>
                                    </span>
                                                </button>
                                                <div id="Product-content-tab7589307777117"
                                                     class="collapsible-content collapsible-content--all"
                                                >
                                                    <div class="collapsible-content__inner rte">

                                                        {!! $product->delivery_note !!}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        @if($productsSuggest->count())
                                            <div class="product-block">
                                                <div class="related-products-wrapper">


                                                    <h4>Complete your look</h4>
                                                    <div class="related-product-list">
                                                        @foreach($productsSuggest as $pSuggest)
                                                            <a href="{{ route('front.show-product-detail', $pSuggest->variantDefault->slug) }}">
                                                                <div class="related-product">
                                                                    <div class="related-product-image">
                                                                        <img src="{{ $pSuggest->variantDefault ? $pSuggest->variantDefault->image->path : '' }}">
                                                                    </div>
                                                                    <div class="related-product-name">{{$pSuggest->name}}</div>
                                                                    <div class="related-product-colour">
                                                                        <h4 style="letter-spacing:0.3em;font-size:0.8em;margin-top:3px;opacity:0.65;margin-bottom:-3px;">
                                                                            {{ $pSuggest->variantDefault ? $pSuggest->variantDefault->color->name : '' }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    </div>

                                                </div>

                                            </div>

                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section id="shopify-section-template--18121751003229__17321898911583408b" class="shopify-section">
            <div class="index-section">
                <div class="page-width">
                    <h2 class="jdgm-rev-widg__title" style="text-align: center">{{ $product->name }}</h2>

                    <div>
                        {!! $product->body !!}
                    </div>
                </div>
            </div>
        </section>



        <section id="shopify-section-template--18169556893789__17321898911583408b"
                 class="shopify-section"><div class="index-section">
                <div class="page-width">
                    <div id="shopify-block-AbjZCZHF0L0hYbXFlM__judge_me_reviews_review_widget_zXiWxw" class="shopify-block shopify-app-block"><div style="clear:both"></div>
                        <div id="judgeme_product_reviews" class="jdgm-widget jdgm-review-widget jdgm--done-setup-widget" data-product-title="Dynamic Twist Back Bra" data-id="7589307678813" data-widget-name="review_widget" data-impressions-tracked="true" data-views-tracked="true" data-clicks-tracked="true">
                            <div class="jdgm-rev-widg" data-updated-at="2025-04-26T00:58:56Z" data-average-rating="4.83" data-number-of-reviews="1119" data-number-of-questions="0">
                                <style class="jdgm-temp-hiding-style">.jdgm-rev-widg{ display: none }</style>
                                <div class="jdgm-rev-widg__header">
                                    <h2 class="jdgm-rev-widg__title">Customer Reviews
                                    </h2>
                                    <div class="jdgm-row-stars">
                                        <div class="jdgm-rev-widg__summary">
                                            <div class="jdgm-rev-widg__summary-inner">

                                                @php
                                                    $avgFloat    = $product->reviews()->avg('rating') ?: 0;
                                                    $avgDisplay  = number_format($avgFloat, 2);
                                                    $fullStars   = floor($avgFloat);
                                                    $hasHalfStar = ($avgFloat - $fullStars) >= 0.5;
                                                @endphp

                                                <div class="jdgm-rev-widg__summary-stars"
                                                     aria-label="Average rating is {{ $avgDisplay }} stars"
                                                     role="img">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $fullStars)
                                                            <span class="jdgm-star jdgm--on"></span>
                                                        @elseif ($i === $fullStars + 1 && $hasHalfStar)
                                                            <span class="jdgm-star jdgm--half"></span>
                                                        @else
                                                            <span class="jdgm-star jdgm--off"></span>
                                                        @endif
                                                    @endfor
                                                        <span class="jdgm-rev-widg__summary-average">  {{ $avgDisplay }} out of 5</span>
                                                </div>

                                            </div>
                                        </div><div class="jdgm-histogram jdgm-temp-hidden">
                                            @foreach($distribution as $row)
                                                <div class="jdgm-histogram__row"
                                                     data-rating="{{ $row['rating'] }}"
                                                     data-frequency="{{ $row['frequency'] }}"
                                                     data-percentage="{{ $row['percentage'] }}">
                                                    {{-- Stars --}}
                                                    <div class="jdgm-histogram__star"
                                                         role="button"
                                                         aria-label="{{ $row['percentage'] }}% ({{ $row['frequency'] }}) reviews with {{ $row['rating'] }} star rating"
                                                         tabindex="0">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <span class="jdgm-star jdgm--{{ $i <= $row['rating'] ? 'on' : 'off' }}"></span>
                                                        @endfor
                                                    </div>

                                                    {{-- Bar --}}
                                                    <div class="jdgm-histogram__bar">
                                                        <div class="jdgm-histogram__bar-content"
                                                             style="width: {{ $row['percentage'] }}%;"></div>
                                                    </div>

                                                    {{-- Frequency --}}
                                                    <div class="jdgm-histogram__frequency">
                                                        {{ $row['frequency'] }}
                                                    </div>
                                                </div>
                                            @endforeach


                                            <div class="jdgm-histogram__row jdgm-histogram__clear-filter" data-rating="null" tabindex="0" style="display: block;">
                                                View all review
                                            </div>
                                        </div>

                                        <div class="jdgm-widget-actions-wrapper">
                                            <a style="" href="javascript:void(0)" class="jdgm-write-rev-link" role="button"
                                               aria-expanded="<% showReviewForm %>"
                                               ng-click="openReviewForm($event)"
                                               aria-expanded="false">
                                                Write review
                                            </a>
                                        </div>

                                        </div>

                                    <div class="jdgm-form-wrapper" ng-show="showReviewForm" id="jdgm_form_wrapper">
                                        <form class="jdgm-form" novalidate="novalidate">
                                            <div class="jdgm-form__title">
                                              <% checkSendRating ? ' Thank you for leaving a review. Your review is pending approval.' : 'Review'%>
                                            </div>

                                            <div ng-if="! checkSendRating">
                                                <div class="jdgm-form__fieldset" aria-label="Rating">
                                                    <label>Rating</label>
                                                    <span class="jdgm-form__rating" style="cursor: pointer;">
                                                    <a ng-repeat="star in [1,2,3,4,5]" class="jdgm-star" ng-class="{
                                                               'jdgm--on': star <= formReview.rating,
                                                               'jdgm--off': star >  formReview.rating }"
                                                       title="<%star%> star"
                                                       data-alt="<%star%>"
                                                       aria-label="<%star%> star"
                                                       role="button"
                                                       ng-click="formReview.rating = star">
                                                            </a>
                                                            <input name="score"
                                                                   type="hidden"
                                                                   ng-model="formReview.rating">
                                                </span>
                                                </div>

                                                <div class="jdgm-form__fieldset">
                                                    <label class="jdgm-form__inline-label" for="jdgm_review_reviewer_name_du88for2a">Full Name</label>
                                                    <input id="jdgm_review_reviewer_name_du88for2a" name="reviewer_name" type="text"
                                                           ng-model="formReview.name"
                                                           placeholder="Nhập họ tên (public)" aria-label="Name">

                                                    <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.name']">
                                                            <span >
                                                                <% errors['formReview.name'][0] %>
                                                            </span>
                                                    </div>
                                                </div>

                                                <div class="jdgm-form__fieldset jdgm-form__email-fieldset">

                                                    <label for="jdgm_review_reviewer_email_du88for2a">Email</label>
                                                    <input id="jdgm_review_reviewer_email_du88for2a" name="reviewer_email" type="text"
                                                           ng-model="formReview.email"
                                                           required="" placeholder="Nhập email (private)" aria-label="Email"
                                                    >
                                                    <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.email']">
                                                            <span >
                                                                <% errors['formReview.email'][0] %>
                                                            </span>
                                                    </div>
                                                </div>

                                                <div class="jdgm-form__fieldset">

                                                    <label class="jdgm-form__inline-label" for="jdgm_review_title_du88for2a">Review Title</label><span class="jdgm-countdown"></span>
                                                    <input id="jdgm_review_title_du88for2a" name="review_title" type="text" placeholder="Give your review a title"
                                                           ng-model="formReview.title"
                                                           aria-label="Review Title">
                                                    <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.title']">
                                                            <span >
                                                                <% errors['formReview.title'][0] %>
                                                            </span>
                                                    </div>
                                                </div>

                                                <div class="jdgm-form__fieldset">

                                                    <label class="jdgm-form__inline-label" for="jdgm_review_body_du88for2a">Review</label><span class="jdgm-countdown"></span>
                                                    <textarea id="jdgm_review_body_du88for2a" rows="5" name="review_body" placeholder="Write your comments here"
                                                              ng-model="formReview.content"
                                                              aria-label="Review">

                                                </textarea>
                                                    <div class="invalid-feedback d-block error" role="alert" ng-if="errors && errors['formReview.content']">
                                                            <span >
                                                                <% errors['formReview.content'][0] %>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="jdgm-form__fieldset jdgm-form__fieldset-actions" ng-if="! checkSendRating">
                                                <a href="javascript:void(0)" role="button" class="jdgm-btn jdgm-btn--border jdgm-cancel-rev "  ng-click="closeReviewForm($event)">Close</a>
                                                <input type="button" class="jdgm-btn jdgm-btn--solid jdgm-submit-rev " value="Send" ng-click="submitReview()">
                                            </div>
                                        </form>
                                    </div>



                                </div>
                                <div class="jdgm-row-actions">
                                    <div class="">
                                        <div class="">
                                            <select class="jdgm-sort" aria-label="Sort dropdown">
                                                <option value="most-recent">Newest</option>
                                                <option value="highest-rating">Highest Rating</option>
                                                <option value="lowest-rating">Lowest Rating</option>
                                            </select>
                                            <span class="jdgm-sort-dropdown-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="jdgm-rev-widg__body" style="">
{{--                                    @foreach($reviews as $review)--}}
{{--                                        <div class="jdgm-rev-widg__reviews">--}}
{{--                                            <div class="jdgm-rev jdgm-divider-top jdgm--done-setup" data-verified-buyer="true"--}}
{{--                                                 data-review-id="f4a4a380-f318-4e3b-978d-8165f04ff538"--}}
{{--                                                 data-product-title="Dynamic Twist Back Bra"--}}
{{--                                                 data-product-url="#" data-thumb-up-count="0" data-thumb-down-count="0">--}}
{{--                                                <div class="jdgm-rev__header">--}}
{{--                                                    <div class="jdgm-row-product"></div>--}}
{{--                                                    <div class="jdgm-row-profile">--}}
{{--                                                        <div class="jdgm-rev__icon"></div>--}}
{{--                                                        <span class="jdgm-rev__author-wrapper">--}}
{{--                                                    <span class="jdgm-rev__author">{{ $review->user_name }}</span>--}}
{{--                                                        <span class="jdgm-rev__buyer-badge-wrapper">--}}
{{--                                                            <span class="jdgm-rev__buyer-badge"></span>--}}
{{--                                                        </span>--}}

{{--                                                    </span>--}}

{{--                                                        <div class="jdgm-rev__header-custom-form custom-form--horizontal-style">--}}
{{--                                                            <div class="jdgm-rev__cf-ans--type jdgm-rev__cf-ans--text-type"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="jdgm-rev__br"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="jdgm-rev__content">--}}
{{--                                                    <div class="jdgm-row-rating">--}}

{{--                                                        <span class="jdgm-rev__rating" data-score="3" tabindex="0" aria-label="3 star review" role="img">--}}
{{--                                                              @for($i = 1; $i <= 5; $i++)--}}
{{--                                                                <span class="jdgm-star jdgm--{{ $i <= $review->rating ? 'on' : 'off' }}"></span>--}}
{{--                                                            @endfor--}}
{{--                                                        </span>--}}
{{--                                                        <span class="jdgm-rev__timestamp" data-content="2025-03-21 10:06:11 UTC">--}}
{{--                                                            {{ $review->created_at->format('d/m/y H:i') }}--}}
{{--                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                    <b class="jdgm-rev__title">{{ $review->title }}</b>--}}
{{--                                                    <div class="jdgm-rev__body" style="overflow-wrap: break-word;">--}}
{{--                                                       {!! $review->content !!}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="jdgm-rev__actions">--}}
{{--                                                    <div class="jdgm-rev__social"></div>--}}
{{--                                                    <div class="jdgm-rev__votes"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}


{{--                                    <div class="jdgm-paginate" data-per-page="5" data-url="https://api.judge.me/reviews/reviews_for_widget">--}}
{{--                                        <a class="jdgm-btn jdgm-btn--solid jdgm-paginate__load-more" data-page="2" role="button">Load More</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class="jdgm-rev-widg__body" id="review-container">
                                    @include('site.partials.review')
                                </div>

                                @if($reviews->hasMorePages())
                                    <div class="jdgm-paginate text-center mt-3">
                                        <a href="#"
                                           id="load-more"
                                           class="jdgm-btn jdgm-btn--solid jdgm-paginate__load-more"
                                           data-url="{{ route('front.getMoreReview', $product->id) }}"
                                           data-page="2">
                                            Show more
                                        </a>
                                    </div>
                                @endif

                                <div class="jdgm-rev-widg__paginate-spinner-wrapper" style="display: none;"> <div class="jdgm-spinner"></div> </div> </div>
                        </div>




                    </div>
                </div>
            </div>
        </section>
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


    </div>
    <div id="shopify-block-AVFIySTFEaVpmWUFPS__144831480468751239" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: vite-tag -->


        <script src="/site/js/app-embed-C2qg5SV6.js" type="module" crossorigin="anonymous"></script>
        <link rel="modulepreload" href="https://cdn.shopify.com/extensions/9c652dcc-fd78-477d-9e73-b38f552f64b9/essential-upsell-136/assets/stylex-K6Pfmy25.js"
              crossorigin="anonymous">
        <link href="/site/css/stylex-DFEZgduC.css" rel="stylesheet" type="text/css" media="all" />

        <essential-upsell-app-embed
                upsell-app-data="{&quot;funnels&quot;:[{&quot;id&quot;:&quot;02ccd4be-24a1-4591-a4ec-3547c0942e81&quot;,&quot;content&quot;:{&quot;offerType&quot;:&quot;CROSS_SELL&quot;,&quot;titleText&quot;:&quot;You may also like&quot;,&quot;buttonText&quot;:&quot;Add&quot;},&quot;upsell&quot;:{&quot;productsType&quot;:&quot;SPECIFIC&quot;,&quot;discountType&quot;:&quot;NONE&quot;,&quot;discountValue&quot;:null,&quot;specificProducts&quot;:[{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7237855379549&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-pink-apparel-accessories-240112&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7237855445085&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240112&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7551498616925&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240303&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208654941&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-midnight-black-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208687709&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-pistachio-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208720477&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-ice-blue-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7691208753245&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-light-rose-pink-apparel-accessories-240403&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7551498584157&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240302&quot;},{&quot;shopifyId&quot;:&quot;gid://shopify/Product/7551498551389&quot;,&quot;shopifyHandle&quot;:&quot;dfyne-accessories-black-apparel-accessories-240301&quot;}]},&quot;design&quot;:{&quot;layoutType&quot;:&quot;STACKED&quot;,&quot;stackedProductsCount&quot;:1,&quot;backgroundType&quot;:&quot;MONOCHROME&quot;,&quot;monochromeBackgroundColor&quot;:&quot;#ffffff&quot;,&quot;gradientBackgroundStartColor&quot;:null,&quot;gradientBackgroundEndColor&quot;:null,&quot;gradientBackgroundAngle&quot;:null,&quot;borderRadius&quot;:8,&quot;borderSize&quot;:1,&quot;borderColor&quot;:&quot;#c5c8d1&quot;,&quot;insideTopSpacing&quot;:10,&quot;insideBottomSpacing&quot;:10,&quot;outsideTopSpacing&quot;:20,&quot;outsideBottomSpacing&quot;:20,&quot;font&quot;:&quot;INHERIT&quot;,&quot;titleSize&quot;:16,&quot;titleColor&quot;:&quot;#202223&quot;,&quot;productTitleSize&quot;:14,&quot;productTitleColor&quot;:&quot;#202223&quot;,&quot;productVariantSize&quot;:14,&quot;productVariantColor&quot;:&quot;#96a4b6&quot;,&quot;productPriceSize&quot;:14,&quot;productPriceColor&quot;:&quot;#96a4b6&quot;,&quot;discountedPriceSize&quot;:14,&quot;discountedPriceColor&quot;:&quot;#fa493d&quot;,&quot;buttonBackgroundColor&quot;:&quot;#202223&quot;,&quot;buttonTextSize&quot;:14,&quot;buttonTextColor&quot;:&quot;#fafafa&quot;,&quot;buttonBorderRadius&quot;:4,&quot;navigationIconColor&quot;:&quot;#333333&quot;,&quot;checkboxIconColor&quot;:null,&quot;checkboxBackgroundColor&quot;:null,&quot;checkboxBorderColor&quot;:null},&quot;placement&quot;:{&quot;type&quot;:&quot;CART_PAGE&quot;,&quot;triggerType&quot;:&quot;ALL&quot;,&quot;cartPagePositionType&quot;:&quot;BOTTOM_OF_THE_CART&quot;,&quot;specificProducts&quot;:[],&quot;specificCollections&quot;:[]}}]}"
                product-page-product="{&quot;id&quot;:7651869524061,&quot;title&quot;:&quot;Motion Square Neck Bra&quot;,&quot;handle&quot;:&quot;dfyne-motion-mulberry-sports-bras-240402&quot;,&quot;description&quot;:&quot;\u003cp\u003eMotion Collection\u003c\/p\u003e&quot;,&quot;published_at&quot;:&quot;2025-04-10T16:00:17+01:00&quot;,&quot;created_at&quot;:&quot;2024-07-24T16:01:40+01:00&quot;,&quot;vendor&quot;:&quot;Mulberry&quot;,&quot;type&quot;:&quot;Sports Bras&quot;,&quot;tags&quot;:[&quot;_label_NEW&quot;,&quot;JMR::Motion Square Neck Bra&quot;,&quot;Motion&quot;,&quot;Mulberry&quot;,&quot;New Releases&quot;,&quot;Pink&quot;,&quot;Purple&quot;,&quot;restock recent&quot;,&quot;SAPG::Motion Square Neck Bra::Mulberry&quot;,&quot;Seamless&quot;,&quot;Sports Bras&quot;,&quot;Womens&quot;,&quot;Womenswear&quot;],&quot;price&quot;:3750,&quot;price_min&quot;:3750,&quot;price_max&quot;:3750,&quot;available&quot;:false,&quot;price_varies&quot;:false,&quot;compare_at_price&quot;:null,&quot;compare_at_price_min&quot;:0,&quot;compare_at_price_max&quot;:0,&quot;compare_at_price_varies&quot;:false,&quot;variants&quot;:[{&quot;id&quot;:42511309209693,&quot;title&quot;:&quot;XS&quot;,&quot;option1&quot;:&quot;XS&quot;,&quot;option2&quot;:null,&quot;option3&quot;:null,&quot;sku&quot;:&quot;240402-29-7-19-13&quot;,&quot;requires_shipping&quot;:true,&quot;taxable&quot;:true,&quot;featured_image&quot;:null,&quot;available&quot;:false,&quot;name&quot;:&quot;Motion Square Neck Bra - XS&quot;,&quot;public_title&quot;:&quot;XS&quot;,&quot;options&quot;:[&quot;XS&quot;],&quot;price&quot;:3750,&quot;weight&quot;:150,&quot;compare_at_price&quot;:null,&quot;inventory_management&quot;:&quot;shopify&quot;,&quot;barcode&quot;:null,&quot;requires_selling_plan&quot;:false,&quot;selling_plan_allocations&quot;:[],&quot;quantity_rule&quot;:{&quot;min&quot;:1,&quot;max&quot;:null,&quot;increment&quot;:1}},{&quot;id&quot;:42511309242461,&quot;title&quot;:&quot;S&quot;,&quot;option1&quot;:&quot;S&quot;,&quot;option2&quot;:null,&quot;option3&quot;:null,&quot;sku&quot;:&quot;240402-29-7-19-14&quot;,&quot;requires_shipping&quot;:true,&quot;taxable&quot;:true,&quot;featured_image&quot;:null,&quot;available&quot;:false,&quot;name&quot;:&quot;Motion Square Neck Bra - S&quot;,&quot;public_title&quot;:&quot;S&quot;,&quot;options&quot;:[&quot;S&quot;],&quot;price&quot;:3750,&quot;weight&quot;:150,&quot;compare_at_price&quot;:null,&quot;inventory_management&quot;:&quot;shopify&quot;,&quot;barcode&quot;:null,&quot;requires_selling_plan&quot;:false,&quot;selling_plan_allocations&quot;:[],&quot;quantity_rule&quot;:{&quot;min&quot;:1,&quot;max&quot;:null,&quot;increment&quot;:1}},{&quot;id&quot;:42511309275229,&quot;title&quot;:&quot;M&quot;,&quot;option1&quot;:&quot;M&quot;,&quot;option2&quot;:null,&quot;option3&quot;:null,&quot;sku&quot;:&quot;240402-29-7-19-15&quot;,&quot;requires_shipping&quot;:true,&quot;taxable&quot;:true,&quot;featured_image&quot;:null,&quot;available&quot;:false,&quot;name&quot;:&quot;Motion Square Neck Bra - M&quot;,&quot;public_title&quot;:&quot;M&quot;,&quot;options&quot;:[&quot;M&quot;],&quot;price&quot;:3750,&quot;weight&quot;:150,&quot;compare_at_price&quot;:null,&quot;inventory_management&quot;:&quot;shopify&quot;,&quot;barcode&quot;:null,&quot;requires_selling_plan&quot;:false,&quot;selling_plan_allocations&quot;:[],&quot;quantity_rule&quot;:{&quot;min&quot;:1,&quot;max&quot;:null,&quot;increment&quot;:1}},{&quot;id&quot;:42511309307997,&quot;title&quot;:&quot;L&quot;,&quot;option1&quot;:&quot;L&quot;,&quot;option2&quot;:null,&quot;option3&quot;:null,&quot;sku&quot;:&quot;240402-29-7-19-16&quot;,&quot;requires_shipping&quot;:true,&quot;taxable&quot;:true,&quot;featured_image&quot;:null,&quot;available&quot;:false,&quot;name&quot;:&quot;Motion Square Neck Bra - L&quot;,&quot;public_title&quot;:&quot;L&quot;,&quot;options&quot;:[&quot;L&quot;],&quot;price&quot;:3750,&quot;weight&quot;:150,&quot;compare_at_price&quot;:null,&quot;inventory_management&quot;:&quot;shopify&quot;,&quot;barcode&quot;:null,&quot;requires_selling_plan&quot;:false,&quot;selling_plan_allocations&quot;:[],&quot;quantity_rule&quot;:{&quot;min&quot;:1,&quot;max&quot;:null,&quot;increment&quot;:1}},{&quot;id&quot;:42511309340765,&quot;title&quot;:&quot;XL&quot;,&quot;option1&quot;:&quot;XL&quot;,&quot;option2&quot;:null,&quot;option3&quot;:null,&quot;sku&quot;:&quot;240402-29-7-19-17&quot;,&quot;requires_shipping&quot;:true,&quot;taxable&quot;:true,&quot;featured_image&quot;:null,&quot;available&quot;:false,&quot;name&quot;:&quot;Motion Square Neck Bra - XL&quot;,&quot;public_title&quot;:&quot;XL&quot;,&quot;options&quot;:[&quot;XL&quot;],&quot;price&quot;:3750,&quot;weight&quot;:150,&quot;compare_at_price&quot;:null,&quot;inventory_management&quot;:&quot;shopify&quot;,&quot;barcode&quot;:null,&quot;requires_selling_plan&quot;:false,&quot;selling_plan_allocations&quot;:[],&quot;quantity_rule&quot;:{&quot;min&quot;:1,&quot;max&quot;:null,&quot;increment&quot;:1}}],&quot;images&quot;:[&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0888_2-Edit-2_e3ad4b91-dc47-4ad8-ad26-8c8cf91bb768.jpg?v=1744383182&quot;,&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0877_2-Edit-2_06af9f5e-9577-4ed3-ae4d-0110ef0a780a.jpg?v=1744383182&quot;,&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0866_2-Edit-2_ac2fb21a-dce6-4089-bffb-cc6325bba940.jpg?v=1744383182&quot;,&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0882_2-Edit-2_1be8eb28-e531-4910-9d9b-b8b500dfe71e.jpg?v=1744383182&quot;],&quot;featured_image&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0888_2-Edit-2_e3ad4b91-dc47-4ad8-ad26-8c8cf91bb768.jpg?v=1744383182&quot;,&quot;options&quot;:[&quot;Size&quot;],&quot;media&quot;:[{&quot;alt&quot;:null,&quot;id&quot;:29414124453981,&quot;position&quot;:1,&quot;preview_image&quot;:{&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;width&quot;:2000,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0888_2-Edit-2_e3ad4b91-dc47-4ad8-ad26-8c8cf91bb768.jpg?v=1744383182&quot;},&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;media_type&quot;:&quot;image&quot;,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0888_2-Edit-2_e3ad4b91-dc47-4ad8-ad26-8c8cf91bb768.jpg?v=1744383182&quot;,&quot;width&quot;:2000},{&quot;alt&quot;:null,&quot;id&quot;:29400808259677,&quot;position&quot;:2,&quot;preview_image&quot;:{&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;width&quot;:2000,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0877_2-Edit-2_06af9f5e-9577-4ed3-ae4d-0110ef0a780a.jpg?v=1744383182&quot;},&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;media_type&quot;:&quot;image&quot;,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0877_2-Edit-2_06af9f5e-9577-4ed3-ae4d-0110ef0a780a.jpg?v=1744383182&quot;,&quot;width&quot;:2000},{&quot;alt&quot;:null,&quot;id&quot;:29414124421213,&quot;position&quot;:3,&quot;preview_image&quot;:{&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;width&quot;:2000,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0866_2-Edit-2_ac2fb21a-dce6-4089-bffb-cc6325bba940.jpg?v=1744383182&quot;},&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;media_type&quot;:&quot;image&quot;,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0866_2-Edit-2_ac2fb21a-dce6-4089-bffb-cc6325bba940.jpg?v=1744383182&quot;,&quot;width&quot;:2000},{&quot;alt&quot;:null,&quot;id&quot;:29400808292445,&quot;position&quot;:4,&quot;preview_image&quot;:{&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;width&quot;:2000,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0882_2-Edit-2_1be8eb28-e531-4910-9d9b-b8b500dfe71e.jpg?v=1744383182&quot;},&quot;aspect_ratio&quot;:1.0,&quot;height&quot;:2000,&quot;media_type&quot;:&quot;image&quot;,&quot;src&quot;:&quot;\/\/dfyne.com\/cdn\/shop\/files\/IMG_0882_2-Edit-2_1be8eb28-e531-4910-9d9b-b8b500dfe71e.jpg?v=1744383182&quot;,&quot;width&quot;:2000}],&quot;requires_selling_plan&quot;:false,&quot;selling_plan_groups&quot;:[],&quot;content&quot;:&quot;\u003cp\u003eMotion Collection\u003c\/p\u003e&quot;}"
                product-page-collection-ids="[174280540253, 264714453085, 299266343005, 173823656029, 289019002973, 261053349981, 173823688797]"
                cart-product-ids="[]"
                first-shop-product-id="7237855248477"
                shop-money-format="&lt;span class=money&gt;$@{{amount}}&lt;/span&gt;"
                cart-items='
[]'
        ></essential-upsell-app-embed>

    </div>
    <div id="shopify-block-AYkpjcWFINkF3RWlJV__1513253815146976218" class="shopify-block shopify-app-block">
    </div>
@endsection

@push('scripts')
            <script>

            </script>
            <script src="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
            <script src="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
            <script>
                jQuery(function(){
                    var $btn     = jQuery('#load-more'),
                        $select  = jQuery('.jdgm-sort'),
                        $target  = jQuery('#review-container'),
                        baseUrl  = $btn.data('url'),
                        page     = 2,                            // lần đầu server đã load page 1
                        sort     = $select.val() || 'most-recent';

                    if (!$btn.length) {
                        baseUrl = "{{ route('front.getMoreReview', $product->id) }}";
                    }

                    // Hàm load reviews, reset=true thì clear container và reset page=2
                    function loadReviews(reset) {
                        if (reset) {
                            page = 1;
                            $target.empty();
                            $btn.show();
                        }

                        $btn.prop('disabled', true).text('Loading…');

                        var url = baseUrl + '?page=' + (reset ? 1 : page) + '&sort=' + sort;

                        jQuery.get(url, function(html){
                            if (reset) {
                                $target.html(html);
                            } else {
                                $target.append(html);
                            }

                            // sau khi load xong, tăng page và bật lại nút
                            page++;
                            $btn.data('page', page)
                                .prop('disabled', false)
                                .text('Load More');

                            // nếu không còn page (html rỗng) thì ẩn nút
                            if (!html.trim()) {
                                $btn.hide();
                            }
                        })
                            .fail(function(){
                                alert('Không tải được, thử lại sau.');
                                $btn.prop('disabled', false).text('Load More');
                            });
                    }

                    // Chọn sort mới → load lại từ đầu
                    $select.on('change', function(){
                        sort = jQuery(this).val();
                        loadReviews(true);
                    });

                    // Load more
                    $btn.on('click', function(e){
                        e.preventDefault();
                        loadReviews(false);
                    });
                });


                document.addEventListener('DOMContentLoaded', () => {
                    const thumbs = new Swiper('.gallery-thumbs', {
                        spaceBetween: 10,
                        slidesPerView: 'auto',
                        watchSlidesProgress: true,
                        watchSlidesVisibility: true,
                    });
                    new Swiper('.gallery-top', {
                        spaceBetween: 10,
                        slidesPerView: 1,
                        loop: false,
                        zoom: { maxRatio: 2 },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        thumbs: {
                            swiper: thumbs,
                        },
                    });
                });
            </script>
            <script>

                app.controller('productDetail', function ($rootScope, $scope, $sce, $interval, cartItemSync, isLoading, $timeout) {
                    $scope.sizeVariantSelected = {};
                    window.sizesStock = @json($productVariant->sizesStock);
                    $scope.sizesStock = window.sizesStock;
                    const saved = window.localStorage.getItem('selectedSize');
                    if (saved) {
                        const found = $scope.sizesStock.find(v => v.size.name === saved);
                        if (found) {
                            $scope.sizeVariantSelected = found;
                        }
                    }

                    $scope.chooseSize = function (sizeVariant) {
                        $scope.sizeVariantSelected = sizeVariant;
                        window.localStorage.setItem('selectedSize', sizeVariant.size.name);
                    }


                    $scope.addToCart = function (event) {
                        console.log($scope.sizeVariantSelected)
                        url = "{{route('cart.add.item', ['productId' => 'productId', 'variantSizeId' => 'variantSizeId'])}}";
                        url = url.replace('productId', {{ $product->id }});
                        url = url.replace('variantSizeId',  $scope.sizeVariantSelected.id);

                        isLoading.set(true);
                        jQuery.ajax({
                            type: 'POST',
                            url: url,
                            {{--headers: {--}}
                            {{--    'X-CSRF-TOKEN': "{{csrf_token()}}"--}}
                            {{--},--}}
                            headers: {
                                'X-CSRF-TOKEN': CSRF_TOKEN
                            },
                            data: {
                                'qty': 1
                            },
                            success: function (response) {
                                if (response.success) {
                                    $interval.cancel($rootScope.promise);
                                    isLoading.set(false);
                                    $rootScope.promise = $interval(function () {
                                        cartItemSync.items = response.items;
                                        cartItemSync.total = response.total;
                                        cartItemSync.count = response.count;
                                    }, 1000);
                                }
                            },
                            error: function () {
                                jQuery.toast('Operation failed !')
                            },
                            complete: function () {
                                $scope.$applyAsync();
                            }
                        });
                    }


                    $scope.checkSendRating = false;
                    $scope.formReview = { rating: 0 };
                    $scope.formReview.product_id = {{ $product->id }};
                    $scope.submitReview = function () {
                        jQuery.ajax({
                            type: 'POST',
                            url: '{{ route('front.submitRating') }}',
                            headers: {
                                'X-CSRF-TOKEN': CSRF_TOKEN
                            },
                            data: {
                                formReview: $scope.formReview
                            },
                            success: function (response) {
                                if (response.success) {
                                    $scope.checkSendRating = true;
                                } else {
                                    $scope.errors = response.errors;
                                    toastr.warning('Operation failed');
                                }
                            },
                            error: function () {
                                toastr.error('Operation failed')
                            },
                            complete: function () {
                                $scope.$applyAsync();
                            }
                        });
                    }



                    // 1. Ẩn form ban đầu
                    $scope.showReviewForm = false;

                    // 2. Hàm mở form và scroll
                    $scope.openReviewForm = function($event) {
                        $event && $event.preventDefault();
                        $scope.showReviewForm = true;

                        // đợi Angular render xong form
                        $timeout(function () {
                            var $el = jQuery('#jdgm_form_wrapper');
                            if ($el.length) {
                                // Animate scrollTop của html/body
                                jQuery('html, body').animate({
                                    scrollTop: $el.offset().top
                                }, 600);  // 600ms, bạn có thể tuỳ chỉnh
                            }
                        }, 0);
                    };

                    $scope.closeReviewForm = function($event) {
                        $event && $event.preventDefault();

                        // Tính toán vị trí scroll đến (ví dụ scroll lên đầu container reviews)
                        var $scrollTarget = jQuery('#review-container');
                        var top = $scrollTarget.length
                            ? $scrollTarget.offset().top
                            : 0;

                        // Cuộn mượt lên trong 600ms
                        jQuery('html, body').animate({ scrollTop: top }, 300);

                        // Sau khi cuộn xong, ẩn form
                        $timeout(function() {
                            $scope.showReviewForm = false;
                        }, 300);
                    };

                    $scope.selectedVariant =  @json($productVariant);
                    $scope.galleries = $scope.selectedVariant.galleries || [];
                    $scope.getSrcset = function(gallery, sizes) {
                        return sizes.map(function(w) {
                            return gallery.image.path + '?width=' + w + ' ' + w + 'w';
                        }).join(', ');
                    };

                    // 4. Khi click chọn variant
                    $scope.chooseVariant = function(variant) {
                        $scope.selectedVariant = variant;
                        $scope.galleries = variant.galleries || [];
                        $scope.sizeVariantSelected = {};
                    };

                    var initSwipers = function() {
                        $scope.thumbSwiper = new Swiper('.gallery-thumbs', {
                            spaceBetween: 10,
                            slidesPerView: 4,
                            watchSlidesVisibility: true,
                            watchSlidesProgress: true
                        });
                        $scope.mainSwiper = new Swiper('.gallery-top', {
                            spaceBetween: 10,
                            thumbs: { swiper: $scope.thumbSwiper }
                        });
                    };

                    // 6. Watch để làm mới Swiper
                    $scope.$watch('galleries', function(newGals, oldGals) {
                        if (!newGals) return;
                        // Đợi DOM render xong
                        $timeout(function() {
                            // Nếu đã init trước đó thì destroy
                            if ($scope.thumbSwiper) {
                                $scope.thumbSwiper.destroy(true, true);
                                $scope.mainSwiper.destroy(true, true);
                            }
                            initSwipers();
                        }, 0);
                    });

                    // 7. Khởi tạo lần đầu
                    $timeout(initSwipers, 0);


                })

            </script>
 @endpush
