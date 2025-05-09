<?php

Route::group(['namespace' => 'Front'], function () {
    Route::get('/','FrontController@homePage')->name('front.home-page');

    // giỏ hàng
    Route::get('/gio-hang.html','CartController@index')->name('cart.index');
    Route::post('/products/{productId}/variant-sizes/{variantSizeId}/add-product-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-product-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::post('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::get('/payment.html','CartController@checkout')->name('cart.checkout');
    Route::post('/checkout','CartController@checkoutSubmit')->name('cart.submit.order');
    Route::get('/contact.html','FrontController@contact')->name('front.contact');
    Route::get('/order-completed.html','CartController@checkoutSuccess')->name('cart.checkout.success');

    Route::get('/search.html','FrontController@search')->name('front.search');
    Route::get('/support.html','FrontController@support')->name('front.support');
    Route::get('/about.html','FrontController@about')->name('front.about-us');
    Route::get('/privacy-policy.html','FrontController@privacy')->name('front.privacy-policy');
    Route::get('/shipping-policy.html','FrontController@shipping')->name('front.shipping-policy');
    Route::get('/refund-policy.html','FrontController@refund')->name('front.refund-policy');
    Route::get('/terms-conditions.html','FrontController@term')->name('front.terms-conditions');
    Route::get('/track-my-order.html','FrontController@trackOrder')->name('front.track-my-order');
    Route::post('/getTracking','FrontController@getTracking')->name('front.getTracking');
    Route::get('/faqs.html','FrontController@faqs')->name('front.faqs');
    Route::get('/faqs/{id}.html','FrontController@getFaq')->name('front.getFaq');
    Route::post('/send-support.html','FrontController@submitSupport')->name('front.submitSupport');
    Route::post('/send-rating.html','FrontController@submitRating')->name('front.submitRating');
    Route::get('/contact.html','FrontController@contact')->name('front.contact');
    Route::post('/send-contact.html','FrontController@submitContact')->name('front.submitContact');
    Route::get('/collections.html','FrontController@collections')->name('front.collections');
    Route::get('/collections/{slug}.html','FrontController@getCollectionList')->name('front.get-collection-list');
    Route::get('/{categorySlug}','FrontController@getProductList')->name('front.show-product-list');
    Route::get('/collections/{categorySlug}/','FrontController@getProductListCollection')->name('front.getProductListCollection');
    Route::get('/featured/{categorySlug}/','FrontController@getProductListFeatured')->name('front.getProductListFeatured');
    Route::post('/products/search','FrontController@searchProducts')->name('front.ajax-search-products');
    Route::get('/products/{slug}','FrontController@getProductDetail')->name('front.show-product-detail');
    // Route::get('/load-product-home-page','FrontController@loadProductHomePage')->name('front.load-product-home-page');
    Route::get('/category/{categorySlug}.html','FrontController@showProductCategory')->name('front.show-product-category');
    Route::get('/load-more/product','FrontController@loadMoreProduct')->name('front.product-load-more');
    Route::get('/get-product-quick-view','FrontController@getProductQuickView')->name('front.get-product-quick-view');
    Route::get('/tao-thiet-ke.html','FrontController@productCustom')->name('front.product-custom');



    // đặt hàng thiết kế
    Route::post('/design-order','FrontController@designOrder')->name('front.design_order');

    // Liên hệ
    Route::get('/lien-he.html','FrontController@contactUs')->name('front.contact-us');
    Route::post('/lien-he','FrontController@postContact')->name('front.post-contact');

    // Blogs
    Route::get('/tin-tuc.html','FrontController@indexBlog')->name('front.index-blog');
    Route::get('/tin-tuc/{slug}.html','FrontController@listBlog')->name('front.list-blog');
    Route::get('/chi-tiet-tin-tuc/{slug}.html','FrontController@detailBlog')->name('front.detail-blog');

    // Tìm kiếm
    Route::post('/auto-search-complete','FrontController@autoSearchComplete')->name('front.auto-search-complete');
    Route::get('/search-product','FrontController@searchProduct')->name('front.search-product');

    // reset data
    Route::get('/reset-data','FrontController@resetData')->name('front.resetData');

    // laster buy products
    Route::get('/laster-buy-products','FrontController@lasterBuyProducts')->name('front.laster-buy-products');

    // review
    Route::post('/review/submit','FrontController@submitReview')->name('front.submit-review');
    Route::get('/review/getMoreReview/{productId}','FrontController@getMoreReview')->name('front.getMoreReview');

});

Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
    Route::post('/paypal/create-order', 'PayPalController@createOrder');
    Route::post('/paypal/capture-order', 'PayPalController@captureOrder');
});



