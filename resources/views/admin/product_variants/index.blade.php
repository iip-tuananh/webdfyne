@extends('layouts.main')

@section('css')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css"
          rel="stylesheet"/>
@endsection

@section('page_title')
    Quản lý biến thể
@endsection

@section('title')
    Quản lý biến thể
@endsection

@section('buttons')
    @if(Auth::user()->type == App\Model\Common\User::QUAN_TRI_VIEN || Auth::user()->type == App\Model\Common\User::SUPER_ADMIN)
        <a href="{{ route('product_variants.create') }}" class="btn btn-outline-success btn-sm" class="btn btn-info"><i
                class="fa fa-plus"></i> Thêm mới</a>
        {{-- <a href="javascript:void(0)" target="_blank" data-href="{{ route('Product.exportExcel') }}" class="btn btn-info export-button btn-sm"><i class="fas fa-file-excel"></i> Xuất file excel</a>
        <a href="javascript:void(0)" target="_blank" data-href="{{ route('Product.exportPDF') }}" class="btn btn-warning export-button btn-sm"><i class="far fa-file-pdf"></i> Xuất file pdf</a> --}}
    @endif
@endsection

@section('content')
    <div>
        <div class="row" ng-controller="Product">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-list">
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>


    @include('common.units.createUnit')
@endsection

@section('script')
    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

    @include('admin.products.Product')
    <script>
        let datatable = new DATATABLE('table-list', {
            ajax: {
                url: '/admin/product-variants/searchData',
                data: function (d, context) {
                    DATATABLE.mergeSearch(d, context);
                }
            },
            columns: [
                {data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
                {data: 'name', title: 'Sản phẩm'},
                {data: 'cate_id', title: 'Danh mục'},
                {data: 'price', title: "Đơn giá bán"},
                {
                    data: 'color',
                    title: 'Màu',
                    orderable: false,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        // Kiểm tra nếu có dữ liệu hex_code, hiển thị div màu; nếu không thì trả về chuỗi rỗng
                        if(data) {
                            return '<div style="width: 30px; height: 30px; margin: auto; border: 1px solid #ccc; background-color: ' + data + ';"></div>';
                        }
                        return '';
                    }
                },

                {data: 'action', orderable: false, title: "Hành động"}
            ],
            search_columns: [
                {data: 'name', search_type: "text", placeholder: "Tên sản phẩm"},
                {
                    data: 'cate_id', search_type: "select", placeholder: "Danh mục",
                    column_data: @json(App\Model\Admin\Category::getForSelect())
                },
            ],
            act: true,
        }).datatable;

        app.controller('Product', function ($scope, $rootScope, $http) {
            $scope.units = @json(App\Model\Common\Unit::all());
            $scope.categories = @json(App\Model\Common\ProductCategory::all());
            $scope.categorieSpeicals = @json(\App\Model\Admin\CategorySpecial::getForSelectForProduct());
            $scope.loading = {};
            $scope.arrayInclude = arrayInclude;

            $rootScope.$on("createdProductCategory", function (event, data) {
                $scope.formEdit.all_categories.push(data);
                $scope.formEdit.product_category_id = data.id;
                $scope.$applyAsync();
            });

            // Show hàng hóa
            $('#table-list').on('click', '.show-product', function () {
                $scope.data = datatable.row($(this).parents('tr')).data();
                $scope.formEdit = new Product($scope.data, {scope: $scope});
                $scope.$apply();
                $('#show-modal').modal('show');
            });

            // Sửa hàng hóa
            $('#table-list').on('click', '.edit', function () {
                $scope.data = datatable.row($(this).parents('tr')).data();
                $scope.formEdit = new Product($scope.data, {scope: $scope});

                createUnitCallback = (response) => {
                    $scope.formEdit.all_units.push(response);
                    $scope.formEdit.unit_id = response.id;
                }

                $scope.errors = null;
                $scope.$apply();
                $('#edit-modal').modal('show');
            });

            // Submit mode mới
            $scope.submit = function () {
                $scope.loading.submit = false;
                $.ajax({
                    type: 'POST',
                    url: "/uptek/products/" + $scope.formEdit.id + "/update",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    processData: false,
                    contentType: false,
                    data: $scope.formEdit.submit_data,
                    success: function (response) {
                        if (response.success) {
                            $('#edit-modal').modal('hide');
                            toastr.success(response.message);
                            if (datatable.datatable) datatable.ajax.reload();
                            $scope.errors = null;
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

            $('#table-list').on('click', '.add-category-special', function () {
                event.preventDefault();
                $scope.data = datatable.row($(this).parents('tr')).data();
                $.ajax({
                    type: 'GET',
                    url: "/admin/products/" + $scope.data.id + "/getData",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: $scope.data.id,

                    success: function (response) {
                        if (response.success) {
                            $scope.product = response.data;
                            console.log($scope.product);
                        } else {
                            toastr.warning(response.message);
                        }
                        $scope.$applyAsync();
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });

                $('#add-to-category-special').modal('show');
            })

            $scope.submit = function () {
                let url = "/admin/products/add-category-special";
                $scope.loading.submit = true;
                console.log($scope.product.category_special_ids);
                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: {
                        product_id: $scope.product.id,
                        category_special_ids: $scope.product.category_special_ids
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#add-to-category-special').modal('hide');
                            toastr.success(response.message);
                            datatable.ajax.reload();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    },
                });
            }

        })

        function removeProductArr() {
            var product_remove_ids = [];
            var rows_selected = datatable.column(0).checkboxes.selected();

            $.each(rows_selected, function (index, rowId) {
                product_remove_ids.push(rowId);
            });

            if(product_remove_ids.length == 0) {
                toastr.warning("Chưa có sản phẩm nào được chọn");
                return;
            }

            var product_ids = product_remove_ids.join(',');
            swal({
                title: "Xác nhận xóa!",
                text: "Bạn chắc chắn muốn xóa "+product_remove_ids.length+" sản phẩm",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Xác nhận",
                cancelButtonText: "Hủy",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    window.location.href = "{{route('products.delete.multi')}}?product_ids="+product_ids;
                }
            })
        }

        $(document).on('click', '.export-button', function (event) {
            event.preventDefault();
            let data = {};
            mergeSearch(data, datatable.context[0]);
            window.location.href = $(this).data('href') + "?" + $.param(data);
        })

    </script>
    @include('partial.confirm')
@endsection
