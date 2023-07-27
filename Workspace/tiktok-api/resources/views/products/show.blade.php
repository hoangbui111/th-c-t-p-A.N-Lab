@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>Giá: {{ $product->price }} đ</p>
        <p>Số lượng: {{ $product->quantity }}</p>
        <!-- Hiển thị hình ảnh sản phẩm -->
        @if($product->image)
            <img src="{{ asset('path/to/your/image/folder/'.$product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
        @endif
    </div>
@endsection
