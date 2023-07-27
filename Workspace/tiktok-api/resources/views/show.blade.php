@extends('main')

@section('content')
    <h1>{{ $title }}</h1>
    <p>ID: {{ $menu->id }}</p>
    <p>Name: {{ $menu->name }}</p>
    <!-- Hiển thị các thông tin khác của danh mục -->

    <!-- Hiển thị danh sách danh mục cha -->
    <h2>Danh sách danh mục cha:</h2>
    <ul>
        @foreach ($menus as $menu)
            <li>{{ $menu->name }}</li>
        @endforeach
    </ul>

    <!-- Thêm form để cập nhật thông tin danh mục -->
    <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Các trường thông tin để cập nhật -->
        <button type="submit">Cập nhật</button>
    </form>
@endsection
