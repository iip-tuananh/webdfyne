<style>
    .gallery-item {
        padding: 5px;
        padding-bottom: 0;
        border-radius: 2px;
        border: 1px solid #bbb;
        min-height: 100px;
        height: 100%;
        position: relative;
    }

    .gallery-item .remove {
        position: absolute;
        top: 5px;
        right: 5px;
    }

    .gallery-item .drag-handle {
        position: absolute;
        top: 5px;
        left: 5px;
        cursor: move;
    }

    .gallery-item:hover {
        background-color: #eee;
    }

    .gallery-item .image-chooser img {
        max-height: 150px;
    }

    .gallery-item .image-chooser:hover {
        border: 1px dashed green;
    }

    .gallery-area {
    }
</style>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-12">
    </div>
	<div class="col-md-8 col-sm-8 col-xs-12">
        <div class="form-group custom-group mb-4">
            <label class="form-label">Tiêu đề</label>
            <input class="form-control " type="text" ng-model="form.title">
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.title[0] %></strong>
            </span>
        </div>
        <div class="form-group custom-group mb-4">
            <label class="form-label">Nội dung</label>
            <textarea class="form-control" ck-editor rows="5" ng-model="form.body"></textarea>
            <span class="invalid-feedback d-block" role="alert">
                <strong><% errors.body[0] %></strong>
            </span>
        </div>
	</div>
    <div class="col-md-2 col-sm-2 col-xs-12">
    </div>
</div>

<hr>
<div class="text-right">
	<button type="submit" class="btn btn-success btn-cons" ng-click="submit(0)" ng-disabled="loading.submit">
		<i ng-if="!loading.submit" class="fa fa-save"></i>
		<i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
		Lưu
	</button>
</div>
