@extends('admin.layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý tài khoản')
@section('content')

    <!-- Large Modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Thêm Tài Khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email" value=""
                                    placeholder="Nhập email" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Nhập mật khẩu</label>
                                <input class="form-control" type="password" id="password" name="password" value=""
                                    placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Name" class="form-label">Họ Và Tên</label>
                                <input class="form-control" type="text" id="Name" name="Name" value=""
                                    placeholder="Nhập họ và tên" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="birthday" class="form-label">Ngày Sinh</label>
                                <input class="form-control" type="date" id="birthday" name="birthday" value=""
                                    autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Số Điện Thoại</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">VN (+84)</span>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="833 081 291" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="checkrole">Chức vụ</label>
                                <div class="input-group input-group-merge">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Manager</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="demo-inline-spacing mb-3">
        <button type="button" class="btn rounded-pill btn-success text-black" data-bs-toggle="modal"
            data-bs-target="#largeModal">
            Thêm Tài Khoản
        </button>
    </div>
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Danh Sách Tài Khoản</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Họ và Tên</th>
                        <th>Chức Vụ</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"
                                    height="50" />
                            </ul>
                        </td>
                        <td> <strong>dng2001@gmail.com</strong></td>
                        <td>Dương Nghĩa Hiệp</td>
                        <td>Người Quản Trị</td>

                        <td><span class="badge bg-label-danger me-1"><i class="bx bx-lock"></i></span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn-info" href="{{ route('editinfo') }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Sửa</a>
                                    <a class="dropdown-item btn-danger" href="javascript:void(0);"><i
                                            class="bx bx-trash me-1"></i>
                                        Xóa</a>
                                    <a class="dropdown-item btn-warning" href="javascript:void(0);"><i
                                            class="bx bx-lock me-1"></i>
                                        Khóa</a>
                                    <a class="dropdown-item btn-success" href="javascript:void(0);"><i
                                            class="bx bx-lock-open me-1"></i>
                                        Mở Khóa</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle"
                                    height="50" />
                            </ul>
                        </td>
                        <td> <strong>dng2001@gmail.com</strong></td>
                        <td>Dương Nghĩa Hiệp</td>
                        <td>Người Quản Trị</td>
                        <td><span class="badge bg-label-success me-1"><i class="bx bx-lock-open"></i></span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">

                                    <a class="dropdown-item btn-info" href="{{ route('editinfo') }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Sửa</a>
                                    <a class="dropdown-item btn-danger" href="javascript:void(0);"><i
                                            class="bx bx-trash me-1"></i>
                                        Xóa</a>
                                    <a class="dropdown-item btn-warning" href="javascript:void(0);"><i
                                            class="bx bx-lock me-1"></i>
                                        Khóa</a>
                                    <a class="dropdown-item btn-success" href="javascript:void(0);"><i
                                            class="bx bx-lock-open me-1"></i>
                                        Mở Khóa</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->
@stop
