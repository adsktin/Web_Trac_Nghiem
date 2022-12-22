@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý tài khoản')
@section('content')

    @if (session('success_delete'))
        <div class="alert alert-success" role="alert">
            {{ session('success_delete') }}
        </div>
    @endif
    @if (session('success_lock'))
        <div class="alert alert-success" role="alert">
            {{ session('success_lock') }}
        </div>
    @endif
    @if (session('success_unlock'))
        <div class="alert alert-success" role="alert">
            {{ session('success_unlock') }}
        </div>
    @endif
    <div class="mb-3">
        <a type="button" class="btn rounded-pill btn-success text-black" href="{{ route('showcreate-account') }}">
            Thêm Tài Khoản
        </a>
    </div>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header">Danh Sách Tài Khoản</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped" id="table-account">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Avatar</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Họ và Tên</th>
                        <th>Chức Vụ</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="tableAccountAdmin" class="table-border-bottom-0">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">

                                    @if ($user->avatar == null)
                                        <img src="../assets/img/no-image/no-image-user.jpg" alt="Avatar"
                                            class="rounded-circle" height="50" />
                                    @else
                                        <img src="../storage/accounts/{{ $user->id }}/avatar/{{ $user->avatar }}"
                                            alt="Avatar" class="rounded-circle" height="50" width="50" />
                                        {{--  <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle" height="50"
                                            width="50" />  --}}
                                    @endif
                                </ul>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->name }}</td>

                            <td>
                                @if ($user->isAdmin == true)
                                    Admin
                                @endif
                                @if ($user->isManager == true)
                                    Manager
                                @endif
                                @if ($user->isManager == false && $user->isAdmin == false)
                                    User
                                @endif
                            </td>
                            <td>
                                @if ($user->status == true)
                                    <span class="badge bg-label-success me-1"><i class="bx bx-lock-open"></i></span>
                                @else
                                    <span class="badge bg-label-danger me-1"><i class="bx bx-lock"></i></span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ route('delete-account', ['id' => $user->id]) }}" method="POST">
                                            <a class="dropdown-item btn-info"
                                                href="{{ route('edit-account', ['id' => $user->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Sửa</a>
                                            @csrf
                                            @method('DELETE')
                                            {{--  <button type="submit" class="dropdown-item btn-danger"><i
                                                    class="bx bx-trash me-1"></i>Xóa</button>  --}}
                                            <button class="dropdown-item btn-danger show_confirm"><i
                                                    class="bx bx-trash me-1"></i>Xóa</button>
                                        </form>

                                        <form action="{{ route('changestatus-account', $user->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" id="id" name="id"
                                                value="{{ $user->id }}">
                                            <input type="hidden" id="status" name="status"
                                                value="{{ $user->status }}">
                                            @if ($user->status == true)
                                                <button type="submit" class="dropdown-item btn-warning" name="changestatus"
                                                    value="false"><i class="bx bx-lock me-1"></i>Khóa</button>
                                            @else
                                                <button type="submit" class="dropdown-item btn-success" name="changestatus"
                                                    value="true"><i class="bx bx-lock-open me-1"></i>Mở Khóa</button>
                                            @endif
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->
    <script>
        let table = new DataTable('#table-account', {
            // options
            paging: true, //phan trang
            scrollY: 500,
            info: true,
            retrieve: true,
            "bDestroy": true,
            "pageLength": 10,
            "language": {
                "sProcessing": "Đang tải dữ liệu...",
                "sLengthMenu": "Hiển thị _MENU_ trong danh sách",
                "sZeroRecords": "Không có kết quả nào được tìm thấy",
                "sEmptyTable": "Không có dữ liệu trong bảng này",
                "sInfo": "Hiện đang ở vị trí _START_ đến _END_ trong tổng số _TOTAL_ của danh sách",
                "sInfoEmpty": "Hiển thị các bản ghi từ 0 đến 0 trong tổng số 0 bản ghi",
                "sInfoFiltered": "(lọc từ tổng số _MAX_ trong danh sách)",
                "sInfoPostFix": "",
                "sSearch": "Tìm kiếm:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Đang xử lý...",
                "oPaginate": {
                    "sFirst": "Trang đầu",
                    "sLast": "Trang cuối",
                    "sNext": ">",
                    "sPrevious": "<"
                },
                "oAria": {
                    "sSortAscending": ": Kích hoạt để sắp xếp cột theo thứ tự tăng dần",
                    "sSortDescending": ": Kích hoạt để sắp xếp cột theo thứ tự giảm dần"
                }
            }
        });
    </script>
@stop
