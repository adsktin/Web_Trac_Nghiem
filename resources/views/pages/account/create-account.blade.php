@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Thêm Tài Khoản')
@section('content')
    <!-- Content -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <script>
        var loadFile = function(event) {
            var crAvatar = document.getElementById('Imgpreviewcreate');
            crAvatar.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('show-account') }}"><i class="bx bx-arrow-back me-1"></i>Quay
                        lại</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Thêm Tài Khoản Mới</h5>
                <!-- Account -->
                <hr class="my-0">
                <div class="card-body">
                    <form id="formCreateNews" action="{{ route('create-account') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <div id="ImgDivpreview" class="form-group">
                                    <img src="../assets/img/no-image/no-image-user.jpg" alt="Avatar" id="Imgpreview"
                                        class="rounded-circle" height="100" width="100" />
                                </div>

                                <div class="button-wrapper">
                                    <label for="avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload Hình Ảnh</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" name="avatar" id="avatar" onchange="previewimg(this)"
                                            class="form-control account-file-input file-upload-default" hidden
                                            accept="image/*">
                                    </label>

                                    {{--  <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>  --}}
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="add-email" name="email"
                                    placeholder="Nhập email" />
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="Name" class="form-label">Họ Và Tên</label>
                                <input class="form-control" type="text" id="add-name" name="name"
                                    placeholder="Nhập họ và tên" autofocus />
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Nhập mật khẩu</label>
                                <input class="form-control" type="password" id="add-password" name="password" autocomplete
                                    placeholder="Nhập mật khẩu" />
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Xác nhận mật khẩu</label>
                                <input class="form-control" type="password" id="add-confirm_password"
                                    name="confirm_password" autocomplete placeholder="Nhập lại mật khẩu" />
                                @if ($errors->has('confirm_password'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('confirm_password') }}
                                    </div>
                                @endif
                            </div>
                            {{--  <div class="mb-3 col-md-6">
                                    <label for="birthday" class="form-label">Ngày Sinh</label>
                                    <input class="form-control" type="date" id="add-birthday" name="birthday"
                                        autofocus />
                                </div>  --}}
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Số Điện Thoại</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">VN (+84)</span>
                                    <input type="text" id="add-phone_number" name="phone_number" class="form-control"
                                        placeholder="833 081 291" />
                                </div>
                                @if ($errors->has('phone_number'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="checkrole">Chức vụ</label>
                                <div class="input-group input-group-merge">
                                    <div class="form-check form-check-inline">
                                        <input checked value="admin" class="form-check-input" type="radio"
                                            name="position" id="add-admin">
                                        <label class="form-check-label" for="Admin">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input value="manager" class="form-check-input" type="radio" name="position"
                                            id="add-manage">
                                        <label class="form-check-label" for="Manager">Manager</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn-submit-create" class="btn btn-primary">Thêm</button>
                        </div>
                        @if (session('error_password'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error_password') }}
                            </div>
                        @endif

                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
    <!-- / Content -->
@stop
