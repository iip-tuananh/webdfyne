@extends('site.layouts.master')
@section('title')

@endsection

@section('css')
    <style>
        .error_ {
            color: #b44141;
        }
    </style>

@endsection

@section('content')
    <main class="main-content" id="MainContent" ng-controller="contact" ng-cloak>
        <section id="shopify-section-template--18159281864797__main" class="shopify-section">
            <div class="page-width page-width--narrow page-content">
                <header class="section-header">
                    <h1 class="section-header__title">Contact Us | Form</h1>
                </header>

                <div class="rte rte--nomargin">
                    <div id="wizard-validation-form" class="hulk_form_UeDxJY4qyWKedCV-7IP-hg">
                        <div class="formContainer">
                            <form action="#" method="post" id="form-contact">
                                <div class="form_generater_form_div">
                                    <div class="tab" style="display: block;">
                                        <div class="row">
                                            <div class="col-md-12 clearfix">
                                                <div class="form_title_div" tabindex="0" aria-label="Contact Us
" aria-describedby="Form title"><p>Contact Us</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 clearfix">
                                                <div class="alert_message" style="display:none;">

                                                </div>
                                            </div>

                                            <div class="col-md-12 form_element clearfix">
                                                <div class="row form_container">


                                                    <div class="formElement_2 form-group fadeMe text clearfix col-sm-6 textfield paymentCount" data-count="2">
                                                        <label class="fitText block_label" for="form_input_2" tabindex="0"
                                                               aria-label="First Name" style="display: block;">First Name</label>
                                                        <input class="form-control" aria-required="false" name="contact[first_name]" id="form_input_2"
                                                               type="text" aria-placeholder="" placeholder="">
                                                        <div class="invalid-feedback d-block error_" role="alert" ng-if="errors && errors['contact.first_name']">
                                                            <span >
                                                                <% errors['contact.first_name'][0] %>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <div class="formElement_3 form-group fadeMe text clearfix col-sm-6 textfield paymentCount"
                                                         data-count="3"><label class="fitText block_label" for="form_input_3" tabindex="0" aria-label="Last Name"
                                                                               style="display: block;">Last Name</label>
                                                        <input class="form-control" aria-required="false" name="contact[last_name]" id="form_input_3" type="text" aria-placeholder=""
                                                               placeholder="">
                                                        <div class="invalid-feedback d-block error_" role="alert"  ng-if="errors && errors['contact.last_name']">
                                                            <span>
                                                                <% errors['contact.last_name'][0] %>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <div class="formElement_4 form-group fadeMe text clearfix col-sm-12 email paymentCount" data-count="4">
                                                        <label class="fitText block_label" tabindex="0" for="form_input_4" aria-label="Email" style="display: block;">Email*</label>
                                                        <input class="form-control required email_confirm" aria-required="true"
                                                               id="form_input_4" name="contact[email]" type="email" aria-placeholder="" placeholder="">
                                                        <div class="invalid-feedback d-block error_" role="alert" ng-if="errors && errors['contact.email']">
                                                            <span >
                                                                <% errors['contact.email'][0] %>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="formElement_8 form-group fadeMe text clearfix col-sm-12 textarea paymentCount"
                                                         data-count="8">
                                                        <label class="fitText block_label" tabindex="0" for="form_input_8" aria-label="Message"
                                                                               style="display: block;">Message*</label>
                                                        <textarea class="form-control required" id="form_input_8" name="contact[message]" data-max="250" aria-valuemax="250" data-limiting="false" style="height: 50px" aria-required="true" aria-placeholder="" placeholder=""></textarea>
                                                        <div class="invalid-feedback d-block error_" role="alert" ng-if="errors && errors['contact.message']">
                                                            <span >
                                                                <% errors['contact.message'][0] %>
                                                            </span>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="clearfix"></div>

                                                <div class="form_submit_div text-center">
                                                    <button type="button" ng-click="submit()" class="btn">Submit <span class="price"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <style>
                                        .remove-image{
                                            margin-left: 5px;
                                            border: none;
                                            background: none;
                                            font-size: 17px;
                                            vertical-align: middle;
                                        }
                                        .remove-file{
                                            margin-left: 5px;
                                            border: none;
                                            background: none;
                                            font-size: 17px;
                                            vertical-align: middle;
                                        }
                                        .remove-multi-image{
                                            margin-left: 5px;
                                            border: none;
                                            background: none;
                                            font-size: 17px;
                                            vertical-align: middle;
                                        }
                                        .remove-multi-file{
                                            margin-left: 5px;
                                            border: none;
                                            background: none;
                                            font-size: 17px;
                                            vertical-align: middle;
                                        }
                                        .remove-signature{
                                            margin-left: 5px;
                                            border: none;
                                            background: none;
                                            font-size: 17px;
                                            vertical-align: middle;
                                        }
                                        .remove-multi-text{
                                            color: #333333;
                                            font-size: 12px;
                                        }
                                        .single-text-width{
                                            display: inline-block;
                                            max-width: 35ch;
                                            overflow: hidden;
                                            white-space: nowrap;
                                            text-overflow: ellipsis;
                                            vertical-align: middle;
                                        }
                                        .multi-text-width{
                                            display: inline-block;
                                            max-width: 35ch;
                                            overflow: hidden;
                                            white-space: nowrap;
                                            text-overflow: ellipsis;
                                            vertical-align: middle;
                                        }
                                        .remove-multi-file:hover {
                                            color: black;
                                            transform: scale(1.5);
                                            margin-left: 5px;
                                        }
                                        .remove-multi-image:hover{
                                            color: black;
                                            transform: scale(1.5);
                                            margin-left: 5px;
                                        }
                                        .remove-file:hover{
                                            color: black;
                                            transform: scale(1.5);
                                            margin-left: 5px;
                                        }
                                        .remove-image:hover{
                                            color: black;
                                            transform: scale(1.5);
                                            margin-left: 5px;
                                        }
                                        .remove-signature:hover {
                                            color: black;
                                            transform: scale(1.5);
                                            margin-left: 5px;
                                        }

                                        /* ********************* Product Choice Element CSS Start ********************* */
                                        .clear-selection-link {
                                            background: none;
                                            border: none;
                                            padding: 0;
                                            margin: 0;
                                            font-family: inherit;
                                            font-size: inherit;
                                            color: blue;
                                            text-decoration: underline;
                                            cursor: pointer;
                                            float: right;
                                            font-size: 13px;
                                        }

                                        .clear-selection-container{
                                            margin-bottom: 28px;
                                        }

                                        .clear-selection-link:hover {
                                            text-decoration: none;
                                        }
                                        /* ********************* Product Choice Element CSS End ********************* */

                                        /* ********************* Image Choice Description CSS Start ********************* */
                                        .wrap-text {
                                            overflow-wrap: break-word;
                                            white-space: normal;
                                        }
                                        /* ********************* Image Choice Description CSS End ********************* */
                                    </style>
                                </div>
                            </form>
                        </div>
                        <div class="after_form_submit" style="display:none;">
                            <div class="form_generater_form_div text-center" tabindex="0"></div>
                        </div>


                        <style id="advance_css_text">
                            .sweet-alert[data-has-confirm-button=false][data-has-cancel-button=false] {
                                padding-bottom: 17px;
                            }
                            @media (max-width: 480px) {
                                body {
                                    font-size:16px;
                                }
                                input,select,textarea{
                                    font-size:100%
                                }
                            }
                        </style>


                        <script type="text/javascript">
                        </script>
                    </div>
                </div>
            </div>


        </section>

        <div id="shopify-section-template--18159281602653__16508169396cdfd180" class="shopify-section index-section">
            <div id="CollectionSection-template--18159281602653__16508169396cdfd180" data-section-id="template--18159281602653__16508169396cdfd180" data-section-type="collection-grid" data-context="featured-collection"><div class="page-width">
                    <div class="section-header section-header--with-link">
                        <h2 class="section-header__title">
                            {{ $category->name }}
                        </h2>
                        <a href="{{route('front.getProductListFeatured', $category->slug)}}" class="btn btn--secondary btn--small section-header__link">Xem tất cả</a>
                    </div>
                </div>
                <div class="page-width page-width--flush-small">
                    <div class="grid-overflow-wrapper">
                        <div class="grid grid--uniform aos-init aos-animate" data-aos="overflow__animation">

                            @foreach($productVariants as $variant)
                                @include('site.partials.product_card', ['variant' => $variant])
                            @endforeach



                            <div class="grid__item grid__item--view-all text-center small--one-half medium-up--one-quarter medium-up--hide">
                                <a href="{{route('front.getProductListFeatured', $category->slug)}}" class="grid-product__see-all">
                                    Xem tất cả<br>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div style="clear:both"></div></div>
            </div>
        </div>





    </main>
