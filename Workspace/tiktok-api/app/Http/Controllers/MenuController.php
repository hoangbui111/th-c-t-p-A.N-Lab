<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFormRequest; 

use App\Http\Services\MenuService;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService) 
    {
        $this->menuService = $menuService;
    }

    public function create() 
    {
        return view('menu.add', [
            'title'=> 'Thêm Sản Phẩm Mới',
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);

        if ($result) {
            return redirect()->route('menus.list')->with('success', 'Tạo Sản Phẩm thành công');
        }

        return redirect()->back()->with('error', 'Có lỗi khi tạo Sản phẩm');
    }


    public function index() {
        return view('list', [
            'title' => 'Danh Sách Sản phẩm Mới Nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function show(Request $request, $menuId)
    {
        $menu = Menu::find($menuId);
    
        if (!$menu) {
            return redirect()->route('menus.list')->with('error', 'Không tìm thấy Sản phẩm');
        }
    
        return view('show', [
            'title' => 'Chỉnh sửa Sản Phẩm: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }
    
    public function update(CreateFormRequest $request, $menuId)
    {
        $menu = Menu::find($menuId);
    
        if (!$menu) {
            return redirect()->route('menus.list')->with('error', 'Không tìm thấy Sản Phấm');
        }
    
        $result = $this->menuService->update($request, $menu);
    
        if ($result) {
            return redirect()->route('menus.list')->with('success', 'Cập nhật Sản Phẩm thành công');
        }
    
        return redirect()->back()->with('error', 'Có lỗi khi cập nhật Sản phẩm');
    }
  
    
    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request); 

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Sản Phẩm'
            ]);
        }  

        return response()->json([
            'error' => true
        ]);
    }
}