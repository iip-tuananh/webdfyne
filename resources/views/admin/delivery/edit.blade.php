@extends('layouts.main')

@section('css')

@endsection

@section('title')
Chỉnh sửa Chính sách vận chuyển
@endsection

@section('page_title')
Chỉnh sửa Chính sách vận chuyển
@endsection

@section('content')
<div ng-controller="Post" ng-cloak>
  @include('admin.delivery.form')
</div>
@endsection
@section('script')
@include('admin.delivery.Delivery')
<script>
  app.controller('Post', function ($scope, $http, $timeout) {
    $scope.form = new Delivery(@json($object), {scope: $scope});
    $scope.loading = {};

    $scope.submit = function(publish = 0) {
      $scope.loading.submit = true;
      let data = $scope.form.submit_data;
      $.ajax({
        type: 'POST',
        url: "/admin/delivery/update",
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
