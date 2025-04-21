@extends('layouts.main')

@section('css')

@endsection

@section('title')
    Chỉnh sửa sản phẩm
@endsection

@section('page_title')
    Chỉnh sửa sản phẩm
@endsection

@section('content')
    <div ng-controller="EditProduct" ng-cloak>
        @include('admin.products.form')
    </div>
@endsection

@section('script')
    @include('admin.products.Product')

    <script>
        app.controller('EditProduct', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;

            $scope.form = new Product(@json($object), {scope: $scope});

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

            $scope.getCollectionList();
            $scope.getCategoriesSpecialList();

            $scope.changeCategory = function () {
                $scope.form.categories_special_ids = []
                $scope.form.collections_ids = []
                $scope.getCollectionList();
                $scope.getCategoriesSpecialList();
            }

            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;

                $.ajax({
                    type: 'POST',
                    url: "/admin/products/" + "{{ $object->id }}" + "/update",
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

            $scope.deleteFile = function(file) {
                swal({
                    title: "Xác nhận!",
                    text: `Bạn chắc chắn muốn xóa file này?`,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Xác nhận",
                    cancelButtonText: "Hủy",
                    closeOnConfirm: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        sendRequest({
                            type: 'POST',
                            url: "{{ route('products.deleteFile', $object->id) }}",
                            data: {
                                file: file
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    $scope.form.attachments = response.data.attachments;
                                } else {
                                    toastr.warning(response.message);
                                }
                            },
                        }, $scope);
                    }
                })
            }

            @include('admin.products.formJs');

        });
    </script>
@endsection
