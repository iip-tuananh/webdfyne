@extends('layouts.main')

@section('css')
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css"
          rel="stylesheet"/>
@endsection

@section('page_title')
    Quản lý màu sắc
@endsection

@section('title')
    Quản lý màu sắc
@endsection

@section('buttons')
    @if(Auth::user()->type == App\Model\Common\User::QUAN_TRI_VIEN || Auth::user()->type == App\Model\Common\User::SUPER_ADMIN)
        <a href="{{ route('colors.create') }}" class="btn btn-outline-success btn-sm" class="btn btn-info"><i
                class="fa fa-plus"></i> Thêm mới</a>
        {{-- <a href="javascript:void(0)" target="_blank" data-href="{{ route('Product.exportExcel') }}" class="btn btn-info export-button btn-sm"><i class="fas fa-file-excel"></i> Xuất file excel</a>
        <a href="javascript:void(0)" target="_blank" data-href="{{ route('Product.exportPDF') }}" class="btn btn-warning export-button btn-sm"><i class="far fa-file-pdf"></i> Xuất file pdf</a> --}}
    @endif
@endsection

@section('content')
    <div>
        <div class="row">
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

@endsection

@section('script')
    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

    @include('admin.colors.Color')
    <script>
        let datatable = new DATATABLE('table-list', {
            ajax: {
                url: '/admin/colors/searchData',
                data: function (d, context) {
                    DATATABLE.mergeSearch(d, context);
                }
            },

            columns: [
                {data: 'DT_RowIndex', orderable: false, title: "STT", className: "text-center"},
                {data: 'code', title: 'Mã màu'},
                {data: 'name', title: 'Tên màu'},
                {
                    data: 'hex_code',
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
                {data: 'name', search_type: "text", placeholder: "Tên màu"},
                {data: 'code', search_type: "text", placeholder: "Mã màu"},
            ],
            act: true,
        }).datatable;


    </script>
    @include('partial.confirm')
@endsection
