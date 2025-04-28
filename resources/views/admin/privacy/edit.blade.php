@extends('layouts.main')

@section('css')

@endsection

@section('title')
Chỉnh sửa Chính sách bảo mật
@endsection

@section('page_title')
Chỉnh sửa Chính sách bảo mật
@endsection

@section('content')
<div ng-controller="Post" ng-cloak>
  @include('admin.privacy.form')
</div>
@endsection
@section('script')
@include('admin.privacy.Privacy')
<script>
  app.controller('Post', function ($scope, $http, $timeout) {
    $scope.form = new Privacy(@json($object), {scope: $scope});
    $scope.loading = {};

    $scope.submit = function(publish = 0) {
      $scope.loading.submit = true;
      let data = $scope.form.submit_data;
      $.ajax({
        type: 'POST',
        url: "/admin/privacy/update",
        headers: {
          'X-CSRF-TOKEN': CSRF_TOKEN
        },
        data: data,
        success: function(response) {
          if (response.success) {
            toastr.success(response.message);
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
    }
  });
</script>
@endsection
