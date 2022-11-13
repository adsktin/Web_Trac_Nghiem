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
                        <th class="bg-danger text-white border">Đáp Án Sai</th>
                        <th class="bg-danger text-white border">Đáp Án Sai</th>
                        <th class="bg-danger text-white border">Đáp Án Sai</th>
                        <th class="bg-success ">Đáp Án Đúng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($questions as $question)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $question->types->type }}</td>
                            <td>{{ $question->questcontent }}</td>
                            <td>{{ $question->answers[1]->answercontent }}</td>
                            <td>{{ $question->answers[2]->answercontent }}</td>
                            <td>{{ $question->answers[3]->answercontent }}</td>
                            <td>{{ $question->answers[0]->answercontent }}</td>
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
                                            <button type="submit" class="dropdown-item"><i
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
@stop
