@extends('site.layouts.master')
@section('title')
    Giỏ hàng
@endsection

@section('css')
    <style>
        /* Phần bao bên ngoài */
        .sort-container {
            display: inline-block;
            font-family: sans-serif; /* Hoặc font bạn muốn */
        }

        /* Label "Sort by:" */
        .sort-container label {
            font-weight: bold;
            margin-right: 8px;
        }

        /* Select chính */
        .sort-select {
            /* Kích thước, padding, border... */
            font-size: 14px;
            padding: 6px 8px;
            min-width: 180px;
            border: 1px solid #ccc;
            border-radius: 4px;

            /* Xóa kiểu mặc định của trình duyệt (mũi tên, background...) */
            appearance: none;
            -moz-appearance: none; /* Firefox */
            -webkit-appearance: none; /* Safari & Chrome */

            /* Nền trắng + icon mũi tên */
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg%20width%3D'8'%20height%3D'6'%20viewBox%3D'0%200%208%206'%20xmlns%3D'http%3A//www.w3.org/2000/svg'%3E%3Cpath%20d%3D'm1%201.5%203%203%203-3'%20fill%3D'none'%20stroke%3D'%23333'%20stroke-width%3D'1.5'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 8px 6px;

            /* Con trỏ chuột + hiệu ứng focus */
            cursor: pointer;
        }

        .sort-select:focus {
            outline: none;
            border-color: #999;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
    </style>
@endsection

@section('content')
    <div ng-controller="cart" ng-cloak>
        <section id="shopify-section-template--17549462143134__main" class="shopify-section shopify-section--main-cart" ng-if="countItem">
            <div class="container">
                <div class="page-spacer">
                    <div class="cart">
                        <div class="cart-header">
                            <h1 class="h2">Giỏ hàng</h1></div>

                        <div class="cart-order">
                            <div class="cart-order__summary">
                                <table class="order-summary">
                                    <thead class="order-summary__header">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th class="w-0">Số lượng</th>
                                        <th class="text-end">Tổng</th>
                                    </tr>
                                    </thead>

                                    <tbody class="order-summary__body">
                                    <tr ng-repeat="item in items">
                                        <td>
                                            <line-item class="line-item">
                                                <div class="line-item__media-wrapper"><img
                                                        src="<% item.attributes.image %>"
                                                        alt="<% item.name %>"
                                                        width="900" height="900" loading="lazy"
                                                        sizes="(max-width: 740px) 80px, 96px"
                                                        class="line-item__media rounded-xs">
                                                    <pill-loader class="pill-loader">
                                                        <div class="loader-dots">
                                                            <span></span>
                                                            <span></span>
                                                            <span></span>
                                                        </div>

                                                        <svg class="loader-checkmark" fill="none" width="9" height="8"
                                                             viewBox="0 0 9 8">
                                                            <path d="M1 3.5 3.3 6 8 1" stroke="currentColor"
                                                                  stroke-width="2"></path>
                                                        </svg>
                                                    </pill-loader>
                                                </div>
                                                <div class="line-item__info">
                                                    <div class="v-stack gap-0.5"><a
                                                            href="/products/monster-torch?variant=39466293067934"
                                                            class="bold">
                                                            <span class="reversed-link hover:show"><% item.name %></span>
                                                        </a>
                                                        <price-list class="price-list  ">
                                                            <sale-price class="text-subdued">
                                                                <span class="sr-only">Sale price</span><% item.price | number %>
                                                            </sale-price>
                                                        </price-list>
                                                    </div>
                                                    <div class="text-sm text-subdued sm:hidden">
                                                        <line-item-quantity class="h-stack justify-center gap-3">
                                                            <input class="quantity-input" type="text"
                                                                   is="quantity-input" inputmode="numeric"
                                                                   data-line-key="39466293067934:77ff29a02cb052a52ae8962b2a120be2"
                                                                   aria-label="Change quantity" value="1">

                                                            <span class="text-xs">
            <a href="/cart/change?id=39466293067934:77ff29a02cb052a52ae8962b2a120be2&amp;quantity=0"
               class="link">Remove</a>
          </span>
                                                        </line-item-quantity>
                                                    </div>
                                                </div>
                                            </line-item>
                                        </td>

                                        <td class="hidden align-center text-center text-subdued sm:table-cell">
                                            <line-item-quantity class="v-stack justify-center gap-2">
                                                <input class="quantity-input" type="text" is="quantity-input"
                                                       inputmode="numeric"
                                                       ng-model="item.quantity"
                                                       ng-change="changeQty(item.quantity, item.id)"
                                                       data-line-key="39466293067934:77ff29a02cb052a52ae8962b2a120be2"
                                                       aria-label="Change quantity" value="4">

                                                <span class="text-xs">
                          <a ng-click="removeItem(item.id)"
                             class="link">Remove</a>
                        </span>
                                            </line-item-quantity>
                                        </td>

                                        <td class="hidden align-center text-subdued text-end sm:table-cell"><% (item.price * item.quantity) | number %> đ</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <details class=" accordion accordion--lg group" aria-expanded="false"
                                         is="accordion-disclosure">
                                    <summary>
                                        <div class="accordion__toggle bold">
                                            <div class="text-with-icon">
                                                <svg role="presentation" fill="none" focusable="false" stroke-width="2"
                                                     width="24" height="24" class="icon icon-picto-box"
                                                     viewBox="0 0 24 24">
                                                    <path
                                                        d="M2.22 5.472a.742.742 0 0 0-.33.194.773.773 0 0 0-.175.48c-.47 4.515-.48 7.225 0 11.707a.792.792 0 0 0 .505.737l9.494 3.696.285.079.286-.08 9.494-3.694a.806.806 0 0 0 .505-.737c.5-4.537.506-7.153 0-11.648a.765.765 0 0 0-.175-.542.739.739 0 0 0-.33-.257v.002"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M22.269 5.997a.771.771 0 0 0-.16-.335.744.744 0 0 0-.33-.257l-9.494-3.629a.706.706 0 0 0-.571 0L6.967 3.623 2.22 5.47a.742.742 0 0 0-.33.192.771.771 0 0 0-.16.336.806.806 0 0 0 .49.592l9.494 3.696h.57l5.216-2.03L21.78 6.59a.794.794 0 0 0 .492-.593h-.002Z"
                                                        fill="currentColor" fill-opacity=".12"></path>
                                                    <path
                                                        d="m17.5 8.255-5.215 2.03h-.571L2.22 6.59a.806.806 0 0 1-.49-.592.771.771 0 0 1 .16-.336.742.742 0 0 1 .33-.192l4.747-1.847M17.5 8.255 21.78 6.59a.794.794 0 0 0 .492-.593h-.002a.771.771 0 0 0-.16-.335.744.744 0 0 0-.33-.257l-9.494-3.629a.706.706 0 0 0-.571 0L6.967 3.623M17.5 8.255 6.967 3.623M12 22.365v-12.08M15.5 17l4-1.5"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>

                                            </div>

                                        </div>
                                    </summary>

                                </details>
                            </div>

                            <safe-sticky class="cart-order__recap v-stack gap-6" style="top: 114px;">
                                <form action="/cart" method="POST" class="cart-form rounded">
                                    <div class="cart-form__totals v-stack gap-2">
                                        <div class="h-stack gap-4 justify-between">
                                            <span class="text-subdued">Tạm tính</span>
                                            <span class="text-subdued"><% total | number%> đ</span>
                                        </div>


                                        <div class="h-stack gap-4 justify-between">
                                            <span class="h5">Tổng</span>
                                            <span class="h5"><% total | number%> đ</span>
                                        </div>

                                    </div>
                                    <cart-note class="cart-form__note block">
                                        <div class="form-control"><textarea
                                                id="input-template--17549462143134__main--note"
                                                class="textarea is-floating" is="resizable-textarea" name="note"
                                                placeholder=" " rows="3"></textarea><label
                                                for="input-template--17549462143134__main--note" class="floating-label">Order
                                                note</label></div>
                                    </cart-note>
                                    <button type="button" class="button button--xl w-full" name="checkout"
                                            is="custom-button">
                                        <div>
                                            <a href="{{ route('cart.checkout') }}">
                                            <div class="text-with-icon justify-center">
                                                <svg role="presentation" fill="none" focusable="false" stroke-width="2"
                                                     width="18" height="18" class="icon icon-picto-lock"
                                                     viewBox="0 0 24 24">
                                                    <path
                                                        d="M3.236 18.182a5.071 5.071 0 0 0 4.831 4.465 114.098 114.098 0 0 0 7.865-.001 5.07 5.07 0 0 0 4.831-4.464 23.03 23.03 0 0 0 .165-2.611c0-.881-.067-1.752-.165-2.61a5.07 5.07 0 0 0-4.83-4.465c-1.311-.046-2.622-.07-3.933-.069a109.9 109.9 0 0 0-3.933.069 5.07 5.07 0 0 0-4.83 4.466 23.158 23.158 0 0 0-.165 2.609c0 .883.067 1.754.164 2.61Z"
                                                        fill="currentColor" fill-opacity=".12"
                                                        stroke="currentColor"></path>
                                                    <path d="M17 8.43V6.285A5 5 0 0 0 7 6.286V8.43"
                                                          stroke="currentColor" stroke-linecap="round"
                                                          stroke-linejoin="round"></path>
                                                    <path
                                                        d="M12 17.714a2.143 2.143 0 1 0 0-4.286 2.143 2.143 0 0 0 0 4.286Z"
                                                        stroke="currentColor"></path>
                                                </svg>
                                              Thanh toán
                                            </div></a>

                                        </div>

                                        <span class="button__loader">
        <span></span>
        <span></span>
        <span></span>
      </span></button>
                                </form>
                            </safe-sticky>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section id="shopify-section-template--17549462143134__main" class="shopify-section shopify-section--main-cart" ng-if="!countItem">
            <div class="container">
                <div class="empty-state">
                    <div class="empty-state__icon-wrapper">
                        <svg role="presentation" stroke-width="1" focusable="false" width="32" height="32"
                             class="icon icon-cart" viewBox="0 0 22 22">
                            <path d="M11 7H3.577A2 2 0 0 0 1.64 9.497l2.051 8A2 2 0 0 0 5.63 19H16.37a2 2 0 0 0 1.937-1.503l2.052-8A2 2 0 0 0 18.422 7H11Zm0 0V1"
                                  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="count-bubble count-bubble--lg">0</span>
                    </div>

                    <div class="prose">
                        <p class="h4">Chưa có sản phẩm nào trong giỏ hàng của bạn</p>
                        <a class="button button--xl"


                           href="/collections/all"


                        >Tiếp tục mua sắm</a></div>
                </div>
            </div>

        </section>

    </div>
@endsection

@push('scripts')
    <script>
        app.controller('cart', function ($rootScope, $scope, $sce, $interval, cartItemSync) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total}}";
            $scope.checkCart = true;

            $scope.countItem = Object.keys($scope.items).length;

            jQuery(document).ready(function () {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            $scope.changeQty = function (qty, product_id) {
                updateCart(qty, product_id)
            }

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{route('cart.update.item')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    beforeSend: function() {
                        jQuery('.loading-spin').show();
                        // showOverlay();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        jQuery('.loading-spin').hide();
                        // hideOverlay();
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeItem = function (product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.countItem = Object.keys($scope.items).length;

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            function showOverlay() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'flex';
            }

            function hideOverlay() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'none';
            }
        })

    </script>
@endpush
