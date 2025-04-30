<div id="shopify-section-sections--18121751199837__header" class="shopify-section shopify-section-group-header-group" ng-controller="headerPartial">

    <div id="NavDrawer" class="drawer drawer--left">
        <div class="drawer__contents">
            <div class="drawer__fixed-header">
                <div class="drawer__header appear-animation appear-delay-1">
                    <div class="h2 drawer__title"></div>
                    <div class="drawer__close">
                        <button type="button" class="drawer__close-button js-drawer-close">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
                            <span class="icon__fallback-text">Close menu</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="drawer__scrollable">
                <ul class="mobile-nav" role="navigation" aria-label="Primary">
                        @foreach($categories as $category)
                            <li class="mobile-nav__item appear-animation appear-delay-3">
                                <div class="mobile-nav__has-sublist">
                                    <a href="#" class="mobile-nav__link mobile-nav__link--top-level" id="Label-collections-all-products-men2">
                                        {{ $category->name }}
                                    </a>
                                    <div class="mobile-nav__toggle">
                                        <button type="button"
                                                aria-controls="Linklist-collections-all-products-men2"
                                                aria-labelledby="Label-collections-all-products-men2"
                                                class="collapsible-trigger collapsible--auto-height">
                                    <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                    <path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
                                    </span>
                                        </button>
                                    </div>
                                </div>


                                <div id="Linklist-collections-all-products-men2" class="mobile-nav__sublist collapsible-content collapsible-content--all">
                                    <div class="collapsible-content__inner">
                                        <ul class="mobile-nav__sublist">
                                            @foreach($category->categoriesSpecial as $categorySpecial)
                                                <li class="mobile-nav__item">
                                                    <div class="mobile-nav__child-item">
                                                        <a href="{{route('front.getProductListFeatured', $categorySpecial->slug)}}" class="mobile-nav__link" id="Sublabel-collections-new-releases-men{{ $category->id }}-{{ $category->slug }}">
                                                            {{ $categorySpecial->name }}
                                                        </a>
                                                    </div>
                                                </li>
                                            @endforeach



                                            <li class="mobile-nav__item">
                                                <div class="mobile-nav__child-item">
                                                    <a href="#" class="mobile-nav__link"  aria-labelledby="Sublabel-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                    >
                                                        SHOP BY CATEGORY
                                                    </a>
                                                    <button type="button"
                                                                aria-controls="Sublinklist-collections-all-products-men2-CATEGORY-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                                aria-labelledby="Sublabel-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                                class="collapsible-trigger"><span class="collapsible-trigger__icon collapsible-trigger__icon--circle collapsible-trigger__icon--open" role="presentation">
  <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
</span>
                                                    </button>
                                                </div>


                                                    <div
                                                            id="Sublinklist-collections-all-products-men2-CATEGORY-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                            aria-labelledby="Sublabel-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                            class="mobile-nav__sublist collapsible-content collapsible-content--all"
                                                    >

                                                        <div class="collapsible-content__inner">
                                                            <ul class="mobile-nav__grandchildlist">
                                                                @foreach($category->childs as $child)
                                                                <li class="mobile-nav__item">
                                                                    <a href="{{route('front.show-product-list', $child->slug)}}" class="mobile-nav__link">
                                                                        {{ $child->name }}
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>

                                            </li>


                                            <li class="mobile-nav__item">
                                                <div class="mobile-nav__child-item"><a href="#"
                                                                                       class="mobile-nav__link"
                                                                                       id="Sublabel-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                    >
                                                        SHOP BY COLLECTION
                                                    </a><button type="button"
                                                                aria-controls="Sublinklist-collections-all-products-men2-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                                aria-labelledby="Sublabel-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                                class="collapsible-trigger"><span class="collapsible-trigger__icon collapsible-trigger__icon--circle collapsible-trigger__icon--open" role="presentation">
  <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
