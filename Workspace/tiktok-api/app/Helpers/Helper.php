<?php

namespace App\Helpers;
use App\Http\Controllers\UserController;
class Helper
{
    public static function product($products, $parent_id = 0, $char = '')
{
    $html = '';

    foreach ($products as $key => $product) {
        if ($product->parent_id == $parent_id) {
            $html .= '
            <tr>
                <td>' . $product->id . '</td>
                <td>' . $char . $product->name . '</td>
                <td>' . self::active($product->active) . '</td>
                <td>' . $product->updated_at . '</td> 
                <td>
                    <a class="btn btn-primary btn-sm" href="' . route('user.product.show', ['productId' => $product->id]) . '">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" 
                        onclick="removeRow(\'' . $product->id . '\', \'' . route('user.product.destroy', ['productId' => $product->id]) . '\')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            ';

            unset($products[$key]);

            $html .= self::product($products, $product->id, $char . '--');
        }
    }
    return $html;
}

    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">Yes</span>';
    }
}
