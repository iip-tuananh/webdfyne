@extends('site.layouts.master')
@section('title')

@endsection

@section('css')
    <style>
        .invalid-feedback {
            color: #be0606;
        }
    </style>
@endsection

@section('content')
    <main class="main-content" id="MainContent" ng-controller="trackingOrder">

        <!-- This tracking page is powered by Track123 - visit https://apps.shopify.com/track123 to know more info! -->

        <title>Track order status</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="Track delivery status of your packages. Powered by Track123.">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <link rel="stylesheet" href="https://shp.track123.com/tracking-page/tradition/css/theme/light.css?v=1745302542659">





        <link rel="stylesheet" href="https://shp.track123.com/tracking-page/tradition/css/theme/slightlyRounded.css?v=1745302542659">

        <link rel="stylesheet" href="https://shp.track123.com/tracking-page/build/common-tradition.min.css?v=1745302542659">
        <link rel="stylesheet" media="screen and (max-width: 800px)" href="https://shp.track123.com/tracking-page/build/smallScreen-tradition.min.css?v=1745302542659">
        <script type="module">
            const RESOURCE_CONFIG = {
                three: {
                    sources: [
                        'https://unpkg.com/three/build/three.module.js',
                        'https://shp.track123.com/tracking-page/vendor/three.module.js',
                        'https://cdn.jsdelivr.net/npm/three@latest/build/three.module.js',
                    ],
                    loader: async (url) => {
                        const module = await import(url);
                        window.THREE = module;
                    }
                },
                globe: {
                    sources: [
                        'https://unpkg.com/globe.gl',
                        'https://shp.track123.com/tracking-page/vendor/globe.gl.min.js',
                        'https://cdn.jsdelivr.net/npm/globe.gl',
                    ],
                    loader: (url) => new Promise((resolve, reject) => {
                        const script = document.createElement('script');
                        script.async = true;
                        script.setAttribute('fetchpriority', 'high');
                        script.src = url;
                        script.onload = resolve;
                        script.onerror = reject;
                        document.head.prepend(script);
                    })
                }
            };

            class ResourceLoader {
                static async load(resourceName) {
                    const { sources, loader } = RESOURCE_CONFIG[resourceName];

                    for (const url of sources) {
                        try {
                            await loader(url);
                            console.log(`${resourceName} loaded from:${url}`);
                            return true;
                        } catch (error) {
                            console.warn(`${resourceName} load failed:${url}`, error);
                        }
                    }
                    throw new Error(`${resourceName} load failed`);
                }
            }

            // 初始化
            (async () => {
                try {
                    await Promise.all([
                        ResourceLoader.load('three'),
                        ResourceLoader.load('globe')
                    ]);
                } catch (e) {
                    console.error('Critical resource load failure:', e);
                }
            })();
        </script>
        <!-- <script type="module">
            // import * as THREE from '//unpkg.com/three/build/three.module.js';
            import * as THREE from 'https://shp.track123.com/tracking-page/vendor/three.module.js';
            window.THREE = THREE
            console.log('222222')
        </script> -->
        <!-- <script async src="//unpkg.com/globe.gl"></script> -->
        <!-- <script src="https://shp.track123.com/tracking-page/vendor/globe.gl.min.js"></script> -->
        <script crossorigin="" src="https://applepay.cdn-apple.com/jsapi/1.latest/apple-pay-sdk.js"></script>
        <script src="https://shp.track123.com/tracking-page/build/vendor.min.js?v=1745302542659"></script>
        <script src="https://shp.track123.com/tracking-page/build/mixins.min.js?v=1745302542659s"></script>
        <script src="https://shp.track123.com/tracking-page/build/components-tradition.min.js?v=1745302542659"></script>



        <div id="track123-app"><div><div class=""></div> <!---->
                <div id="track123_track_wrapper" class="track123_track_wrapper track123_track_content">
                    <div>

                    </div>
                    <div class="track123_layout_Left">
                        <div class="track123_form_wrapper track_form">
                            <h1 id="track123_track_title" class="track123_track_form_title track123_title">Theo dõi đơn hàng</h1>
                            <div class=""><div id="track123_text_above" class="track123_tracking_above"></div></div>
                            <div><!----> <div class="track123_tab"><div class="track123_tab_bar track123_tab_bar_color">Order Number</div>
                                    <div class="track123_tab_bar">Tracking Number</div></div>
                                <div class="track123_form_container">
                                    <div class="track123_two_form_wrapper" style="min-height: unset;">
                                        <div class="track123_input_wrapper">
                                            <div class="track123_input_container">
                                                <div id="track123_order_number" class="track123_form_label">
                                                   Mã đơn hàng
                                                </div>
                                                <input placeholder="" class="track123_form_input track123_form_field track123_form_input1 form__input"
                                                       ng-model="order_number">
                                                <div class="track123_form_error track123_order_no_alert">
                                                    Order Number is required
                                                </div>

                                                <span class="invalid-feedback d-block" role="alert">
                                                      <strong><% errors.order_number[0] %></strong>
                                                </span>
                                            </div>
{{--                                            <div class="track123_input_container">--}}
{{--                                                <div id="track123_order_email" class="track123_form_label">Email or Phone Number</div>--}}
{{--                                                <input placeholder="" class="track123_form_input track123_form_field track123_form_input2 form__input" ng-model="email">--}}
{{--                                                <div class="track123_form_error track123_order_no_alert">--}}
{{--                                                    Email hoặc Số điện thoại--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <button type="button" id="track123_submit_button" ng-click="submit()"
                                                    class="button-enter btn button button--solid btn--solid button--primary button-primary btn--primary button_primary Button Button--primary styled-submit track123_form_button track123_form_button_style">
                                                Tra cứu
                                            </button>
                                        </div>
                                    </div>
                                </div></div> <div class="">
                                <div id="track123_text_below" class="track123_tracking_below"></div>
                            </div>
                        </div>
                    </div>
                    <div>

                    </div>
                    <div class="card p-4" style="margin-top: 10px" ng-show="isLoading">
                        <div class="mt-4">
                            <p><strong>Mã order: </strong><% order.code %> </p>
                            <p><strong>Trạng thái đơn hàng: </strong><% order.status %> </p>
                            <p><strong>Đơn vị vận chuyển:</strong> <% order.carrier %> </p>
                            <p><strong>Mã vận đơn:</strong>  <% order.tracking_number %></p>
                            <p><strong>Trạng thái vận chuyển: Đang chờ cập nhật</strong> </p>
                            <p><strong>Ngày dự kiến giao: /  /  /</strong> </p>

                            <div class="alert alert-info mt-3">
                                Hệ thống sẽ cập nhật trạng thái vận chuyển tự động khi có dữ liệu từ đối tác.
                                Nếu cần hỗ trợ, vui lòng liên hệ <a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://shp.track123.com/tracking-page/build/index-tradition.min.js?v=1745302542659"></script>

        <script type="text/javascript">
            const googleTranslateWidget = false;
            if (googleTranslateWidget) {
                const googleTranslateScripit = document.createElement('script');
                googleTranslateScripit.type = 'text/javascript';
                googleTranslateScripit.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
                document.head.appendChild(googleTranslateScripit);

                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({ pageLanguage:"en" }, "google_translate_element");
                }
                const googleTranslateElement = document.createElement('div');
                const googleTranslateWidgetPosition = "bottomLeft";
                if (googleTranslateWidgetPosition == 'bottomLeft') {
                    googleTranslateElement.innerHTML = '<div id="google_translate_element" style="position:fixed;bottom:10px; display: block; left: 10px; right: unset; z-index: 100000000; background-color: transparent;"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage"></div></div></div>';
                } else {
                    googleTranslateElement.innerHTML = '<div id="google_translate_element" style="position:fixed;bottom:10px; display: block; left: unset; right: 10px; z-index: 100000000; background-color: transparent;"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage"></div></div></div>';
                }
                document.body.appendChild(googleTranslateElement);
            }
            const seo_title = "Track order status";
            if (seo_title) {
                const titleDom = document.getElementsByTagName("title");
                if (titleDom?.length) {
                    titleDom[0].innerText = seo_title;
                } else {
                    const titleNewDom = document.createElement('title');
                    titleNewDom.innerText = seo_title;
                    document.head.appendChild(titleNewDom);
                }
            }
            const seo_description = "Track delivery status of your packages. Powered by Track123.";
            if (seo_description) {
                const descriptionDom = document.createElement('meta');
                descriptionDom.name = 'description';
                descriptionDom.content = seo_description;
                document.head.appendChild(descriptionDom);
            }
            const seo_keywords = "";
            if (seo_keywords) {
                const keywordsDom = document.createElement('meta');
                keywordsDom.name = 'keywords';
                keywordsDom.content = seo_keywords;
                document.head.appendChild(keywordsDom);

            }
        </script>
        <style>  </style>
        <div id="shopify-block-AVFIySTFEaVpmWUFPS__144831480468751239" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: vite-tag -->


            <script src="https://cdn.shopify.com/extensions/0fc00f5a-3f37-496f-b8d9-ebed70859e1d/essential-upsell-139/assets/app-embed-DZ0oyfQO.js" type="module" crossorigin="anonymous"></script>
            <link rel="modulepreload" href="https://cdn.shopify.com/extensions/0fc00f5a-3f37-496f-b8d9-ebed70859e1d/essential-upsell-139/assets/stylex-9DS1jsY4.js" crossorigin="anonymous">
            <link href="//cdn.shopify.com/extensions/0fc00f5a-3f37-496f-b8d9-ebed70859e1d/essential-upsell-139/assets/stylex-DFEZgduC.css" rel="stylesheet" type="text/css" media="all">

            <!-- END app snippet -->




        </div><div id="shopify-block-AR2FMSW9nNERWcU9kV__6174324309569838175" class="shopify-block shopify-app-block">


            <div class="smile-shopify-init" data-channel-key="channel_R2Pa8rhJdoQ83FJF02s72Zmd"></div>


        </div><div id="shopify-block-AYkpjcWFINkF3RWlJV__1513253815146976218" class="shopify-block shopify-app-block">
        </div>


        <style>
            apple-wallet-button {
                --apple-wallet-button-border-radius: 5px;
                --apple-wallet-button-height: 40px;
                --apple-wallet-button-width: 180;
                --apple-wallet-button-padding: 0px 0px;
                --apple-wallet-button-box-sizing: content-box;
            }

            .track123_track_wrapper {
                max-width: 1200px;
            }
            .track123_loading{
                width: 120px;
                height: 50vh;
                margin: 0 auto;
                margin-top:0px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .track123_loading span{
                margin: 4px;
                width: 0.5rem;
                height: 0.5rem;
                background-color: #6D7175;
                border-radius: 50%;
                display: inline-block;
                line-height: 3rem;
                animation: loading 1.25s infinite ease;
                animation-play-state: paused;
                -webkit-animation: load 1.5s infinite ease;
            }
            @-webkit-keyframes load{
                0% {
                    -webkit-transform: scale(1);
                }
                20% {
                    -webkit-transform: scale(2.5);
                }
                40% {
                    -webkit-transform: scale(1);
                }
            }
            .track123_loading span:nth-child(2){
                -webkit-animation-delay:0.3s;
            }
            .track123_loading span:nth-child(3){
                -webkit-animation-delay:0.6s;
            }
            .track123_loading span:nth-child(4){
                -webkit-animation-delay:0.9s;
            }
            .track123_loading span:nth-child(5){
                -webkit-animation-delay:1.2s;
            }
        </style>

    </main>

@endsection

@section('extends')

@endsection

@push('scripts')
    <script>
        app.controller('trackingOrder', function ($rootScope, $scope, $sce, $interval) {
            $scope.order = {};
            $scope.isLoading = false;
               $scope.submit = function () {
                   jQuery.ajax({
                       type: 'POST',
                       url: "{{ route('front.getTracking') }}",
                       headers: {
                           'X-CSRF-TOKEN': "{{ csrf_token() }}"
                       },
                       data: {
                           order_number: $scope.order_number
                       },
                       success: function (response) {
                           if (response.success) {
                               $scope.isLoading = true;
                               toastr.success('Thao tác thành công');
                               $scope.order = response.data
                           } else {
                               toastr.warning(response.message);
                               $scope.errors = response.errors;
                           }
                       },
                       error: function (e) {
                           toastr.error('Đã có lỗi xảy ra');
                       },
                       complete: function () {
                           $scope.$applyAsync();
                       }
                   });
               }
        })

    </script>
@endpush
