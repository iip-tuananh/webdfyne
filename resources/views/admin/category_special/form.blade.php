<div class="row">
    <div class="col-sm-12">
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="bordexr-checkbox-section" style="text-align: right">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                            <input class="border-checkbox" type="checkbox" ng-checked="form.highlight == 1"
                                   id="highlight" ng-model="form.highlight" >
                            <label class="border-checkbox-label m-0" for="highlight">Dùng làm banner</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Tên danh mục</label>
                    <input class="form-control " type="text" ng-model="form.name">
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.name[0] %></strong>
                    </span>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Áp dụng cho danh mục</label>
                    <select id="my-select" class="form-control custom-select" ng-model="form.category_parent_id">
                        <option value="">Chọn danh mục</option>
                        <option ng-repeat="cate in categoriesParent" ng-value="cate.id" ng-selected="cate.id == form.category_parent_id"><% cate.name %></option>

                    </select>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.category_parent_id[0] %></strong>
                    </span>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group custom-group">
                    <label class="form-label required-label">Hiển thị ngoài trang chủ</label>
                    <select id="my-select" class="form-control custom-select" ng-model="form.show_home_page">
                        <option ng-repeat="s in show_home_page" ng-value="s.value" ng-selected="form.show_home_page == s.value"><% s.name %></option>

                    </select>
                    <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.show_home_page[0] %></strong>
                    </span>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <label class="form-label">Ảnh</label>
                <div class="main-img-preview">
                    <p class="help-block-img">* Ảnh định dạng: jpg, png không quá 2MB.</p>
                    <img class="thumbnail img-preview" ng-src="<% form.image.path %>">
                </div>
                <div class="input-group" style="width: 100%; text-align: center">
                    <div class="input-group-btn" style="margin: 0 auto">
                        <div class="fileUpload fake-shadow cursor-pointer">
                            <label class="mb-0" for="<% form.image.element_id %>">
                                <i class="glyphicon glyphicon-upload"></i> Chọn ảnh
                            </label>
                            <input class="d-none" id="<% form.image.element_id %>" type="file" class="attachment_upload" accept=".jpg,.jpeg,.png,.gif">
                        </div>
                    </div>
                </div>
                <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.image[0] %></strong>
                 </span>
            </div>

        </div>
    </div>
</div>
