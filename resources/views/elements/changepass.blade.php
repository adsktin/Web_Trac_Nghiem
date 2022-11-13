<div class="modal fade" id="changepass" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Đổi Mật Khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAccountChangepass" method="POST" onsubmit="return false">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="Changepass" class="form-label" style="font-size: 15px">
                                Mật khẩu cũ</label>
                            <input class="form-control" type="text" id="oldChangepass" name="Changepass"
                                value="" placeholder="Nhập mật khẩu cũ" autofocus />
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="Changepass" class="form-label" style="font-size: 15px">
                                Mật khẩu mới</label>
                            <input class="form-control" type="text" id="newChangepass" name="Changepass"
                                value="" placeholder="Nhập mật khẩu mới" autofocus />
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="Changepass" class="form-label" style="font-size: 15px">
                                Xác nhận</label>
                            <input class="form-control" type="text" id="confirmChangepass" name="Changepass"
                                value="" placeholder="Xác nhận mật khẩu mới" autofocus />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">
                    Hủy
                </button>
            </div>
        </div>
    </div>
</div>
