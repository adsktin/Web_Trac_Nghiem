@extends('admin.layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý tin tức')
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
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                        height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Thêm ảnh</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden
                                                accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Xóa</span>
                                        </button>
                                        <p class="text-muted mb-0">Cho phép JPG, GIF hoặc PNG. Kích thước lớn nhất là 800K
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="Name" class="form-label">Tiêu Đề</label>
                                <input class="form-control" type="text" id="Title" name="Title" value=""
                                    placeholder="Nhập Tiêu Đề" autofocus />
                            </div>

                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Nội Dung</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" aria-multiline="5"
                                    placeholder="Nhập nội dung tin tức"></textarea>
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
            Thêm Tin Tức
        </button>
    </div>

    <div class="card">
        {{-- <h5 class="card-header">Responsive Table</h5> --}}

        <h5 class="card-header">Danh Sách Tin Tức</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th></th>
                        <th>Hình Ảnh</th>
                        <th>Tiêu Đề</th>
                        <th>Nội Dung</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                        Sửa</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Xóa</a>
                                </div>
                            </div>
                        </td>

                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="" height="100" />
                            </ul>
                        </td>
                        <td>iphone 14</td>
                        <td>Iphone 14 có hỗ trợ các tính năng mới.Iphone 14 có hỗ trợ các tính năng mới.Iphone 14 có hỗ trợ
                            các tính năng mới.Iphone 14 có hỗ trợ các tính năng mới.Iphone 14 có hỗ trợ các tính năng mới.
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                        Sửa</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Xóa</a>
                                </div>
                            </div>
                        </td>

                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <img src="../assets/img/avatars/7.png" alt="Avatar" class="" height="100" />
                            </ul>
                        </td>
                        <td>iphone 14</td>
                        <td>Iphone 14 có hỗ trợ các tính năng mới.Iphone 14 có hỗ trợ các tính năng mới.Iphone 14 có hỗ trợ
                            các tính năng mới.Iphone 14 có hỗ trợ các tính năng mới.Iphone 14 có hỗ trợ các tính năng mới.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
