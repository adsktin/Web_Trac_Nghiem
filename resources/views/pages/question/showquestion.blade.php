@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Quản lý câu hỏi')
@section('content')
    @if (session('success_delete'))
        <div class="alert alert-success" role="alert">
            {{ session('success_delete') }}
        </div>
    @endif
    <div class="mb-3">
        <a type="button" class="btn rounded-pill btn-success text-black" href="{{ route('showcreate-question') }}">
            Thêm Câu Hỏi
        </a>
    </div>
    @if ($count == 0)
        <h1 class="row" style="text-align: center; margin-left: 30%"> Chưa có câu hỏi nào cả!</h1>
    @else
        <div class="card">
            {{-- <h5 class="card-header">Responsive Table</h5> --}}
            <h5 class="card-header">Danh Sách Câu Hỏi</h5>
            <div class="table-responsive text-nowrap">
                <table class="table" id="table-question">

                    <thead>
                        <tr class="text-nowrap">
                            <th>STT</th>
                            <th>Thể Loại</th>
                            <th>Nội Dung</th>
                            <th class="bg-danger text-white border">Đáp Án sai</th>
                            <th class="bg-danger text-white border">Đáp Án sai</th>
                            <th class="bg-danger text-white border">Đáp Án sai</th>
                            <th class="bg-success border">Đáp Án đúng</th>
                            {{--  <th>Đáp Án A</th>
                            <th>Đáp Án B</th>
                            <th>Đáp Án C</th>
                            <th>Đáp Án D</th>  --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $question->types->type }}</td>
                                <td>
                                    <div style="width: 200px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                        {{ $question->questcontent }}</div>
                                </td>

                                <td>
                                    {{--  @if ($question->answers[1]->answerbool == true)
                                        <div class="bg-success"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[1]->answercontent }}</div>
                                    @else
                                        <div class="bg-danger text-white border"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[1]->answercontent }}</div>
                                    @endif  --}}
                                    <div style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                        {{ $question->answers[1]->answercontent }}</div>
                                </td>

                                <td>
                                    {{--  @if ($question->answers[2]->answerbool == true)
                                        <div class="bg-success"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[2]->answercontent }}</div>
                                    @else
                                        <div class="bg-danger text-white border"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[2]->answercontent }}</div>
                                    @endif  --}}
                                    <div style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                        {{ $question->answers[2]->answercontent }}</div>
                                </td>
                                <td>
                                    {{--  @if ($question->answers[3]->answerbool == true)
                                        <div class="bg-success"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[3]->answercontent }}</div>
                                    @else
                                        <div class="bg-danger text-white border"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[3]->answercontent }}</div>
                                    @endif  --}}
                                    <div style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                        {{ $question->answers[3]->answercontent }}</div>
                                </td>
                                <td>
                                    {{--  @if ($question->answers[0]->answerbool == true)
                                        <div class="bg-success"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[0]->answercontent }}</div>
                                    @else
                                        <div class="bg-danger text-white border"
                                            style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                            {{ $question->answers[0]->answercontent }}</div>
                                    @endif  --}}
                                    <div style="width: 150px;white-space: nowrap; overflow: hidden;text-overflow: ellipsis">
                                        {{ $question->answers[0]->answercontent }}</div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">

                                            <form action="{{ route('delete-question', ['id' => $question->id]) }}"
                                                method="POST">
                                                <a class="dropdown-item"
                                                    href="{{ route('showedit-question', ['id' => $question->id]) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Sửa</a>
                                                @csrf
                                                @method('DELETE')
                                                {{--  <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i>Xóa</button>  --}}
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
        let table = new DataTable('#table-question', {
            // options
            paging: true, //phan trang

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
