<!-- CSS dùng lại và bổ sung -->
<style>
    .card {
        border-radius: .5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        margin-bottom: 1.5rem;
    }
    .card-header {
        background-color: #f7f7f7;
        font-weight: 600;
    }

    .required-label::after {
        content: " *";
        color: #d00;
    }

    .size-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        grid-gap: 1rem;
    }

    .color-preview {
        width: 40px; height: 40px;
        border: 1px solid #ccc;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .gallery-area {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
    }
    .gallery-item {
        position: relative;
        width: calc(33.333% - .5rem);
        min-height: 100px;
        padding: .5rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-align: center;
        background: #fff;
    }
    .gallery-item img {
        max-width: 100%;
        max-height: 100px;
        object-fit: cover;
    }
    .gallery-item .remove {
        position: absolute;
        top: .25rem; right: .25rem;
        border: none;
        background: rgba(255,0,0,0.8);
        color: #fff;
        padding: .2rem .4rem;
        border-radius: 2px;
        cursor: pointer;
    }
    .gallery-add {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px dashed #bbb;
        border-radius: 4px;
        cursor: pointer;
        width: calc(33.333% - .5rem);
        height: 100px;
    }
</style>

<form ng-submit="submit()">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Thông tin biến thể</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label required-label">Danh mục sản phẩm</label>
                        <select class="form-control" select2 ng-model="form.product_id"
                                ng-change="getProductDetail(form.product_id)" required disabled>
                            <option value="">Chọn sản phẩm</option>
                            <option ng-repeat="p in form.all_products" ng-value="p.id" ng-selected="form.product_id == p.id">
                                <% p.name %>
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <p><strong>Sản phẩm:</strong> <% product.name %></p>
                        <p><strong>Danh mục:</strong> <% product.category.name %></p>
                        <p><strong>Giá:</strong> <% product.price | number %></p>
                    </div>

                    <div class="form-group">
                        <label class="form-label required-label">Chọn màu sắc</label>
                        <select class="form-control" ng-model="form.selectedColor"
                                ng-change="changeColor()"
                                ng-options="color as (color.name + ' (' + color.hex_code + ')') for color in form.colors track by color.hex_code"
                                required>
                            <option value="">-- Chọn màu --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Xem trước màu</label>
                        <div class="color-preview" ng-style="{'background-color': form.selectedColor.hex_code}"></div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Số lượng theo kích cỡ</label>
                        <div class="size-grid">
                            <div ng-repeat="size in product.sizes">
                                <label class="d-block mb-1"><strong><% size.name %></strong></label>
                                <input type="number" min="0" class="form-control"
                                       placeholder="Nhập số lượng"
                                       ng-model="form.sizeQuantities[size.id]">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Biến thể mặc định</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   id="isDefaultSwitch"
                                   ng-model="form.is_default">
                            <label class="custom-control-label" for="isDefaultSwitch">
                                Đặt làm biến thể mặc định
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">Ảnh đại diện</div>
                <div class="card-body text-center">
                    <img class="img-fluid mb-2"
                         ng-src="<% form.image.path %>"
                         style="max-height: 150px; border:1px solid #ddd; border-radius:4px;">
                    <div class="mt-2">
                        <label class="btn btn-outline-primary mb-0">
                            <i class="fa fa-upload"></i> Chọn ảnh
                            <input type="file" accept=".jpg,.png,.jpeg" class="d-none"
                                   id="<% form.image.element_id %>">
                        </label>
                    </div>
                    <div class="text-danger mt-1" ng-if="errors.image">
                        <% errors.image[0] %>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-center">Thư viện ảnh</div>
                <div class="card-body">
                    <div class="gallery-area">
                        <div class="gallery-item" ng-repeat="g in form.galleries">
                            <button type="button" class="remove" ng-click="form.removeGallery($index)">
                                &times;
                            </button>
                            <label class="d-block cursor-pointer">
                                <img ng-src="<% g.image.path %>">
                                <input type="file" accept=".jpg,.png,.jpeg" class="d-none"
                                       id="<% g.image.element_id %>">
                            </label>
                        </div>
                        <label class="gallery-add" for="gallery-chooser">
                            <i class="fa fa-plus fa-2x text-secondary"></i>
                        </label>
                        <input type="file" accept=".jpg,.png,.jpeg" id="gallery-chooser"
                               class="d-none" multiple>
                    </div>
                    <div class="text-danger mt-1" ng-if="errors.galleries">
                        <% errors.galleries[0] %>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-right">
        <button type="submit" class="btn btn-success" ng-disabled="loading.submit">
            <i ng-if="!loading.submit" class="fa fa-save"></i>
            <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
            Lưu
        </button>

        <a href="{{ route('product_variants.index') }}?product-id=<% form.product_id %>" class="btn btn-danger">
            <i class="fa fa-times"></i> Hủy
        </a>
    </div>
</form>
