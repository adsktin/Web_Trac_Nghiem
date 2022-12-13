@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý tin tức')
@section('content')


    @if (session('success_delete'))
        <div class="alert alert-success" role="alert">
            {{ session('success_delete') }}
        </div>
    @endif
    <div class="mb-3">
        <a type="button" class="btn rounded-pill btn-success text-black" href="{{ route('showcreate-news') }}">
            Thêm Tin Tức
        </a>
    </div>
    @if ($count == 0)
        <h1 class="row" style="text-align: center; margin-left: 30%"> Chưa có tin tức nào cả!</h1>
    @else
        <div class="card">
            {{-- <h5 class="card-header">Responsive Table</h5> --}}

            <h5 class="card-header">Danh Sách Tin Tức</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="table-news">
                    <thead>
                        <tr class="text-nowrap">

                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tiêu Đề</th>
                            <th>Nội Dung</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)
                            <tr>

                                <td>{{ $i-- }}</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <img src="../storage/news/{{ $new->image }}" alt="Avartar-image" class=""
                                            height="150" />
                                    </ul>
                                </td>
                                <td>{{ $new->title }}</td>
                                <td>
                                    <div style="width: 400px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                        {{ $new->decription }}</div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('delete-news', ['id' => $new->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dropdown-item"
                                                    href="{{ route('edit-news', ['id' => $new->id]) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Sửa</a>
                                                <button class="dropdown-item show_confirm"><i
                                                        class="bx bx-trash me-1"></i>Xóa</button>
                                            </form>

                                            {{--  <a class="dropdown-item" href="{{ route('delete-news', ['id' => $new->id]) }}"><i
                                                class="bx bx-trash me-1"></i>
                                            Xóa</a>  --}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <script>
        let table = new DataTable('#table-news', {
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
