@extends('layouts.main')

@section('page_title')
    Thêm mới sản phẩm
@endsection

@section('title')
    Thêm mới sản phẩm
@endsection

@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    <div ng-controller="CreateProduct" ng-cloak>
        @include('admin.products.form')
    </div>
@endsection
@section('script')
    @include('admin.products.Product')

    <script>
        app.controller('CreateProduct', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;
            $scope.loading = {};

            $scope.form = new Product({}, {scope: $scope});

            $scope.getCollectionList = function () {
                $.ajax({
                    type: 'GET',
                    url: "/admin/categories/" + $scope.form.cate_id + "/getCollectionByCateId",
                    success: function(response) {
                        if (response.success) {
                            $scope.collections = response.data
                        } else {
                            toastr.error('Đã có lỗi xảy ra');
                        }
                    },
                    error: function(e) {
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.getCategoriesSpecialList = function () {
                $.ajax({
                    type: 'GET',
                    url: "/admin/categories/" + $scope.form.cate_id + "/getCategoriesSpecialByCateId",
                    success: function(response) {
                        if (response.success) {
                            $scope.cateSpecials = response.data
                        } else {
                            toastr.error('Đã có lỗi xảy ra');
                        }
                    },
                    error: function(e) {
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.changeCategory = function () {
                $scope.form.categories_special_ids = []
                $scope.form.collections_ids = []
                $scope.getCollectionList();
                $scope.getCategoriesSpecialList();
            }

            @include('admin.products.formJs')
                $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;
                $.ajax({
                    type: 'POST',
                    url: "/admin/products",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('Product.index') }}";
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

        });
    </script>
@endsection