@endsection

@section('extends')
    <div id="VideoModal" class="modal modal--solid">
        <div class="modal__inner">
            <div class="modal__centered page-width text-center">
                <div class="modal__centered-content">
                    <div class="video-wrapper video-wrapper--modal">
                        <div id="VideoHolder"></div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="modal__close js-modal-close text-link">
            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
            <span class="icon__fallback-text">"Close (esc)"</span>
        </button>
    </div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <button class="btn btn--body btn--circle pswp__button pswp__button--arrow--left" title="Previous">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><path d="M249.49 0a35 35 0 0 1 24.75 59.75L84.49 249.49l189.75 189.74a35.002 35.002 0 1 1-49.5 49.5L10.25 274.24a35 35 0 0 1 0-49.5L224.74 10.25A34.89 34.89 0 0 1 249.49 0Z"/></svg>
                </button>

                <button class="btn btn--body btn--circle btn--large pswp__button pswp__button--close" title="Close (esc)">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg>
                </button>

                <button class="btn btn--body btn--circle pswp__button pswp__button--arrow--right" title="Next">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98"><title>icon-chevron</title><path d="M35 498.98a35 35 0 0 1-24.75-59.75l189.74-189.74L10.25 59.75a35.002 35.002 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L59.75 488.73A34.89 34.89 0 0 1 35 498.98Z"/></svg>
                </button>
            </div>
        </div>
    </div>
    <tool-tip data-tool-tip="">
        <div class="tool-tip__inner" data-tool-tip-inner>
            <button class="tool-tip__close" data-tool-tip-close=""><svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64"><title>icon-X</title><path d="m19 17.61 27.12 27.13m0-27.12L19 44.74"/></svg></button>
            <div data-tool-tip-title>Motion Square Neck Bra</div>
            <div class="tool-tip__content" data-tool-tip-content>
            </div>
        </div>
    </tool-tip>

    <template id="naturalImageMarkup">
        <div class="image-wrap" style="height: 0;">
            <image-element data-aos="image-fade-in" data-aos-offset="150">
                <img class="grid-product__image image-element" width height src srcset loading="lazy" alt>
            </image-element>
        </div>
    </template>
    <template id="fixedRatioImageMarkup">
        <div class="grid__image-ratio">
            <image-element data-aos="image-fade-in" data-aos-offset="150">
                <img class="image-element" width height src srcset loading="lazy" alt>
            </image-element>
        </div>
    </template>

    <script>
        (function(w,d,t,s,n,p,e,z){
            w['NaizFitSizeFormObject'] = n;
            a=d.createElement(t),
                m=d.getElementsByTagName(t)[0];
            a.async = 1;
            a.src = s;
            a.onload = function() {
                w[n] = new w.naizjs.SizeForm({ partnerKey: p, endpoint: e, mode: z})
            }
            m.parentNode.insertBefore(a, m)
        }) (window, document, 'script', 'https://backend.production.naiz.fit/bundle', 'nfsfo', 'e602a67a6d7d79e0e4e6075fc3d9d3af', 'https://backend.production.naiz.fit/api/partners');
    </script>

    <style>  </style>
    <div id="shopify-block-AR2FMSW9nNERWcU9kV__6174324309569838175" class="shopify-block shopify-app-block">


        <div class="smile-shopify-init"
             data-channel-key="channel_R2Pa8rhJdoQ83FJF02s72Zmd"

        ></div>


    </div><div id="shopify-block-AVFIySTFEaVpmWUFPS__144831480468751239" class="shopify-block shopify-app-block"><!-- BEGIN app snippet: vite-tag -->


        <script src="/site/js/app-embed-C2qg5SV6.js" type="module" crossorigin="anonymous"></script>
        <link rel="modulepreload" href="https://cdn.shopify.com/extensions/9c652dcc-fd78-477d-9e73-b38f552f64b9/essential-upsell-136/assets/stylex-K6Pfmy25.js" crossorigin="anonymous">
        <link href="/site/css/stylex-DFEZgduC.css" rel="stylesheet" type="text/css" media="all" />
        @endsection

        @push('scripts')
            <script>
                app.controller('contact', function ($rootScope, $scope, $sce, $interval, cartItemSync) {
                    $scope.errors = [];
                    $scope.submit = function () {
                        var url = "{{route('front.submitContact')}}";
                        var data = jQuery('#form-contact').serialize();
                        $scope.loading = true;
                        jQuery.ajax({
                            type: 'POST',
                            url: url,
                            headers: {
                                'X-CSRF-TOKEN':  "{{ csrf_token() }}"
                            },
                            data: data,
                            success: function (response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    jQuery('#form-contact')[0].reset();
                                    $scope.errors = [];
                                    $scope.$apply();
                                } else {
                                    $scope.errors = response.errors;
                                    toastr.error(response.message);
                                }
                            },
                            error: function () {
                                toastr.error('Đã có lỗi xảy ra');
                            },
                            complete: function () {
                                $scope.loading = false;
                                $scope.$apply();
                            }
                        });
                    }
                })
            </script>
    @endpush
