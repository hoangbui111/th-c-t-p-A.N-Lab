@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách sản phẩm</h1>
        <!-- Form tìm kiếm -->
        <form action="{{ route('products.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm để tìm kiếm" name="q">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">      
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Giá: {{ $product->price }} đ</p>
                    <p>Số lượng: {{ $product->quantity }}</p>
                    <!-- Hiển thị hình ảnh sản phẩm -->
                    @if($product->image)
                        <img src="{{ asset('path/to/your/image/folder/'.$product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
