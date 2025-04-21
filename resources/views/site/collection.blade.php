@extends('site.layouts.master')
@section('title')

@endsection

@section('content')
    <div ng-controller="collection">
        <section id="shopify-section-template--17549462536350__main" class="shopify-section shopify-section--main-list-collections"><style>
                #shopify-section-template--17549462536350__main .collection-list {
                    --collection-list-grid: auto / repeat(1, minmax(0, 1fr));
                }

                @media screen and (min-width: 700px) {
                    #shopify-section-template--17549462536350__main .collection-list {
                        --collection-list-grid: auto / repeat(2, minmax(0, 1fr));
                    }
                }

                @media screen and (min-width: 1000px) {
                    #shopify-section-template--17549462536350__main .collection-list {
                        --collection-list-grid: auto / repeat(3, minmax(0, 1fr));
                    }
                }

                @media screen and (min-width: 1400px) {
                    #shopify-section-template--17549462536350__main .collection-list {
                        --collection-list-grid: auto / repeat(3, minmax(0, 1fr));
                    }
                }
            </style>

            <div class="container">
                <div class="page-spacer">
                    <div class="v-stack gap-12">
                        <h1 class="h1 text-center">All collections</h1><collection-list class="collection-list">
                            @php
                                $sizes = [200, 300, 400, 500, 600];
                            @endphp

                           @foreach($categoríesSpecial as $cateSpecial)
                               @php
                                   $srcset = collect($sizes)->map(function($size) use ($cateSpecial) {
                                        return (@$cateSpecial->image->path ?? '' ). "?width={$size} {$size}w";
                                    })->implode(', ');
                               @endphp
                                <a href="{{ route('front.get-collection-list', ['slug' => $cateSpecial->slug]) }}" class="collection-card" reveal-js="" style="opacity: 1;">
                                    <div class="content-over-media group rounded-sm" style="--content-over-media-overlay: 0 0 0 / 0.4"><img
                                            src="{{ $cateSpecial->image->path ?? '' }}?width=600"
                                            alt="{{ $cateSpecial->name }}"
                                            srcset="{{ $srcset  }}"
                                            width="600" height="720" loading="lazy" sizes="(max-width: 699px) 73vw, 533px" class="zoom-image" style="opacity: 1;"><div class="collection-card__content-wrapper place-self-center text-center text-custom" style="--text-color: 255 255 255; opacity: 1;">
                                            <div class="collection-card__content">
                                                <p class="h2">{{ $cateSpecial->name }}</p>
                                            </div><svg role="presentation" focusable="false" width="48" height="48" class="icon icon-circle-button-right-clipped" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12ZM10.47 9.53 12.94 12l-2.47 2.47 1.06 1.06 3-3 .53-.53-.53-.53-3-3-1.06 1.06Z" fill="currentColor"></path>
                                            </svg></div>
                                    </div>
                                </a>

                            @endforeach

                        </collection-list></div>
                </div>
            </div>

        </section>

    </div>

    <template id="popover-default-template">
        <button part="outside-close-button" is="close-button" aria-label="Close">
            <svg role="presentation" stroke-width="2" focusable="false" width="24" height="24" class="icon icon-close"
                 viewBox="0 0 24 24">
                <path d="M17.658 6.343 6.344 17.657M17.658 17.657 6.344 6.343" stroke="currentColor"></path>
            </svg>
        </button>

        <div part="overlay"></div>

        <div part="content">
            <header part="title">
                <slot name="title"></slot>
            </header>

            <div part="body">
                <slot></slot>
            </div>
        </div>
    </template>
@endsection

@push('scripts')
    <script>
        app.controller('collection', function ($rootScope, $scope, $sce, $interval, cartItemSync) {

        })

    </script>
@endpush
