@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Sửa Câu Hỏi')
@section('content')

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Content -->
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('show-question') }}"><i class="bx bx-arrow-back me-1"></i>Quay
                        lại</a>
                </li>
            </ul>

            <div class="card mb-4">
                <h5 class="card-header">Sửa Câu Hỏi</h5>
                <!-- Question -->
                <hr class="my-0">
                <div class="card-body">
                    <form id="formCreateNews" action="{{ route('edit-question') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit-id-question" name="id" value="{{ $questions->id }}">
                        {{--  <input type="hidden" id="edit-id-type" name="type" value="{{ $questions->types->id }}">  --}}
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="selectType">Thể Loại</label>
                                <select id="selectType" class="form-select" name="type">
                                    @foreach ($types as $type)
                                        @if ($type->type == $questions->types->type)
                                            <option value="{{ $type->id }}" selected>
                                                {{ $type->type }}</option>
                                        @else
                                            <option value="{{ $type->id }}">
                                                {{ $type->type }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            {{--  <div class="mb-3 col-md-3" style="margin-top: 8px">
                                <br>
                                <a href="{{ route('showtype-question') }}" type="button"
                                    class="btn rounded-pill btn-icon btn-primary">
                                    <span class="tf-icons bx bx-plus text-white"></span>
                                </a>
                            </div>  --}}
                            @if ($errors->has('type'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <div>
                                <label for="questcontent" class="form-label">Nội Dung Câu Hỏi</label>
                                <textarea class="form-control" id="questcontent" name="questcontent" placeholder="" rows="3">{{ $questions->questcontent }}</textarea>
                                @if ($errors->has('questcontent'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('questcontent') }}
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" id="edit-id-answer1" name="answer1"
                                value="{{ $questions->answers[0]->id }}">
                            <input type="hidden" id="edit-id-answer2" name="answer2"
                                value="{{ $questions->answers[1]->id }}">
                            <input type="hidden" id="edit-id-answer3" name="answer3"
                                value="{{ $questions->answers[2]->id }}">
                            <input type="hidden" id="edit-id-answer4" name="answer4"
                                value="{{ $questions->answers[3]->id }}">
                            <div class="mb-3 col-md-3">
                                <label for="answer1" class="form-label">Câu Trả Lời Đúng</label>
                                <input class="form-control" type="text" id="answer1" name="answer1"
                                    value="{{ $questions->answers[0]->answercontent }}" placeholder="Nhập nội dung"
                                    autofocus />
                                @if ($errors->has('answer1'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('answer1') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="answer2" class="form-label">Câu Trả Lời Sai</label>
                                <input class="form-control" type="text" id="answer2" name="answer2"
                                    value="{{ $questions->answers[1]->answercontent }}" placeholder="Nhập nội dung"
                                    autofocus />
                                @if ($errors->has('answer2'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('answer2') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="answer3" class="form-label">Câu Trả Lời Sai</label>
                                <input class="form-control" type="text" id="answer3" name="answer3"
                                    value="{{ $questions->answers[2]->answercontent }}" placeholder="Nhập nội dung"
                                    autofocus />
                                @if ($errors->has('answer3'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('answer3') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3 col-md-3">
                                <label for="answer4" class="form-label">Câu Trả Lời Sai</label>
                                <input class="form-control" type="text" id="answer4" name="answer4"
                                    value="{{ $questions->answers[3]->answercontent }}" placeholder="Nhập nội dung"
                                    autofocus />
                                @if ($errors->has('answer4'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('answer4') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Sửa</button>
                            <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                        </div>
                    </form>
                </div>
                <!-- /Question -->
            </div>
        </div>
    </div>
    <!-- / Content -->

@stop
