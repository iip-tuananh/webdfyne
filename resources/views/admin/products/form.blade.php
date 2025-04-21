<style>
    /* CHUNG CHO CÁC CARD */
    .card {
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: box-shadow 0.2s ease;
    }
    .card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .card-header {
        background: #f8f9fa;
        border-bottom: none;
        padding: 0.75rem 1rem;
    }
    .card-header h5 {
        margin: 0;
        font-weight: 600;
    }

    /* NÚT CHỌN FILE */
    .btn-outline-secondary {
        border-radius: 20px;
        padding: 0.35rem 0.8rem;
        font-size: 0.9rem;
    }
    .btn-outline-secondary:hover {
        background: #e2e6ea;
    }

    /* GALLERY AREA */
    .gallery-area .border {
        width: 80px;
        height: 80px;
        overflow: hidden;
    }
    .gallery-area img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* NÚT LƯU/HỦY CỐ ĐỊNH */
    .form-actions {
        position: sticky;
        bottom: 0;
        background: #fff;
    }

    .required-label::after {
        content: ' *';
        color: #e74c3c;        /* đỏ bắt mắt */
        margin-left: 2px;
        font-weight: bold;
    }

    /* Đặt rộng 100% cho ui-select */
    .ui-select-container {
        width: 100%;
    }
    /* Tùy chỉnh ô đang đóng gói các tag đã chọn */
    .ui-select-multiple .ui-select-match-item {
        background-color: #f1f3f5;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.25rem 0.5rem;
        margin-right: 0.25rem;
    }
    /* Tùy chỉnh khung dropdown khi chưa chọn gì */
    .ui-select-toggle {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        min-height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
    }
    /* Khi focus thì viền xanh nhẹ */
    .ui-select-toggle:focus {
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        border-color: #80bdff;
    }
    /* Hoá “dấu x” gỡ tag nhìn nhẹ nhàng hơn */
    .ui-select-multiple .ui-select-match-close {
        color: #6c757d;
        margin-left: 0.25rem;
    }
