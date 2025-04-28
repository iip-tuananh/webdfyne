<!DOCTYPE html>
<html class="no-js" lang="en" >

@include('site.partials.head')
@yield('css')

<body ng-app="App" ng-cloak class="template-product" data-center-text="true" data-button_style="round"
      data-type_header_capitalize="false" data-type_headers_align_text="false" data-type_product_capitalize="false"
      data-swatch_style="round">
    <div id="PageContainer" class="page-container">
        <div class="transition-body">
            @include('site.partials.header')
            @yield('content')

            @include('site.partials.footer')
        </div>
    </div>
    @yield('extends')
</body>

@include('site.partials.angular_mix')

<script>
    app.controller('headerPartial', function ($rootScope, $scope, cartItemSync, isLoading, $interval) {
        $scope.hasItemInCart = true;
        $scope.cart = cartItemSync;
        isLoading.watch($scope, 'isLoading');

        // xóa item trong giỏ
        $scope.removeItem = function (product_id) {
            jQuery.ajax({
                type: 'GET',
                url: "{{route('cart.remove.item')}}",
                data: {
                    product_id: product_id
                },
                success: function (response) {
                    if (response.success) {
                        $scope.cart.items = response.items;
                        $scope.cart.count = Object.keys($scope.cart.items).length;
                        $scope.cart.totalCost = response.total;

                        $interval.cancel($rootScope.promise);

                        $rootScope.promise = $interval(function(){
                            cartItemSync.items = response.items;
                            cartItemSync.total = response.total;
                            cartItemSync.count = response.count;
                        }, 1000);

                        if ($scope.cart.count == 0) {
                            $scope.hasItemInCart = false;
                        }
                        $scope.$applyAsync();
                    }
                },
                error: function (e) {
                    jQuery.toast.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.$applyAsync();
                }
            });
        }

        $scope.mobileMenuOpen = false;

        $scope.toggleMobileMenu = function() {
            $scope.mobileMenuOpen = !$scope.mobileMenuOpen;
            console.log($scope.mobileMenuOpen)
        };

        $scope.changeQty = function (qty, product_id) {
            updateCart(qty, product_id)
        }

        $scope.incrementQuantity = function (product) {
            product.quantity = Math.min(product.quantity + 1, 9999);
        };

        $scope.decrementQuantity = function (product) {
            product.quantity = Math.max(product.quantity - 1, 0);
        };

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


        $scope.search = function () {
            if (!$scope.keyword) return;
            var frontSearchUrl = "{{ route('front.search') }}";

            var q = encodeURIComponent($scope.keyword);
            window.location.href = frontSearchUrl + '?keyword=' + q;
        }
    });

    // đồng bộ hiển thị số lượng item giỏ hàng
    app.factory('cartItemSync', function ($interval) {
        var cart = {items: null, total: null};

        cart.items = @json($cartItems);
        cart.count = {{$cartItems->sum('quantity')}};
        cart.total = {{$totalPriceCart}};

        return cart;
    });

    app.factory('isLoading', function($interval) {
        var loading = false;

        return {
            // bật/tắt trạng thái loading
            set: function(val) {
                loading = !!val;
            },
            // lấy trạng thái hiện tại
            get: function() {
                return loading;
            },
            // cho controller “theo dõi” biến loading trên scope
            watch: function(scope, modelName, pollInterval) {
                pollInterval = pollInterval || 100; // ms
                // mỗi pollInterval ms gán giá trị loading vào scope[modelName]
                var promise = $interval(function() {
                    scope[modelName] = loading;
                }, pollInterval);
                // cleanup khi scope bị destroy
                scope.$on('$destroy', function() {
                    $interval.cancel(promise);
                });
            }
        };
    });

</script>
@stack('script')
@stack('scripts')
</html>
