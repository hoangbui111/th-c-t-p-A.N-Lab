<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm từ database (ví dụ: sử dụng model Product)
        $products = Product::all();

        // Truyền biến $products vào view để hiển thị danh sách sản phẩm
        return view('product.index', [
            'products' => $products
        ]);
    }

    // Các phương thức khác của ProductController
}