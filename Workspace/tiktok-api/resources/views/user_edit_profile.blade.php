@extends('layouts.user')

@section('content')
    <div class="container">
        <h1>Thay đổi Thông Tin Cá Nhân</h1>
        <form method="POST" action="{{ route('user.update_profile') }}">
            @csrf
            <div class="form-group">
                <label for="name">Tên:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Nhập lại mật khẩu:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        </form>
    </div>
@endsection