@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Thêm Thể Loại')
@section('content')

    @if (session('success_delete_type'))
        <div class="alert alert-success" role="alert">
            {{ session('success_delete_type') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Content -->
    <div class="row">
        <div class="col-md-6">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('showcreate-question') }}"><i
                            class="bx bx-arrow-back me-1"></i>Quay
                        lại</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Thêm Thể Loại Mới</h5>
                <!-- Type -->
                <hr class="my-0">
                <div class="card-body">
                    @if ($errors->has('image'))
                        <div class="alert alert-danger">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <form id="formCreateTypeQuestion" action="{{ route('createtype-question') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <div id="ImgDivpreview" class="form-group">
                                        <img src="../assets/img/no-image/no-image-type.png" alt="type-image"
                                            class="rounded-circle" style="width:200px;height:200px" id="Imgpreview">
                                    </div>
                                    <div class="button-wrapper">
                                        <label for="image" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload Hình Ảnh</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="image" id="image" onchange="previewimg(this)"
                                                class="form-control account-file-input file-upload-default" hidden
                                                accept="image/*">
                                        </label>
                                        {{--  <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>  --}}
                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 2MB</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="type" class="form-label">Thể Loại Câu Hỏi</label>
                                <input class="form-control" type="text" id="create-type" name="type"
                                    placeholder="Nhập thể loại câu hỏi" autofocus="">
                                @if ($errors->has('type'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('type') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Thêm</button>
                            <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                        </div>
                    </form>
                </div>
                <!-- /Type -->
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 55px">
            <div class="card">
                {{-- <h5 class="card-header">Responsive Table</h5> --}}
                <h5 class="card-header">Danh Sách Thể Loại</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th></th>
                                <th>Hình Ảnh</th>
                                <th>Tên Thể Loại</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('delete-types', ['id' => $type->id]) }}"
                                                    method="POST">
                                                    {{--  <a class="dropdown-item"
                                                        href="{{ route('edit-types', ['id' => $type->id]) }}"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Sửa</a>  --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item show_confirm"><i
                                                            class="bx bx-trash me-1"></i>Xóa</button>

                                                </form>

                                                {{--  <a class="dropdown-item" href="{{ route('delete-news', ['id' => $new->id]) }}"><i
                                                    class="bx bx-trash me-1"></i>
                                                Xóa</a>  --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <img src="../storage/types/{{ $type->image }}" alt="Avartar-image"
                                                class="rounded-circle" height="50" width="50" />
                                        </ul>
                                    </td>
                                    <td>{{ $type->type }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

@stop
