<div class="card">
    <h5 class="card-header">Bảng Xếp Hạng</h5>
    {{--  style="height: 300px; overflow: auto;"  --}}
    <div class="table-responsive text-nowrap">
        <table class="table" id="table-rank">
            <thead>
                <tr>
                    <th>Hạng</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Họ và tên</th>
                    <th>Điểm số</th>
                    {{--  <th>Số trận thắng bạn bè</th>  --}}
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                    @if ($user->isManager == false && $user->isAdmin == false)
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
                                    @endif
                                </ul>
                            </td>
                            <td> <strong>{{ $user->email }}</strong> </td>
                            <td> <strong>{{ $user->name }}</strong> </td>
                            <td><strong>{{ $user->totalscore }}</strong></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    let table = new DataTable('#table-rank', {
        // options
        paging: true, //phan trang
        scrollY: 250,
        info: true,
        retrieve: true,
        searching: false,
        "bDestroy": true,
        "pageLength": 10,
        "language": {
            "sProcessing": "Đang tải dữ liệu...",
            "sLengthMenu": "Hiển thị _MENU_ trong danh sách",
            "sEmptyTable": "Không có dữ liệu trong bảng này",
            "sInfo": "Hiện đang ở vị trí _START_ đến _END_ trong tổng số _TOTAL_ của danh sách",
            "sInfoEmpty": "Hiển thị các bản ghi từ 0 đến 0 trong tổng số 0 bản ghi",
            "sInfoFiltered": "(lọc từ tổng số _MAX_ trong danh sách)",
            "sInfoPostFix": "",
            "sUrl": "",
            "sInfoThousands": ",",
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
