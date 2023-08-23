<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getParent()
    {
        return Product:: where('parent_id', 0)->get();

        }
    public function getAll()
    {
        return Product::orderByDesc('id')->paginate(20);
    }

    public function create($request)
    {   
        try {
            Product::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'), 
                'description' => (string) $request->input('description'), 
                'content' => (string) $request->input('content'), 
                'active' => (string) $request->input('active'),    
]);

            Session::flash('success', 'Thêm sản phẩm thành công');

        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($data, $product)
    {
        $product->name = (string) $data['name'];
        $product->description = (string) $data['description'];
        $product->content = (string) $data['content'];
        $product->active = (string) $data['active'];
        // Update other fields as needed
        $product->save();

        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    
    public function destroy($productId)
    {
        $product = Product::find($productId); // Tìm sản phẩm theo productId
    
        if ($product) {
            // Xóa sản phẩm
            $product->delete();
            // Nếu có danh mục liên quan, cũng xóa
            if ($product->categories->count() > 0) {
                $product->categories()->detach();
            }
            return true; // Trả về true nếu xóa thành công
        }
    
        return false; // Trả về false nếu sản phẩm không tồn tại
    }
}   