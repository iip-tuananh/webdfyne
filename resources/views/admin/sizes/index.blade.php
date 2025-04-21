@extends('layouts.main')

@section('css')
@endsection

@section('page_title')
Quản lý sizes
@endsection

@section('title')
    Quản lý sizes
@endsection

@section('buttons')
<a href="javascript:void(0)" class="btn btn-outline-success" data-toggle="modal" data-target="#create-size" class="btn btn-info" ng-click="errors = null"><i class="fa fa-plus"></i> Thêm mới</a>
@endsection
@section('content')
<div ng-cloak>
    <div class="row" ng-controller="Size">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table-list">
                    </table>
                </div>
            </div>
        </div>

        {{-- Form tạo mới --}}
        @include('admin.sizes.create')
        @include('admin.sizes.edit')


    </div>

</div>
@endsection

@section('script')
@include('admin.sizes.Size')
<script>
    let datatable = new DATATABLE('table-list', {
        ajax: {
            url: '/admin/sizes/searchData',
            data: function (d, context) {
                DATATABLE.mergeSearch(d, context);
            }
        },
        columns: [
            {data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
            {data: 'name', title: 'Size'},
            {data: 'updated_at', title: 'Ngày cập nhật'},
            {data: 'updated_by', title: 'Người cập nhật'},
            {data: 'action', orderable: false, title: "Hành động"}
        ],
        search_columns: [
            {data: 'name', search_type: "text", placeholder: "Tên size"},
        ],
    }).datatable;

    createReviewCallback = (response) => {
        datatable.ajax.reload();
    }

    app.controller('Size', function ($rootScope, $scope, $http) {
        $scope.loading = {};
        $scope.form = {}

        $('#table-list').on('click', '.edit', function () {
            $scope.data = datatable.row($(this).parents('tr')).data();

            $.ajax({
                type: 'GET',
                url: "/admin/sizes/" + $scope.data.id + "/getDataForEdit",
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: $scope.data.id,

                success: function(response) {
                    if (response.success) {

                        $scope.booking = response.data;
                        console.log($scope.booking );

                        $rootScope.$emit("editSize", $scope.booking);
                    } else {
                        toastr.warning(response.message);
                        $scope.errors = response.errors;
                    }
                },
                error: function(e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function() {
                    $scope.loading.submit = false;
                    $scope.$applyAsync();
                }
            });
            $scope.errors = null;
            $scope.$apply();
            $('#edit-size').modal('show');
        });

        $('#table-list').on('click', '.remove', function () {
            var self = this;
            event.preventDefault();
            $scope.data = datatable.row($(this).parents('tr')).data();
            $.ajax({
                type: 'GET',
                url: "/admin/sizes/" + $scope.data.id + "/getDataForEdit",
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN
                },
                data: $scope.data.id,

                success: function(response) {
                    if (response.success) {
                        if(response.data.products.length > 0 || response.data.posts.length > 0) {
                            swal({
                                title: "Xác nhận!",
                                text: `Size này đã được gán cho sản phẩm hoặc bài viết. Đồng ý xóa?`,
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Xác nhận",
                                cancelButtonText: "Hủy",
                                closeOnConfirm: true
                            }, function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href = $(self).attr("href");
                                }
                            })
                        } else {
                            swal({
                                title: "Xác nhận xóa!",
                                text: "Bạn chắc chắn muốn xóa loại size này?",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Xác nhận",
                                cancelButtonText: "Hủy",
                                closeOnConfirm: false
                            }, function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href = $(self).attr("href");
                                }
                            })
                        }
                    } else {
                        toastr.warning(response.message);
                        $scope.errors = response.errors;
                    }
                },
                error: function(e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function() {
                    $scope.loading.submit = false;
                    $scope.$applyAsync();
                }
            });

        });

    })

</script>
@include('partial.confirm')
@endsection
