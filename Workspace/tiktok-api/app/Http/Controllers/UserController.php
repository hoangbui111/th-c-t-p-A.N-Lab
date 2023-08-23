<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the appropriate model for products
use App\Services\ProductService; // Import your ProductService or replace it with the appropriate service for products
use App\Http\Requests\CreateProductFormRequest; // Import your request class or replace it with the appropriate request class for products
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
    }

    public function userDashboard()
    {
        return view('user_dashboard');
    }

    public function create() 
    {
        return view('user_product_create', [
            'title'=> 'Thêm Danh Mục Mới',
            'products'=> $this->productService->getAll()
        ]);
    }

    public function store(CreateProductFormRequest $request)
    {
        $result = $this->productService->create($request);

            return redirect()->back()->with('success', 'Thêm danh mục thành công');
    }  
    public function index()
    {
        $products = $this->productService->getAll();
        return view('user_product_index', ['products' => $products]);
    }

    public function show($productId)
{
    $product = Product::find($productId);
    
    if (!$product) {
        return redirect()->route('user.product.index')->with('error', 'Không tìm thấy danh mục');
    }

    return view('user_product_edit', [
        'title' => 'Chỉnh sửa danh mục: ' . $product->name,
        'product' => $product,
        'parents' => $this->productService->getParent()
    ]);
}

public function update(CreateProductFormRequest $request, $productId)
{
    $product = Product::find($productId);

    if (!$product) {
        return redirect()->route('user.product.index')->with('error', 'Không tìm thấy danh mục');
    }

    $result = $this->productService->update($request, $product);

    if ($result) {
        return redirect()->route('user.product.index')->with('success', 'Cập nhật danh mục thành công');
    }

    return redirect()->back()->with('error', 'Có lỗi khi cập nhật danh mục');
}


    public function destroy($productId)
    {
        $result = $this->productService->destroy($productId); // Gọi hàm destroy trong ProductService
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]); 
        }
    
        return response()->json([
            'error' => true
        ]);
    }
}  