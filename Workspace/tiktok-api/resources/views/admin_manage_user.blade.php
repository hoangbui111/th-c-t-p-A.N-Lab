@extends('layouts.app')
@include('head')
@section('content')
    <div class="container">
        <h1>Quản lý Người Dùng</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Quyền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <!-- Thêm các nút thao tác như Sửa, Xóa -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('footer')
@endsection
