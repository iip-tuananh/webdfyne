@extends('layouts.main')

@section('css')

@endsection

@section('title')
    Chỉnh sửa biến thể
@endsection

@section('page_title')
    Chỉnh sửa biến thể
@endsection

@section('content')
    <div ng-controller="EditProductVar" ng-cloak>
        @include('admin.product_variants.form')
    </div>
@endsection

@section('script')
    @include('admin.product_variants.Product')

    <script>
        app.controller('EditProductVar', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;

            $scope.form = new Product(@json($object), {scope: $scope});
            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;

                $.ajax({
                    type: 'POST',
                    url: "/admin/product-variants/" + "{{ $object->id }}" + "/update",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    processData: false,
                    contentType: false,
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('product_variants.index') }}?product-id={{ $object->product_id }}";
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

            $scope.getProductDetail($scope.form.product_id);

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
