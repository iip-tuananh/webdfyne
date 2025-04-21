@extends('layouts.main')

@section('css')

@endsection

@section('title')
    Chỉnh sửa màu sắc
@endsection

@section('page_title')
    Chỉnh sửa màu sắc
@endsection

@section('content')
    <div ng-controller="EditColor" ng-cloak>
        @include('admin.colors.form')
    </div>
@endsection

@section('script')
    @include('admin.colors.Color')

    <script>
        app.controller('EditColor', function ($scope, $http) {
            $scope.arrayInclude = arrayInclude;
            $scope.loading = {};
            $scope.form = new Color(@json($object), {scope: $scope});
            $scope.submit = function () {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;

                $.ajax({
                    type: 'POST',
                    url: "/admin/colors/" + "{{ $object->id }}" + "/update",
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
