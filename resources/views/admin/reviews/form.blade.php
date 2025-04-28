<div class="card mb-4 border-0 shadow-sm">
    <div class="card-body">

        <!-- Thông tin cơ bản -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="userName" class="form-label">Người gửi</label>
                <input type="text" readonly class="form-control-plaintext" id="userName" value="<% form.user_name %>">
            </div>
            <div class="col-md-6">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" readonly class="form-control-plaintext" id="userEmail" value="<% form.user_email %>">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="createdAt" class="form-label">Ngày gửi</label>
                <input type="text" readonly class="form-control-plaintext" id="createdAt" value="<% form.create_at %>">
            </div>
            <div class="col-md-6">
                <label for="approvedBy" class="form-label">Người duyệt</label>
                <input type="text" readonly class="form-control-plaintext" id="approvedBy"
                       value="<% form.approved ? form.approved.name : '' %> – <% form.approve_date || '' %>">
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">
                    <i class="fas fa-star me-1"></i>Đánh giá
                </label>
                <div class="form-control-plaintext">
                  <span ng-repeat="n in [1,2,3,4,5]" class="me-1">
                    <i ng-if="n <= form.rating" class="fas fa-star text-warning"></i>
                    <i ng-if="n > form.rating" class="far fa-star text-muted"></i>
                  </span>
                </div>
            </div>
        </div>
        <!-- Nội dung -->
        <div class="mb-4">
            <label for="content" class="form-label">Nội dung</label>
            <textarea class="form-control" id="content" rows="5" readonly><% form.content %></textarea>
        </div>

        <style>
            /* CSS */
            .form-select {
                border-radius: 0.75rem;       /* bo viền mềm mại */
                border: 1px solid #ced4da;    /* viền nhạt */
                background-color: #fbfcfd;    /* nền sáng hơn */
                transition: border-color .2s, box-shadow .2s;
            }
            .form-select:focus {
                border-color: #86b7fe;
                box-shadow: 0 0 .25rem rgba(13,110,253,.25);
                outline: none;
            }
        </style>
        <!-- Đổi trạng thái -->
        <div class="form-floating mb-3">
            <label for="status">Đổi trạng thái</label> &nbsp;

            <select
                class="form-select shadow-sm px-3 py-2"
                id="status"
                ng-model="form.status"
                ng-selected="form.status == s.id"
                aria-label="Đổi trạng thái">
                <option value="" disabled selected>Chọn trạng thái</option>
                <option
                    ng-repeat="s in statues"
                    ng-value="s.id"
                    ng-class="{
        'text-warning': s.id === 1,
        'text-success': s.id === 2,
        'text-danger' : s.id === 3
      }">
                    <% s.name %>
                </option>
            </select>
        </div>

    </div>
</div>
