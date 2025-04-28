@extends('layouts.main')

@section('css')

@endsection

@section('title')
Chỉnh sửa Điều khoản & Điều kiện
@endsection

@section('page_title')
Chỉnh sửa Điều khoản & Điều kiện
@endsection

@section('content')
<div ng-controller="Post" ng-cloak>
  @include('admin.term.form')
</div>
@endsection
@section('script')
@include('admin.term.Term')
<script>
  app.controller('Post', function ($scope, $http, $timeout) {
    $scope.form = new Term(@json($object), {scope: $scope});
    $scope.loading = {};

    $scope.submit = function(publish = 0) {
      $scope.loading.submit = true;
      let data = $scope.form.submit_data;
      $.ajax({
        type: 'POST',
        url: "/admin/term/update",
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
