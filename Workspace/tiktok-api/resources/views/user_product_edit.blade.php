@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
<form action="{{ route('user.product.update', ['productId' => $product->id]) }}" method="POST">
    @method('PUT') <!-- Thêm phương thức PUT -->
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="product">Tên Danh Mục</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="product" placeholder="Nhập tên sản phẩm">
        </div>

        <div class="form-group">
            <label >Danh Mục</label>
            <select class="form-control" name="parent_id">
                <option value="0" {{ $product->parent_id == 0 ? 'selected' : '' }}>Danh Mục Cha</option>
                @foreach($parents as $parent)
                <option value="{{ $parent->id }}" {{ $product->parent_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label >Mô Tả</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label >Mô Tả Chi Tiết</label>
            <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
        </div>

        <div class="form-group">
            <label >Kích Hoạt</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active"
                    name="active" {{ $product->active == 1 ? 'checked' : '' }}>
                <label for="active" class="custom-control-label">Có</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_active" 
                    name="active" {{ $product->active == 0 ? 'checked' : '' }}>
                <label for="no_active" class="custom-control-label">Không</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Danh mục</button>
    </div>
    @csrf
</form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
