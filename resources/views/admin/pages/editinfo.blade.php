@extends('admin.layout')
@section('title', 'Trắc Nghiệm - Admin | Cài đặt tài khoản')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Sửa Thông Tin Cá Nhân</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100"
                            width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Đổi ảnh</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Xóa</span>
                            </button>
                            <p class="text-muted mb-0">Cho phép JPG, GIF hoặc PNG. Kích thước lớn nhất là 800K</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email" value=""
                                    readonly placeholder="scaredtin@gmail.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input class="form-control" type="password" id="password" name="password" value=""
                                    placeholder="********" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Name" class="form-label">Họ Và Tên</label>
                                <input class="form-control" type="text" id="Name" name="Name" value=""
                                    placeholder="Dương Nghĩa Hiệp" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="birthday" class="form-label">Ngày Sinh</label>
                                <input class="form-control" type="date" id="birthday" name="birthday" value="2001-01-01"
                                    autofocus />
                            </div>
                            {{-- isAdmin = true --}}
                            {{-- Status = true --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Số Điện Thoại</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">VN (+84)</span>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="833 081 291" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"></div>
                            <div class="col"></div>
                            <div class="col mt-2">
                                <button type="submit" class="btn btn-primary me-2">Lưu</button>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                            {{--  <button type="reset" class="btn btn-outline-secondary">Hủy</button>  --}}
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

        </div>
    </div>
@stop
