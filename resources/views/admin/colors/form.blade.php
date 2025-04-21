<style>

</style>
<div class="row">
    <div class="col-md-2">

    </div>
    <div class="col-sm-8">
        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Mã màu sắc</label>
            <input class="form-control " type="text" ng-model="form.code">
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.code[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label required-label">Tên màu sắc</label>
            <input class="form-control " type="text" ng-model="form.name">
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.name[0] %>
                </strong>
            </span>
        </div>

        <div class="form-group custom-group mb-4">
            <label class="form-label required-label" for="hex_code">Chọn màu:</label>
            <input type="color" id="hex_code" name="hex_code" ng-model="form.hex_code" style="min-width: 200px" required>
            <input type="text" id="hex_code_text" name="hex_code_text" ng-model="form.hex_code"
                   pattern="^#([A-Fa-f0-9]{6})$"  disabled required>
            <div id="colorPreview" title="Xem trước màu"
                 style="width: 50px; height: 50px; border: 1px solid #ccc; display: inline-block; vertical-align: middle; margin-left: 10px;"
                 ng-style="{'background-color': form.hex_code}">
            </div>
            <span class="invalid-feedback d-block" role="alert">
                <strong>
                    <% errors.hex_code[0] %>
                </strong>
            </span>
        </div>

    </div>
    <div class="col-md-2">

    </div>
</div>
<hr>
<div class="text-right">
    <button type="submit" class="btn btn-success btn-cons" ng-click="submit()" ng-disabled="loading.submit">
        <i ng-if="!loading.submit" class="fa fa-save"></i>
        <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
        Lưu
    </button>
    <a href="{{ route('colors.index') }}" class="btn btn-danger btn-cons">
        <i class="fa fa-remove"></i> Hủy
    </a>
</div>
