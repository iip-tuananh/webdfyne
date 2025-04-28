@extends('layouts.main')

@section('content')
    <div ng-controller="OrderTracking" class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Thêm Tracking cho Đơn #{{ $order->code }}</h2>

        <div class="row">
            <div class="col-md-9">
                    <div class="form-group">
                        <label class="form-label required-label">Capture ID</label>
                        <input type="text" ng-model="form.capture_id"
                               readonly
                               class="w-full border rounded px-3 py-2 bg-gray-100" />
                        <span class="invalid-feedback d-block" role="alert">
				        <strong><% errors.capture_id[0] %></strong>
			        </span>

                    </div>

                    <div class="form-group">
                        <label class="form-label required-label">Đơn vị vận chuyển (carrier)</label>
                        <input type="text" ng-model="form.carrier"
                               placeholder="Ví dụ: GHN, ViettelPost…"
                               class="w-full border rounded px-3 py-2" />

                        <span class="invalid-feedback d-block" role="alert">
				        <strong><% errors.carrier[0] %></strong>
			        </span>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-label">Mã vận đơn (tracking number)</label>
                        <input type="text" ng-model="form.code"
                               placeholder="Nhập mã vận đơn"
                               class="w-full border rounded px-3 py-2" />
                        <span class="invalid-feedback d-block" role="alert">
				        <strong><% errors.code[0] %></strong>
			        </span>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="notify_payer" ng-model="form.notify_payer"
                               class="mr-2">
                        <label for="notify_payer" class="text-gray-700">Gửi email thông báo cho khách</label>
                    </div>

                    <div>
                        <button
                            type="submit"
                            ng-disabled="loading"
                            ng-click="submit()"
                            class="w-full border-2 border-blue-600 text-blue-600 font-medium px-5 py-2 rounded hover:bg-blue-600 hover:text-white transition"
                        >
                            <span ng-show="!loading">Gửi Tracking lên PayPal</span>
                            <span ng-show="loading">Đang gửi…</span>
                        </button>
                    </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        app.controller('OrderTracking', function ($scope, $http) {
            $scope.form = {
                capture_id: "{{ $order->capture_id }}",   // hoặc $order->capture_id
                carrier: null,
                code: "",
                notify_payer: false
            };
            $scope.loading = false;

            // 2. Hàm submit
            $scope.submit = function() {
                if ($scope.loading) return;
                $scope.loading = true;
                $scope.success = '';
                $scope.error   = '';

                $http({
                    method: 'POST',
                    url: "{{ route('orders.track', $order) }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: $scope.form
                }).then(function(res) {
                    console.log(res)
                    if (res.data.success) {
                        toastr.success('Yêu cầu thành công');
                    } else {
                        toastr.warning('Yêu cầu thất bại');
                        $scope.errors = res.data.errors;

                    }

                }).catch(function(err) {
                }).finally(function() {
                    $scope.loading = false;
                });
            };

        });


    </script>
@endsection
