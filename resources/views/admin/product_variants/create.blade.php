@extends('layouts.main')

@section('page_title')
    Thêm mới biến thể
@endsection

@section('title')
    Thêm mới biến thể
@endsection

@section('title')
    Thêm mới biến thể
@endsection
@section('content')
    <div ng-controller="CreateProductVar" ng-cloak>
        @include('admin.product_variants.form')
    </div>
@endsection
@section('script')
    @include('admin.product_variants.Product')

    <script>
        app.controller('CreateProductVar', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;
            $scope.loading = {};

            $scope.form = new Product({}, {scope: $scope});

            $scope.changeColor = function () {
                console.log($scope.form.selectedColor)
            }

            @include('admin.products.formJs')
            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;
                $.ajax({
                    type: 'POST',
                    url: "/admin/product-variants",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('product_variants.index') }}";
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.getProductDetail = function (product_id) {
                $.ajax({
                    type: 'GET',
                    url: "/admin/products/" + product_id + "/getData",
                    success: function(response) {
                        if (response.success) {
                            $scope.product = response.data;
                            console.log($scope.product);
                        } else {
                            toastr.error('Đã có lỗi xảy ra');
                        }
                    },
                    error: function(e) {
                        $scope.product = {}
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            const params = new URLSearchParams(window.location.search);
            const productId = params.get('product-id');

            $scope.form.product_id = productId;

            $scope.getProductDetail($scope.form.product_id);

        });
    </script>
@endsection
