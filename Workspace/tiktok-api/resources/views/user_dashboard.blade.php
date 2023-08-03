@extends('layouts.user')

@section('content')
    <div class="container">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        
        <!-- Hiển thị danh sách sản phẩm hoặc thông tin cá nhân -->
        <div class="card">
            <div class="card-body">
                <h2>Your Dashboard</h2>
                
                <!-- Nếu bạn muốn hiển thị danh sách sản phẩm -->
                <h3>Your Products</h3>
                <ul>
                    @foreach ($user->products as $product)
                        <li>{{ $product->name }}</li>
                    @endforeach
                </ul>
                
                <!-- Nếu bạn muốn cho phép người dùng chỉnh sửa thông tin cá nhân -->
                <a href="{{ route('user.profile') }}">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
