@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Sửa Tin Tức')
@section('content')


    <!-- Content -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('show-news') }}"><i class="bx bx-arrow-back me-1"></i>Quay
                        lại</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Sửa Tin Tức</h5>
                <!-- Account -->
                <hr class="my-0">
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{ route('update-news') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit-id" name="id" value="{{ $new->id }}">
                        <div class="row">
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <div id="ImgDivpreview" class="form-group">
                                        <img src="../storage/news/{{ $new->image }}" alt="image-news"
                                            class="d-block rounded" style="width:300px;height:200px" id="Imgpreview">
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
                                <label for="title" class="form-label">Tiêu Đề</label>
                                <input class="form-control" type="text" id="title" name="title"
                                    value="{{ $new->title }}" placeholder="Nhập tiêu đề" autofocus="">
                            </div>
                            @if ($errors->has('title'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <div>
                                <label for="decription" class="form-label">Nội Dung</label>
                                <textarea class="form-control" id="decription" rows="3" name="decription" placeholder="Nhập nội dung">{{ $new->decription }}</textarea>
                            </div>
                            @if ($errors->has('decription'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('decription') }}
                                </div>
                            @endif
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Sửa</button>
                            <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

        </div>
    </div>

    <!-- / Content -->

@stop
