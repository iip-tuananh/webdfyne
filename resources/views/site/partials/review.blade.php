@foreach($reviews as $review)
    <div class="jdgm-rev-widg__reviews">
        <div class="jdgm-rev jdgm-divider-top jdgm--done-setup" data-verified-buyer="true"
             data-review-id="f4a4a380-f318-4e3b-978d-8165f04ff538"
             data-product-title="Dynamic Twist Back Bra"
             data-product-url="#" data-thumb-up-count="0" data-thumb-down-count="0">
            <div class="jdgm-rev__header">
                <div class="jdgm-row-product"></div>
                <div class="jdgm-row-profile">
                    <div class="jdgm-rev__icon"></div>
                    <span class="jdgm-rev__author-wrapper">
                                                    <span class="jdgm-rev__author">{{ $review->user_name }}</span>
                                                        <span class="jdgm-rev__buyer-badge-wrapper">
                                                            <span class="jdgm-rev__buyer-badge"></span>
                                                        </span>

                                                    </span>

                    <div class="jdgm-rev__header-custom-form custom-form--horizontal-style">
                        <div class="jdgm-rev__cf-ans--type jdgm-rev__cf-ans--text-type"></div>
                    </div>
                </div>
                <div class="jdgm-rev__br"></div>
            </div>
            <div class="jdgm-rev__content">
                <div class="jdgm-row-rating">

                                                        <span class="jdgm-rev__rating" data-score="3" tabindex="0" aria-label="3 star review" role="img">
                                                              @for($i = 1; $i <= 5; $i++)
                                                                <span class="jdgm-star jdgm--{{ $i <= $review->rating ? 'on' : 'off' }}"></span>
                                                            @endfor
                                                        </span>
                    <span class="jdgm-rev__timestamp" data-content="2025-03-21 10:06:11 UTC">
                                                            {{ $review->created_at->format('d/m/y H:i') }}
                                                        </span>
                </div>
                <b class="jdgm-rev__title">{{ $review->title }}</b>
                <div class="jdgm-rev__body" style="overflow-wrap: break-word;">
                    {!! $review->content !!}
                </div>
            </div>
            <div class="jdgm-rev__actions">
                <div class="jdgm-rev__social"></div>
                <div class="jdgm-rev__votes"></div>
            </div>
        </div>
    </div>
@endforeach
