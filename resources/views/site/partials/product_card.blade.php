
<div class="grid__item grid-product small--one-half medium-up--one-quarter " data-aos="row-of-4"
     data-product-handle="dfyne-recharge-midnight-black-joggers-240406" data-product-id="7542781476957">
    <div class="grid-product__content">
        <div class="grid__item-image-wrapper">
            <div class="grid-product__image-mask">
                <div
                    class="grid__image-ratio grid__image-ratio--portrait">


                    <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">

                        @php
                            $sizes = [360, 540, 720, 900, 1080];

                            $srcset = collect($sizes)->map(function($size) use ($variant) {
                                return (@$variant->image->path ?? '' ). "?width={$size} {$size}w";
                            })->implode(', ');
                        @endphp

                        <img src="{{$varian->image->path ?? ''}}?width=1080" alt=""
                             srcset="{{$srcset}}"
                             width="1080" height="1080.0" loading="lazy" class=" image-style--
                            image-element" sizes="(min-width: 769px) 25vw, 50vw">
                    </image-element>
                </div>
                <div class="grid-product__secondary-image small--hide">

                    @if(isset($variant->galleries) && count($variant->galleries))
                        @php
                            $sizes = [360, 540, 720, 1000];
                               $gallery = $variant->galleries[0];

                                $srcsetGallery = collect($sizes)->map(function($size) use ($gallery) {
                               return $gallery->image->path . "?width={$size} {$size}w";
                           })->implode(', ');
                        @endphp
                        <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">
                            <img src="{{$gallery->image->path ?? ''}}?width=1000" alt=""
                                 srcset="{{$srcsetGallery}}"
                                 width="1000" height="1000.0" loading="lazy" class="image-style--
                            image-element" sizes="(min-width: 769px) 25vw, 50vw">
                        </image-element>
                    @endif


                </div>
            </div>

            <?php
                $product = $variant->baseProduct;
            ?>
            <a href="{{ route('front.show-product-detail', $variant->slug) }}"
               class="grid-product__link">
                <div class="grid-product__meta">
                    <div class="grid-product__title grid-product__title--body">{{$product->name}}</div>
                    <div class="grid-product__vendor">{{$variant->color->name}}</div>
                    <div class="grid-product__price"><span class=money>{{ formatCurrency($product->price) }}</span>
                        <!-- Start of Judge.me code -->
{{--                        <div class='jdgm-widget jdgm-preview-badge' data-id='7542781476957'>--}}
{{--                            <p style="margin-bottom:5px;">--}}
{{--                            <div style='display:none' class='jdgm-prev-badge' data-average-rating='4.41'--}}
{{--                                 data-number-of-reviews='29' data-number-of-questions='0'><span--}}
{{--                                    class='jdgm-prev-badge__stars' data-score='4.41' tabindex='0'--}}
{{--                                    aria-label='5 stars' role='button'>--}}
{{--                                    <span class='jdgm-star jdgm--on'></span>--}}
{{--                                    <span class='jdgm-star jdgm--on'></span>--}}
{{--                                    <span class='jdgm-star jdgm--on'></span>--}}
{{--                                    <span class='jdgm-star jdgm--on'></span>--}}
{{--                                    <span class='jdgm-star jdgm--on'></span>--}}
{{--                                </span>--}}
{{--                                <span class='jdgm-prev-badge__text'> 29 reviews </span>--}}
{{--                            </div>--}}
{{--                            </p>--}}
{{--                        </div>--}}
                        <!-- End of Judge.me code -->


                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
