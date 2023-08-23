@extends('layouts.app')
@include('head')
@section('content')
@if (auth()->check() && auth()->user()->role === 'admin')
        <h1> Admin {{ auth()->user()->name }}</h1>
        <!-- Hiển thị nội dung dành cho admin -->
        <a href="{{ route('admin.manage_user') }}">Admin Dashboard</a>
    @endif
@include('footer')    
@endsection
