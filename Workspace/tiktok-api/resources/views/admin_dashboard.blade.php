@extends('layouts.app')
@include('head')
@section('content')
    @if (auth()->user()->role === 'admin')
        <h1> Admin {{ auth()->user()->name }}</h1>
        <!-- Hiển thị nội dung dành cho admin -->
        <a href="{{ route('admin.manage_users') }}">Quản lý Người Dùng</a
    @endif
@include('footer')    
@endsection
