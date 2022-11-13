@extends('admin.layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý câu hỏi')
@section('content')

    <!-- Large Modal -->
    <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="textaddquest">Thêm Câu Hỏi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="selectType">Thể Loại</label>
                                <select id="selectType" class="form-select">
                                    <option value="Công Nghệ" selected="">Công Nghệ</option>
                                    <option value="Thể Thao">Thể Thao</option>
                                    <option value="Đố Vui">Đố Vui</option>
                                    <option value="Tiếng Anh">Tiếng Anh</option>
                                    <option value="Lịch Sử">Lịch Sử</option>
                                    <option value="Địa Lý">Địa Lý</option>
                                    <option value="Ngẫu Nhiên">Ngẫu Nhiên</option>
                                </select>
                            </div>

                            <div>
                                <label for="exampleFormControlTextarea1" class="form-label">Nội Dung</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Nhập nội dung câu hỏi" rows="3"></textarea>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="Name" class="form-label">Câu Trả Lời Đúng</label>
                                <input class="form-control" type="text" id="NoiDung" name="NoiDung" value=""
                                    placeholder="Nhập nội dung" autofocus />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="Name" class="form-label">Câu Trả Lời Sai</label>
                                <input class="form-control" type="text" id="NoiDung" name="NoiDung" value=""
                                    placeholder="Nhập nội dung" autofocus />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="Name" class="form-label">Câu Trả Lời Sai</label>
                                <input class="form-control" type="text" id="NoiDung" name="NoiDung" value=""
                                    placeholder="Nhập nội dung" autofocus />
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="Name" class="form-label">Câu Trả Lời Sai</label>
                                <input class="form-control" type="text" id="NoiDung" name="NoiDung" value=""
                                    placeholder="Nhập nội dung" autofocus />
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
            Thêm Câu Hỏi
        </button>
    </div>

    <div class="card">
        {{-- <h5 class="card-header">Responsive Table</h5> --}}
        <h5 class="card-header">Danh Sách Câu Hỏi</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>STT</th>
                        <th>Thể Loại</th>
                        <th>Nội Dung</th>

                        <th>Đáp Án Sai</th>
                        <th>Đáp Án Sai</th>
                        <th>Đáp Án Sai</th>
                        <th>Đáp Án Đúng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Công Nghệ</td>

                        <td>Con gà hay trứng có trước</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>Gà</td>
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
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Công Nghệ</td>

                        <td>Con gà hay trứng có trước</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Sửa</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Xóa</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Công Nghệ</td>

                        <td>Con gà hay trứng có trước</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>Gà</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Sửa</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Xóa</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