</span>
                                                    </button>
                                                </div>


                                                    <div
                                                            id="Sublinklist-collections-all-products-men2-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                            aria-labelledby="Sublabel-collections-all-products-men{{ $category->id }}-{{ $category->slug }}"
                                                            class="mobile-nav__sublist collapsible-content collapsible-content--all"
                                                    >

                                                        <div class="collapsible-content__inner">
                                                            <ul class="mobile-nav__grandchildlist">
                                                                @foreach($category->collections as $collection)
                                                                <li class="mobile-nav__item">
                                                                    <a href="{{route('front.getProductListCollection', $collection->slug)}}" class="mobile-nav__link">
                                                                        {{ $collection->name }}
                                                                    </a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>

                                                    </div>


                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    <li class="mobile-nav__item mobile-nav__item--secondary">
                        <div class="grid">
                            <div class="grid__item one-half appear-animation appear-delay-4 medium-up--hide">
                                <a href="{{route('front.about-us')}}" class="mobile-nav__link">About</a>
                            </div>
                            <div class="grid__item one-half appear-animation appear-delay-8 medium-up--hide">
                                <a href="{{ route('front.contact') }}" class="mobile-nav__link">Contact</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="mobile-nav__social appear-animation appear-delay-12">
                    <li class="mobile-nav__social-item">
                        <a target="_blank" rel="noopener" href="{{$config->instagram}}" title="DFYNE on Instagram">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-instagram" viewBox="0 0 32 32"><title>instagram</title><path fill="#444" d="M16 3.094c4.206 0 4.7.019 6.363.094 1.538.069 2.369.325 2.925.544.738.287 1.262.625 1.813 1.175s.894 1.075 1.175 1.813c.212.556.475 1.387.544 2.925.075 1.662.094 2.156.094 6.363s-.019 4.7-.094 6.363c-.069 1.538-.325 2.369-.544 2.925-.288.738-.625 1.262-1.175 1.813s-1.075.894-1.813 1.175c-.556.212-1.387.475-2.925.544-1.663.075-2.156.094-6.363.094s-4.7-.019-6.363-.094c-1.537-.069-2.369-.325-2.925-.544-.737-.288-1.263-.625-1.813-1.175s-.894-1.075-1.175-1.813c-.212-.556-.475-1.387-.544-2.925-.075-1.663-.094-2.156-.094-6.363s.019-4.7.094-6.363c.069-1.537.325-2.369.544-2.925.287-.737.625-1.263 1.175-1.813s1.075-.894 1.813-1.175c.556-.212 1.388-.475 2.925-.544 1.662-.081 2.156-.094 6.363-.094zm0-2.838c-4.275 0-4.813.019-6.494.094-1.675.075-2.819.344-3.819.731-1.037.4-1.913.944-2.788 1.819S1.486 4.656 1.08 5.688c-.387 1-.656 2.144-.731 3.825-.075 1.675-.094 2.213-.094 6.488s.019 4.813.094 6.494c.075 1.675.344 2.819.731 3.825.4 1.038.944 1.913 1.819 2.788s1.756 1.413 2.788 1.819c1 .387 2.144.656 3.825.731s2.213.094 6.494.094 4.813-.019 6.494-.094c1.675-.075 2.819-.344 3.825-.731 1.038-.4 1.913-.944 2.788-1.819s1.413-1.756 1.819-2.788c.387-1 .656-2.144.731-3.825s.094-2.212.094-6.494-.019-4.813-.094-6.494c-.075-1.675-.344-2.819-.731-3.825-.4-1.038-.944-1.913-1.819-2.788s-1.756-1.413-2.788-1.819c-1-.387-2.144-.656-3.825-.731C20.812.275 20.275.256 16 .256z"/><path fill="#444" d="M16 7.912a8.088 8.088 0 0 0 0 16.175c4.463 0 8.087-3.625 8.087-8.088s-3.625-8.088-8.088-8.088zm0 13.338a5.25 5.25 0 1 1 0-10.5 5.25 5.25 0 1 1 0 10.5zM26.294 7.594a1.887 1.887 0 1 1-3.774.002 1.887 1.887 0 0 1 3.774-.003z"/></svg>
                            <span class="icon__fallback-text">Instagram</span>
                        </a>
                    </li>
                    <li class="mobile-nav__social-item">
                        <a target="_blank" rel="noopener" href="{{$config->facebook}}" title="DFYNE on Facebook">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-facebook" viewBox="0 0 14222 14222"><path d="M14222 7112c0 3549.352-2600.418 6491.344-6000 7024.72V9168h1657l315-2056H8222V5778c0-562 275-1111 1159-1111h897V2917s-814-139-1592-139c-1624 0-2686 984-2686 2767v1567H4194v2056h1806v4968.72C2600.418 13603.344 0 10661.352 0 7112 0 3184.703 3183.703 1 7111 1s7111 3183.703 7111 7111Zm-8222 7025c362 57 733 86 1111 86-377.945 0-749.003-29.485-1111-86.28Zm2222 0v-.28a7107.458 7107.458 0 0 1-167.717 24.267A7407.158 7407.158 0 0 0 8222 14137Zm-167.717 23.987C7745.664 14201.89 7430.797 14223 7111 14223c319.843 0 634.675-21.479 943.283-62.013Z"/></svg>
                            <span class="icon__fallback-text">Facebook</span>
                        </a>
                    </li>
                    <li class="mobile-nav__social-item">
                        <a target="_blank" rel="noopener" href="{{$config->youTube}}" title="DFYNE on YouTube">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-youtube" viewBox="0 0 21 20"><path fill="#444" d="M-.196 15.803q0 1.23.812 2.092t1.977.861h14.946q1.165 0 1.977-.861t.812-2.092V3.909q0-1.23-.82-2.116T17.539.907H2.593q-1.148 0-1.969.886t-.82 2.116v11.894zm7.465-2.149V6.058q0-.115.066-.18.049-.016.082-.016l.082.016 7.153 3.806q.066.066.066.164 0 .066-.066.131l-7.153 3.806q-.033.033-.066.033-.066 0-.098-.033-.066-.066-.066-.131z"/></svg>
                            <span class="icon__fallback-text">YouTube</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <style>
        .loading-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(2px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        /* spinner tròn xoay */
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #ddd;
            border-top-color: #333;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        /* keyframes cho spinner */
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

    </style>
    <div id="CartDrawer" class="drawer drawer--right" ng-class="{'is-loading': isLoading}">
        <div class="loading-overlay" ng-show="isLoading">
            <div class="spinner"></div>
        </div>


        <form id="CartDrawerForm" action="/cart" method="post" novalidate class="drawer__contents" data-location="cart-drawer">
            <div class="drawer__fixed-header">
                <div class="drawer__header appear-animation appear-delay-1">
                    <div class="h2 drawer__title">Cart</div>
                    <div class="drawer__close">
                        <button type="button" class="drawer__close-button js-drawer-close">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
                            <span class="icon__fallback-text">Close cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="drawer__inner">
                <div class="drawer__scrollable">
                    <div data-products="" class="appear-animation appear-delay-2" ng-if="cart.count">
                        <div class="cart__items" >
                            <div class="cart__item" ng-repeat="item in cart.items">
                                <div class="cart__image">
                                    <a href="/products/dfyne-dynamic-navy-sports-bras-24036?variant=42334571888733" class="image-wrap">
                                        <image-element data-aos="image-fade-in" data-aos-offset="150" class="aos-init aos-animate">
                                            <img src="<% item.attributes.image %>?width=540"
                                                 alt="Dynamic Twist Back Bra"
                                                 width="540" loading="lazy" class=" image-element" sizes="100px">
                                        </image-element>
                                    </a>
                                </div>

                                <div class="cart__item-details">
                                    <div class="cart__item-title">
                                        <a href="/products/dfyne-dynamic-navy-sports-bras-24036?variant=42334571888733" class="cart__item-name">
                                            <% item.name %>
                                        </a>
                                        <div class="cart__item--variants">
                                            <div>
                                                <span>Size:</span>  <% item.attributes.size %>
                                            </div>
                                        </div>

                                        <div class="cart__item--variants">
                                            <div>
                                                <span>Color:</span> <% item.attributes.color %>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cart__item-sub">
                                        <div>
                                            <div class="js-qty__wrapper">
                                                <label for="cart_updates_42334571888733:05338bec45fb3785ab75cb3f57447352" class="hidden-label">Quantity</label>
                                                <input type="text" id="cart_updates_42334571888733:05338bec45fb3785ab75cb3f57447352" name="updates[]"
                                                       ng-model="item.quantity" value="<%item.quantity%>" ng-change="changeQty(item.quantity, item.id)"
                                                       class="js-qty__num"  min="0" pattern="[0-9]*"
                                                      >
                                                <button type="button" class="js-qty__adjust js-qty__adjust--minus" aria-label="Reduce item quantity by one"
                                                        ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)" >
                                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-minus" viewBox="0 0 20 20">
                                                        <path fill="#444" d="M17.543 11.029H2.1A1.032 1.032 0 0 1 1.071 10c0-.566.463-1.029 1.029-1.029h15.443c.566 0 1.029.463 1.029 1.029 0 .566-.463 1.029-1.029 1.029z"></path></svg>
                                                    <span class="icon__fallback-text" aria-hidden="true">−</span>
                                                </button>

                                                <button type="button" class="js-qty__adjust js-qty__adjust--plus" aria-label="Increase item quantity by one"  ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)">
                                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-plus" viewBox="0 0 20 20"><path fill="#444" d="M17.409 8.929h-6.695V2.258c0-.566-.506-1.029-1.071-1.029s-1.071.463-1.071 1.029v6.671H1.967C1.401 8.929.938 9.435.938 10s.463 1.071 1.029 1.071h6.605V17.7c0 .566.506 1.029 1.071 1.029s1.071-.463 1.071-1.029v-6.629h6.695c.566 0 1.029-.506 1.029-1.071s-.463-1.071-1.029-1.071z"></path></svg>
                                                    <span class="icon__fallback-text" aria-hidden="true">+</span>
                                                </button>
                                            </div>
{{--                                            <div class="cart__remove">--}}
{{--                                                <a href="/cart/change?id=42334571888733:05338bec45fb3785ab75cb3f57447352&amp;quantity=0" class="text-link">--}}
{{--                                                    Xóa--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="cart__item-price-col text-right">
                                          <span class="cart__price">
                                            <span class="money"><% (item.price * item.quantity) | number %> $</span>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="drawer__footer appear-animation appear-delay-4">
                    <div data-discounts>

                    </div>

                    <div class="cart__item-sub cart__item-row">
                        <div class="ajaxcart__subtotal">Total</div>
                        <div data-subtotal><span class=money><% cart.total | number%> $</span></div>
                    </div>

                    <div class="cart__item-row text-center">
{{--                        <small>--}}
{{--                            Shipping, taxes, and discount codes calculated at checkout.<br />--}}
{{--                        </small>--}}
                    </div>



                    <div class="cart__checkout-wrapper">
                        <a href="{{ route('cart.checkout') }}">
                            <button type="button" name="checkout" data-terms-required="false" class="btn cart__checkout">
                                Check out
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="drawer__cart-empty appear-animation appear-delay-2">
                <div class="drawer__scrollable">
                    Your cart is currently empty.
                </div>
            </div>
        </form>
    </div>

    <style>
        .site-nav__link,
        .site-nav__dropdown-link:not(.site-nav__dropdown-link--top-level) {
            font-size: 13px;
        }

        .site-nav__link, .mobile-nav__link--top-level {
            text-transform: uppercase;
            letter-spacing: 0.2em;
        }
        .mobile-nav__link--top-level {
            font-size: 1.1em;
        }





        .site-header {
            box-shadow: 0 0 1px rgba(0,0,0,0.2);
        }

        .toolbar + .header-sticky-wrapper .site-header {
            border-top: 0;
        }</style>

    <div data-section-id="sections--18121751199837__header" data-section-type="header"><div class="toolbar small--hide">
            <div class="page-width">
                <div class="toolbar__content"><div class="toolbar__item toolbar__item--menu">
                        <ul class="inline-list toolbar__menu">
                            <li>
                                <a href="{{route('front.about-us')}}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('front.contact') }}">Contact Us</a>
                            </li>

                            <li>
                                <a href="{{ route('front.track-my-order') }}">Track My Order</a>
                            </li>
                        </ul>
                    </div><div class="toolbar__item">
                        <ul class="no-bullets social-icons inline-list toolbar__social"><li>
                                <a target="_blank" rel="noopener" href="{{ $config->instagram }}"
                                   title="DFYNE on Instagram">
                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-instagram" viewBox="0 0 32 32"><title>instagram</title><path fill="#444" d="M16 3.094c4.206 0 4.7.019 6.363.094 1.538.069 2.369.325 2.925.544.738.287 1.262.625 1.813 1.175s.894 1.075 1.175 1.813c.212.556.475 1.387.544 2.925.075 1.662.094 2.156.094 6.363s-.019 4.7-.094 6.363c-.069 1.538-.325 2.369-.544 2.925-.288.738-.625 1.262-1.175 1.813s-1.075.894-1.813 1.175c-.556.212-1.387.475-2.925.544-1.663.075-2.156.094-6.363.094s-4.7-.019-6.363-.094c-1.537-.069-2.369-.325-2.925-.544-.737-.288-1.263-.625-1.813-1.175s-.894-1.075-1.175-1.813c-.212-.556-.475-1.387-.544-2.925-.075-1.663-.094-2.156-.094-6.363s.019-4.7.094-6.363c.069-1.537.325-2.369.544-2.925.287-.737.625-1.263 1.175-1.813s1.075-.894 1.813-1.175c.556-.212 1.388-.475 2.925-.544 1.662-.081 2.156-.094 6.363-.094zm0-2.838c-4.275 0-4.813.019-6.494.094-1.675.075-2.819.344-3.819.731-1.037.4-1.913.944-2.788 1.819S1.486 4.656 1.08 5.688c-.387 1-.656 2.144-.731 3.825-.075 1.675-.094 2.213-.094 6.488s.019 4.813.094 6.494c.075 1.675.344 2.819.731 3.825.4 1.038.944 1.913 1.819 2.788s1.756 1.413 2.788 1.819c1 .387 2.144.656 3.825.731s2.213.094 6.494.094 4.813-.019 6.494-.094c1.675-.075 2.819-.344 3.825-.731 1.038-.4 1.913-.944 2.788-1.819s1.413-1.756 1.819-2.788c.387-1 .656-2.144.731-3.825s.094-2.212.094-6.494-.019-4.813-.094-6.494c-.075-1.675-.344-2.819-.731-3.825-.4-1.038-.944-1.913-1.819-2.788s-1.756-1.413-2.788-1.819c-1-.387-2.144-.656-3.825-.731C20.812.275 20.275.256 16 .256z"/><path fill="#444" d="M16 7.912a8.088 8.088 0 0 0 0 16.175c4.463 0 8.087-3.625 8.087-8.088s-3.625-8.088-8.088-8.088zm0 13.338a5.25 5.25 0 1 1 0-10.5 5.25 5.25 0 1 1 0 10.5zM26.294 7.594a1.887 1.887 0 1 1-3.774.002 1.887 1.887 0 0 1 3.774-.003z"/></svg>
                                    <span class="icon__fallback-text">Instagram</span>
                                </a>
                            </li><li>
                                <a target="_blank" rel="noopener" href="{{ $config->facebook }}" title="DFYNE on Facebook">
                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-facebook" viewBox="0 0 14222 14222"><path d="M14222 7112c0 3549.352-2600.418 6491.344-6000 7024.72V9168h1657l315-2056H8222V5778c0-562 275-1111 1159-1111h897V2917s-814-139-1592-139c-1624 0-2686 984-2686 2767v1567H4194v2056h1806v4968.72C2600.418 13603.344 0 10661.352 0 7112 0 3184.703 3183.703 1 7111 1s7111 3183.703 7111 7111Zm-8222 7025c362 57 733 86 1111 86-377.945 0-749.003-29.485-1111-86.28Zm2222 0v-.28a7107.458 7107.458 0 0 1-167.717 24.267A7407.158 7407.158 0 0 0 8222 14137Zm-167.717 23.987C7745.664 14201.89 7430.797 14223 7111 14223c319.843 0 634.675-21.479 943.283-62.013Z"/></svg>
                                    <span class="icon__fallback-text">Facebook</span>
                                </a>
                            </li><li>
                                <a target="_blank" rel="noopener" href="{{ $config->youtube }}" title="DFYNE on YouTube">
                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-youtube" viewBox="0 0 21 20"><path fill="#444" d="M-.196 15.803q0 1.23.812 2.092t1.977.861h14.946q1.165 0 1.977-.861t.812-2.092V3.909q0-1.23-.82-2.116T17.539.907H2.593q-1.148 0-1.969.886t-.82 2.116v11.894zm7.465-2.149V6.058q0-.115.066-.18.049-.016.082-.016l.082.016 7.153 3.806q.066.066.066.164 0 .066-.066.131l-7.153 3.806q-.033.033-.066.033-.066 0-.098-.033-.066-.066-.066-.131z"/></svg>
                                    <span class="icon__fallback-text">YouTube</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <div class="header-sticky-wrapper">
            <div id="HeaderWrapper" class="header-wrapper"><header
                    id="SiteHeader"
                    class="site-header"
                   >
                    <div class="page-width">
                        <div
                            class="header-layout header-layout--center-left"
                            data-logo-align="center"><div class="header-item header-item--left header-item--navigation">
                                <ul class="site-nav site-navigation small--hide">
                                    @foreach($categories as $category)
                                        <li class="site-nav__item site-nav__expanded-item site-nav--has-dropdown site-nav--is-megamenu">
                                            <details
                                                    data-hover="true"
                                                    id="site-nav-item--2"
                                                    class="site-nav__details"
                                            >
                                                <summary
                                                        data-link=""
                                                        aria-expanded="false"
                                                        aria-controls="site-nav-item--2"
                                                        class="site-nav__link site-nav__link--underline site-nav__link--has-dropdown"
                                                >
                                                    {{ $category->name }}
                                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16"><path d="m1.57 1.59 12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none"/></svg>
                                                </summary>

                                                <div class="site-nav__dropdown megamenu text-left">
                                                    <div class="page-width">
                                                        <div class="grid">
                                                            <div class="grid__item medium-up--one-fifth appear-animation appear-delay-1">
                                                            @foreach($category->categoriesSpecial as $categorySpecial)
                                                                    <div class="h5">
                                                                        <a href="{{route('front.getProductListFeatured', $categorySpecial->slug)}}" class="site-nav__dropdown-link site-nav__dropdown-link--top-level">
                                                                            {{ $categorySpecial->name }}
                                                                        </a>
                                                                    </div>
                                                            @endforeach
                                                            </div>
                                                            <div class="grid__item medium-up--one-fifth appear-animation appear-delay-2">
                                                                <div class="h5">
                                                                    <a href="#" class="site-nav__dropdown-link site-nav__dropdown-link--top-level">SHOP BY CATEGORY</a>
                                                                </div>

                                                                @foreach($category->childs as $child)
                                                                <div>
                                                                    <a href="{{route('front.show-product-list', $child->slug)}}" class="site-nav__dropdown-link">
                                                                        {{ $child->name }}
                                                                    </a>
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                            <div class="grid__item medium-up--one-fifth appear-animation appear-delay-3">
                                                                <div class="h5">
                                                                    <a href="#" class="site-nav__dropdown-link site-nav__dropdown-link--top-level">SHOP BY COLLECTION</a>
                                                                </div>
                                                                @foreach($category->collections as $collection)
                                                                    <div>
                                                                        <a href="{{route('front.getProductListCollection', $collection->slug)}}" class="site-nav__dropdown-link">
                                                                            {{ $collection->name }}
                                                                        </a>

                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </details>

                                        </li>

                                    @endforeach
                                </ul>
                                <div class="site-nav medium-up--hide">
                                    <button
                                        type="button"
                                        class="site-nav__link site-nav__link--icon js-drawer-open-nav"
                                        aria-controls="NavDrawer">
                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-hamburger" viewBox="0 0 64 64"><title>icon-hamburger</title><path d="M7 15h51M7 32h43M7 49h51"/></svg>
                                        <span class="icon__fallback-text">Site navigation</span>
                                    </button>
                                </div>
                            </div><div class="header-item header-item--logo"><style data-shopify>.header-item--logo,
                                    .header-layout--left-center .header-item--logo,
                                    .header-layout--left-center .header-item--icons {
                                        -webkit-box-flex: 0 1 110px;
                                        -ms-flex: 0 1 110px;
                                        flex: 0 1 110px;
                                    }

                                    @media only screen and (min-width: 769px) {
                                        .header-item--logo,
                                        .header-layout--left-center .header-item--logo,
                                        .header-layout--left-center .header-item--icons {
                                            -webkit-box-flex: 0 0 140px;
                                            -ms-flex: 0 0 140px;
                                            flex: 0 0 140px;
                                        }
                                    }

                                    .site-header__logo a {
                                        width: 110px;
                                    }
                                    .is-light .site-header__logo .logo--inverted {
                                        width: 110px;
                                    }
                                    @media only screen and (min-width: 769px) {
                                        .site-header__logo a {
                                            width: 140px;
                                        }

                                        .is-light .site-header__logo .logo--inverted {
                                            width: 140px;
                                        }
                                    }</style><div class="h1 site-header__logo" itemscope itemtype="http://schema.org/Organization" >
                                    <a
                                        href="/"
                                        itemprop="url"
                                        class="site-header__logo-link logo--has-inverted"
                                        style="padding-top: 16.83778234086242%">




                                        <image-element data-aos="image-fade-in" data-aos-offset="150">

                                            <img src="{{ $config->image->path ?? '' }}?width=280"
                                                 alt="" srcset="
                                                 {{ $config->image->path ?? '' }}?width=140 140w,
                                                 {{ $config->image->path ?? '' }}?width=280 280w"
                                                 width="140" height="23.57289527720739" loading="eager"
                                                 class="small--hide image-element" sizes="140px" itemprop="logo">

                                        </image-element>




                                        <image-element data-aos="image-fade-in" data-aos-offset="150">



                                            <img src="{{ $config->image->path ?? '' }}width=220" alt=""
                                                 srcset="{{ $config->image->path ?? '' }}?width=110 110w,
                                                  {{ $config->image->path ?? '' }}?width=220 220w" width="110"
                                                 height="18.521560574948662" loading="eager" class="medium-up--hide image-element" sizes="110px">



                                        </image-element>
                                    </a><a
                                        href="/"
                                        itemprop="url"
                                        class="site-header__logo-link logo--inverted"
                                        style="padding-top: 16.83778234086242%">







                                        <image-element data-aos="image-fade-in" data-aos-offset="150">



                                            <img src="{{ $config->image->path ?? '' }}?width=280"
                                                 alt="" srcset="{{ $config->image->path ?? '' }}?width=140 140w,
                                                {{ $config->image->path ?? '' }}?width=280 280w" width="140"
                                                 height="23.57289527720739" loading="eager" class="small--hide image-element" sizes="140px" itemprop="logo">



                                        </image-element>




                                        <image-element data-aos="image-fade-in" data-aos-offset="150">



                                            <img src="{{ $config->image->path ?? '' }}?width=220"
                                                 alt="" srcset="{{ $config->image->path ?? '' }}?width=110 110w,
                                                {{ $config->image->path ?? '' }}?width=220 220w" width="110" height="18.521560574948662" loading="eager" class="medium-up--hide image-element" sizes="110px">



                                        </image-element>
                                    </a></div></div><div class="header-item header-item--icons"><div class="site-nav">
                                    <div class="site-nav__icons">
                                        <a href="/search" class="site-nav__link site-nav__link--icon js-search-header">
                                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 64 64"><title>icon-search</title><path d="M47.16 28.58A18.58 18.58 0 1 1 28.58 10a18.58 18.58 0 0 1 18.58 18.58ZM54 54 41.94 42"/></svg>
                                            <span class="icon__fallback-text">Search</span>
                                        </a>
                                        <a href="#" class="site-nav__link site-nav__link--icon js-drawer-open-cart" aria-controls="CartDrawer"
                                           data-icon="bag-minimal">
                                              <span class="cart-link">
                                                  <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-bag-minimal" viewBox="0 0 64 64"><title>icon-bag-minimal</title><path stroke="null" fill-opacity="null" stroke-opacity="null" fill="null" d="M11.375 17.863h41.25v36.75h-41.25z"/><path stroke="null" d="M22.25 18c0-7.105 4.35-9 9.75-9s9.75 1.895 9.75 9"/></svg><span class="icon__fallback-text">Cart</span>
                                                <span class="cart-link__bubble">

                                                </span>
                                                  <span class="cart-link__bubble cart-link__bubble--visible" ng-if="cart.count"></span>
                                              </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div></div>
                    <div class="site-header__search-container">
                        <div class="site-header__search">
                            <div class="page-width">
                                <predictive-search data-context="header" data-enabled="true" data-dark="false">
                                    <div class="predictive__screen" data-screen></div>
                                    <form action="#" method="get" role="search">
                                        <label for="Search" class="hidden-label">Search</label>
                                        <div class="search__input-wrap">
                                            <input
                                                class="search__input"
                                                id="Search"
                                                type="search"
                                                name="q"
                                                value=""
                                                role="combobox"
                                                aria-expanded="false"
                                                aria-owns="predictive-search-results"
                                                aria-controls="predictive-search-results"
                                                aria-haspopup="listbox"
                                                aria-autocomplete="list"
                                                autocorrect="off"
                                                autocomplete="off"
                                                autocapitalize="off"
                                                spellcheck="false"
                                                placeholder="Search"
                                                tabindex="0"
                                                ng-model="keyword"
                                            >
                                            <input name="options[prefix]" type="hidden" value="last">
                                            <button class="btn--search" type="button" ng-click="search()">
                                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 64 64"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:2px}</style></defs><path class="cls-1" d="M47.16 28.58A18.58 18.58 0 1 1 28.58 10a18.58 18.58 0 0 1 18.58 18.58zM54 54L41.94 42"/></svg>
                                                <span class="icon__fallback-text">Search</span>
                                            </button>
                                        </div>

                                        <button class="btn--close-search">
                                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><defs><style>.cls-1{fill:none;stroke:#000;stroke-miterlimit:10;stroke-width:2px}</style></defs><path class="cls-1" d="M19 17.61l27.12 27.13m0-27.13L19 44.74"/></svg>
                                        </button>
                                        <div id="predictive-search" class="search__results" tabindex="-1"></div>
                                    </form>
                                </predictive-search>

                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>


</div>


