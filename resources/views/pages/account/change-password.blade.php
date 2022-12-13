@extends('layout')
@section('title', 'Trắc Nghiệm - Admin | Đổi Mật Khẩu')
@section('content')

    <div class="container-fluid">
        <div class="col-md-6 offset-3 pt-4">
            <h3 class="text-center">Đổi Mật Khẩu</h3>
            {{--  @if ($errors->any())
                {!! implode('', $errors->all('<div style="color:red">:message</div>')) !!}
            @endif  --}}

            @if (Session::get('error') && Session::get('error') != null)
                <div style="color:red">{{ Session::get('error') }}</div>
                @php
                    Session::put('error', null);
                @endphp
            @endif
            @if (Session::get('success') && Session::get('success') != null)
                <div style="color:green">{{ Session::get('success') }}</div>
                @php
                    Session::put('success', null);
                @endphp
            @endif
            <form class="form" action="{{ route('ChangePasswordSave') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    @if ($errors->has('current_password'))
                        <div style="color:red">
                            {{ $errors->first('current_password') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                    @if ($errors->has('new_password'))
                        <div style="color:red">
                            {{ $errors->first('new_password') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation">
                    @if ($errors->has('new_password_confirmation'))
                        <div style="color:red">
                            {{ $errors->first('new_password_confirmation') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary text-center">Xác Nhận</button>
            </form>
        </div>
    </div>
  
@stop
