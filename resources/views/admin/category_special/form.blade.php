<div class="row">
    <div class="col-sm-12">
        <div class="row" >
            <div class="col-md-12 col-sm-12 col-xs-12">
{{--                <div class="form-group">--}}
{{--                    <div class="bordexr-checkbox-section" style="text-align: right">--}}
{{--                        <div class="border-checkbox-group border-checkbox-group-primary">--}}
{{--                            <input class="border-checkbox" type="checkbox" ng-checked="form.highlight == 1"--}}
{{--                                   id="highlight" ng-model="form.highlight" >--}}
{{--                            <label class="border-checkbox-label m-0" for="highlight">Hiển thị nổi bật</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
        </div>
    </div>
</div>