</style>
<form name="productForm" novalidate ng-submit="submit()">

    <div class="row">
        <!-- ========= 1. THÔNG TIN CHUNG ========= -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">1. Thông tin chung</h5>
                </div>
                <div class="card-body">
                    <!-- Danh mục -->
                    <div class="form-group mb-3">
                        <label class="form-label required-label">Danh mục sản phẩm</label>
                        <ui-select remove-selected="true" ng-model="form.cate_id" theme="select2" ng-change="changeCategory(form.cate_id)">
                            <ui-select-match placeholder="Chọn danh mục"><% $select.selected.name %></ui-select-match>
                            <ui-select-choices repeat="t.id as t in (form.all_categories | filter: $select.search)">
                                <span ng-bind="t.name"></span>
                            </ui-select-choices>
                        </ui-select>
                        <small class="text-danger" ng-if="errors.cate_id"><% errors.cate_id[0] %></small>
                    </div>
                    <!-- Tên -->
                    <div class="form-group mb-3">
                        <label class="form-label required-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" ng-model="form.name">
                        <small class="text-danger" ng-if="errors.name"><% errors.name[0] %></small>
                    </div>
                    <!-- Mô tả -->
                    <div class="form-group mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control ck-editor" ck-editor rows="4" ng-model="form.body"></textarea>
                        <small class="text-danger" ng-if="errors.body"><% errors.body[0] %></small>
                    </div>
                </div>
            </div>

            <!-- ========= 2. CHI TIẾT SẢN PHẨM ========= -->

            <div class="card mb-4">
                <!-- Phần header chính -->
                <div class="card-header">
                    <h5 class="mb-0">2. Chi tiết sản phẩm</h5>
                </div>

                <div class="card-body">
                    <!-- Phần nav-tabs -->
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs card-header-tabs" id="productDetailTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active"
                                   id="features-tab"
                                   data-toggle="tab"
                                   href="#features"
                                   role="tab"
                                   aria-controls="features"
                                   aria-selected="true">
                                    Điểm nổi bật
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   id="sizes-tab"
                                   data-toggle="tab"
                                   href="#sizes"
                                   role="tab"
                                   aria-controls="sizes"
                                   aria-selected="false">
                                    Thông tin sizes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   id="delivery-tab"
                                   data-toggle="tab"
                                   href="#delivery"
                                   role="tab"
                                   aria-controls="delivery"
                                   aria-selected="false">
                                    Chính sách vận chuyển
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Phần nội dung tab -->
                    <div class="card-body tab-content" id="productDetailTabContent">
                        <!-- Tab 1: Điểm nổi bật -->
                        <div class="tab-pane fade show active"
                             id="features"
                             role="tabpanel"
                             aria-labelledby="features-tab">
                            <div class="form-group mb-3">
                                <label class="form-label required-label">Điểm nổi bật</label>
                                <textarea class="form-control ck-editor"
                                          ck-editor
                                          rows="3"
                                          ng-model="form.features"></textarea>
                                <small class="text-danger" ng-if="errors.features">
                                    <% errors.features[0] %>
                                </small>
                            </div>
                        </div>

                        <!-- Tab 2: Thông tin sizes -->
                        <div class="tab-pane fade"
                             id="sizes"
                             role="tabpanel"
                             aria-labelledby="sizes-tab">
                            <div class="form-group mb-3">
                                <label class="form-label required-label">Thông tin sizes</label>
                                <textarea class="form-control ck-editor"
                                          ck-editor
                                          rows="3"
                                          ng-model="form.model_sizes"></textarea>
                                <small class="text-danger" ng-if="errors.model_sizes">
                                    <% errors.model_sizes[0] %>
                                </small>
                            </div>
                        </div>

                        <!-- Tab 3: Chính sách vận chuyển -->
                        <div class="tab-pane fade"
                             id="delivery"
                             role="tabpanel"
                             aria-labelledby="delivery-tab">
                            <div class="form-group mb-3">
                                <label class="form-label">Chính sách vận chuyển</label>
                                <textarea class="form-control ck-editor"
                                          ck-editor
                                          rows="3"
                                          ng-model="form.delivery_note"></textarea>
                                <small class="text-danger" ng-if="errors.delivery_note">
                                    <% errors.delivery_note[0] %>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- ========= 3. GIÁ & BỘ LỌC ========= -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">3. Giá bán & Bộ lọc sản phẩm</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label class="form-label required-label">Giá trước giảm</label>
                        <input class="form-control " type="text" ng-model="form.base_price">
                        <small class="text-danger" ng-if="errors.base_price"><% errors.base_price[0] %></small>
                    </div>

                    <!-- Giá bán -->
                    <div class="form-group mb-3">
                        <label class="form-label required-label">Giá bán (VNĐ)</label>
                        <input class="form-control" type="text" ng-model="form.price">
                    </div>

                    <!-- Chọn loại size -->
                    <div class="form-group mb-3">
                        <label class="form-label required-label">Chọn loại size</label>
                        <ui-select multiple
                                   remove-selected="false"
                                   ng-model="form.size_ids"
                                   theme="select2"
                                   style="width:100%">
                            <ui-select-match placeholder="Chọn size...">
                                <% $item.name %>
                            </ui-select-match>
                            <ui-select-choices repeat="item.id as item in (form.all_sizes | filter: $select.search)">
                                <span ng-bind="item.name"></span>
                            </ui-select-choices>
                        </ui-select>
                        <small class="text-danger" ng-if="errors.size_ids"><% errors.size_ids[0] %></small>
                    </div>

                    <!-- Chọn bộ sưu tập -->
                    <div class="form-group mb-3">
                        <label class="form-label">Chọn bộ sưu tập</label>
                        <ui-select multiple
                                   remove-selected="false"
                                   ng-model="form.collections_ids"
                                   theme="select2"
                                   style="width:100%">
                            <ui-select-match placeholder="Chọn bộ sưu tập...">
                                <% $item.name %>
                            </ui-select-match>
                            <ui-select-choices repeat="collect.id as collect in (collections | filter: $select.search)">
                                <span ng-bind="collect.name"></span>
                            </ui-select-choices>
                        </ui-select>
                        <small class="text-danger" ng-if="errors.collections_ids"><% errors.collections_ids[0] %></small>
                    </div>

                    <!-- Chọn danh mục đặc biệt -->
                    <div class="form-group mb-3">
                        <label class="form-label">Chọn danh mục đặc biệt</label>
                        <ui-select multiple
                                   remove-selected="false"
                                   ng-model="form.categories_special_ids"
                                   theme="select2"
                                   style="width:100%">
                            <ui-select-match placeholder="Chọn danh mục đặc biệt...">
                                <% $item.name %>
                            </ui-select-match>
                            <ui-select-choices repeat="cate.id as cate in (cateSpecials | filter: $select.search)">
                                <span ng-bind="cate.name"></span>
                            </ui-select-choices>
                        </ui-select>
                        <small class="text-danger" ng-if="errors.categories_special_ids"><% errors.categories_special_ids[0] %></small>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Nút Lưu / Hủy cố định đáy -->
    <div class="form-actions text-end py-3 border-top bg-light text-right">
        <button type="submit" class="btn btn-success" ng-disabled="loading.submit">
            <i ng-if="!loading.submit" class="fa fa-save"></i>
            <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
            Lưu
        </button>

        <a href="{{ route('Product.index') }}" class="btn btn-danger">
            <i class="fa fa-times"></i> Hủy
        </a>
    </div>

</form>
