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
                                            alt="Avatar" class="rounded-circle" height="50"
                                            width="50" />
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
