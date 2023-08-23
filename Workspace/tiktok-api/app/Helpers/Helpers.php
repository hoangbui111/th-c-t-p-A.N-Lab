<?php

namespace App\Helpers;

class Helpers
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';

        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= '
                <tr>
                    <td>' . $menu->id . '</td>
                    <td>' . $char . $menu->name . '</td>
                    <td>' . self::active($menu->active) . '</td>
                    <td>' . $menu->updated_at . '</td> 
                    <td>
                        <a class="btn btn-primary btn-sm" href="' . route('user.product.edit', ['productId' => $menu->id]) . '">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm" 
                            onclick="removeRow(' . $menu->id . ', \'' . route('user.product.destroy', ['productId' => $menu->id]) . '\')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                ';

                unset($menus[$key]);

                $html .= self::menu($menus, $menu->id, $char . '--');
            }
        }
        return $html;
    }

    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : 
            '<span class="btn btn-success btn-xs">Yes</span>'; 
    }
}
