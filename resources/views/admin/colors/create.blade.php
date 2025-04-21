@extends('layouts.main')

@section('page_title')
    Thêm mới màu sắc
@endsection

@section('title')
    Thêm mới màu sắc
@endsection

@section('title')
    Thêm mới màu sắc
@endsection
@section('content')
    <div ng-controller="CreateColor" ng-cloak>
        @include('admin.colors.form')
    </div>
@endsection
@section('script')
    @include('admin.colors.Color')

    <script>
        app.controller('CreateColor', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;
            $scope.loading = {};

            $scope.form = new Color({}, {scope: $scope});

                $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;
                $.ajax({
                    type: 'POST',
                    url: "/admin/colors",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            window.location.href = "{{ route('colors.index') }}";
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
