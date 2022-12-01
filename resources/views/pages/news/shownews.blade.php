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
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th></th>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tiêu Đề</th>
                            <th>Nội Dung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('delete-news', ['id' => $new->id]) }}" method="POST">
                                                <a class="dropdown-item"
                                                    href="{{ route('edit-news', ['id' => $new->id]) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Sửa</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i>Xóa</button>
                                            </form>

                                            {{--  <a class="dropdown-item" href="{{ route('delete-news', ['id' => $new->id]) }}"><i
                                                class="bx bx-trash me-1"></i>
                                            Xóa</a>  --}}
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $i-- }}</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <img src="../storage/news/{{ $new->image }}" alt="Avartar-image" class=""
                                            height="150" />
                                    </ul>
                                </td>
                                <td>{{ $new->title }}</td>
                                <td>{{ $new->decription }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@stop
