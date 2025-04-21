@extends('site.layouts.master')
@section('title')

@endsection
@section('css')
    <style>
        .invalid-feedback {
            font-size: 14.5px;
            color: #dc3545;
        }
    </style>
@endsection
@section('content')
    <div ng-controller="support">
        <section id="shopify-section-template--17549462569118__contact_nDpjJ8" class="shopify-section shopify-section--contact"><style>
                #shopify-section-template--17549462569118__contact_nDpjJ8 {
                    --section-background-hash: 0;
                }

                #shopify-section-template--17549462569118__contact_nDpjJ8 + * {
                    --previous-section-background-hash: 0;
                }</style><style>
                #shopify-section-template--17549462569118__contact_nDpjJ8 {
                    --section-stack-intro: 41.6667%;
                    --section-stack-main: 58.3334%;
                }
            </style>

            <div class="section   section-blends section-full"><div class="section-stack section-stack--horizontal "><div class="section-stack__intro">
                        <div class="prose "><p class="subheading">Contact Us</p><h2 class="h2">Do you have any question?</h2></div>
                    </div><div class="section-stack__main">
                        <div class="contact-form rounded bg-secondary">
                            <form
                                  id="form-contact" accept-charset="UTF-8"
                                  class="form" data-cptcha="true" data-hcaptcha-bound="true">
                                <input type="hidden" name="form_type" value="contact">
                                <input type="hidden" name="utf8" value="✓"><div class="fieldset"><div class="input-row">
                                        <div class="form-control">
                                            <input id="input-template--17549462569118__contact_nDpjJ8--contactname" class="input is-floating"
                                                   type="text" name="contact[name]" placeholder=" "  autocomplete="name" required="">
                                            <label for="input-template--17549462569118__contact_nDpjJ8--contactname" class="floating-label">Name</label>

                                            <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors['contact.name']">
                                                        <% errors['contact.name'][0] %>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="form-control">
                                            <input id="input-template--17549462569118__contact_nDpjJ8--contactemail" class="input is-floating"
                                                                         type="email" dir="ltr" name="contact[email]" placeholder=" "  autocomplete="email" required="">

                                            <label for="input-template--17549462569118__contact_nDpjJ8--contactemail" class="floating-label">E-mail</label>
                                            <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors['contact.email']">
                                                        <% errors['contact.email'][0] %>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <textarea id="input-template--17549462569118__contact_nDpjJ8--contactbody" class="textarea is-floating" is="resizable-textarea"
                                                  name="contact[body]" placeholder=" " rows="4" required=""></textarea>
                                        <label for="input-template--17549462569118__contact_nDpjJ8--contactbody" class="floating-label">Message</label>
                                        <div class="invalid-feedback d-block error" role="alert">
                                                    <span ng-if="errors && errors['contact.body']">
                                                        <% errors['contact.body'][0] %>
                                                    </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-self-start">
                                    <button type="button" class="button button--xl" is="custom-button" ng-click="submit()"><div>Send message</div><span class="button__loader">
        <span></span>
        <span></span>
        <span></span>
      </span></button></div><div class="h-captcha" data-sitekey="f06e6c50-85a8-45c8-87d0-21a2b65856fe" data-size="invisible"><iframe aria-hidden="true" data-hcaptcha-widget-id="0p2d0mw3pz7" data-hcaptcha-response="" src="https://newassets.hcaptcha.com/captcha/v1/686f2a4aa9ab43028e539b4d59475a87e9bd0d11/static/hcaptcha.html#frame=checkbox-invisible" style="display: none;"></iframe><textarea id="h-captcha-response-0p2d0mw3pz7" name="h-captcha-response" style="display: none;"></textarea></div></form></div>
                    </div>
                </div>
            </div>


        </section>
    </div>

@endsection

@push('scripts')
    <script>
        app.controller('support', function ($rootScope, $scope, $sce, $interval, cartItemSync) {
            $scope.errors = [];
            $scope.submit = function () {
                var url = "{{route('front.submitSupport')}}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    success: function(response) {
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
                    error: function() {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })

    </script>
@endpush
