<div class="modal fade" id="profile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Thông Tin Cá Nhân</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <div id="ImgDivpreview" class="form-group mb-3">

                                {{--  <img src="../assets/img/no-image/no-image-user.jpg" alt="Avatar"
                                    class="rounded-circle" height="100" />  --}}

                                {{--  <img src="../storage/accounts/{{ Auth::user()->id }}/avatar/{{ Auth::user()->avatar }}"
                                    alt="user-avatar" class="d-block rounded" style="width:200px;height:200px"
                                    id="Imgpreview">  --}}

                            </div>

                            <div class="button-wrapper">
                                {{--  <label for="avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Hình Ảnh</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="avatar" id="avatar" onchange="previewimg(this)"
                                        class="form-control account-file-input file-upload-default" hidden
                                        accept="image/*">

                                </label>  --}}
                                {{--  <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>  --}}
                                {{--  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>  --}}
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <img src="../storage/accounts/{{ Auth::user()->id }}/avatar/{{ Auth::user()->avatar }}"
                                alt="user-avatar" class="d-block rounded" style="width:200px;height:200px">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="email" class="form-label" style="font-size: 20px">
                                <strong>E-mail: </strong> <br>
                            </label>
                            <label for="email" class="form-label" style="font-size: 20px">
                                <strong>Họ Và Tên: </strong> <br>
                            </label>
                            <label for="email" class="form-label" style="font-size: 20px">
                                <strong>Ngày Sinh: </strong> <br>
                            </label>
                            <label for="email" class="form-label" style="font-size: 20px">
                                <strong>Số Điện Thoại: </strong> <br>
                            </label>
                            <label for="email" class="form-label" style="font-size: 20px">
                                <strong>Chức vụ: </strong> <br>
                            </label>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="email" class="form-label" style="font-size: 20px">
                                {{--  <strong>E-mail: </strong>  --}}
                                {{ Auth::user()->email }}
                            </label>
                            <label for="Name" class="form-label" style="font-size: 20px">
                                {{--  <strong>Họ Và Tên: </strong>  --}}
                                {{ Auth::user()->name }}
                            </label>
                            <label for="birthday" class="form-label" style="font-size: 20px">
                                {{--  <strong>Ngày Sinh: </strong>  --}}
                                @if (Auth::user()->dateOfBirth == null)
                                    2022-01-01
                                @else
                                    {{ Auth::user()->dateOfBirth }}
                                @endif
                            </label>
                            <label class="form-label" for="phoneNumber" style="font-size: 20px">
                                {{--  <strong>Số Điện Thoại: </strong>  --}}
                                {{ Auth::user()->phone_number }}
                            </label>
                            <br>
                            <label class="form-label" for="checkrole" style="font-size: 20px">
                                {{--  <strong> Chức vụ: </strong>  --}}
                                {{ Auth::user()->isAdmin ? 'Admin' : 'Manager' }}
                            </label>
                        </div>

                    </div>
                </form>
            </div>
            {{--  <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Hủy
                </button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>  --}}
        </div>
    </div>
</div>
