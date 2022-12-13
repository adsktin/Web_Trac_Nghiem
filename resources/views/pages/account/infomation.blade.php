@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Sửa Tài Khoản')
@section('content')
    <!-- Content -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('show-account') }}"><i class="bx bx-arrow-back me-1"></i>Quay
                        lại</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Sửa Thông Tin Cá Nhân</h5>
                <!-- Account -->
                <hr class="my-0">
                <div class="card-body">
                    <form id="formEditAccount" action="{{ route('update-infomation') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit-id" name="id" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <div id="ImgDivpreview" class="form-group">
                                    <img src="../storage/accounts/{{ Auth::user()->id }}/avatar/{{ Auth::user()->avatar }}"
                                        alt="user-avatar" class="rounded-circle" style="width:100px;height:100px"
                                        id="Imgpreview">
                                </div>
                                <div class="button-wrapper">
                                    <label for="edit-avatar" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload Hình Ảnh</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" name="avatar" id="edit-avatar" onchange="previewimg(this)"
                                            class="form-control account-file-input file-upload-default" hidden
                                            accept="image/*">
                                    </label>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="edit-email" name="email" readonly
                                    value="{{ Auth::user()->email }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Name" class="form-label">Họ Và Tên</label>
                                <input class="form-control" type="text" id="edit-name" name="name"
                                    value="{{ Auth::user()->name }}" autofocus />
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="birthday" class="form-label">Ngày Sinh</label>
                                <input class="form-control" type="date" id="edit-birthday" name="dateOfBirth"
                                    value="{{ Auth::user()->dateOfBirth }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Số Điện Thoại</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">VN (+84)</span>
                                    <input type="text" id="edit-phone_number" name="phone_number" class="form-control"
                                        value="{{ Auth::user()->phone_number }}" />
                                </div>
                                @if ($errors->has('phone_number'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btn-submit-edit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
    <!-- / Content -->
@stop
