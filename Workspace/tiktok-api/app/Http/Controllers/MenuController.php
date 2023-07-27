<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFormRequest; 

use App\Http\Services\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService) 
    {
        $this->menuService = $menuService;
    }

    public function create() 
    {
        return view('add', [
            'title'=> 'Thêm Danh Mục Mới',
            'menus'=> $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuService->create($request);

        if ($result) {
            return redirect()->route('menus.list')->with('success', 'Tạo danh mục thành công');
        }

        return redirect()->back()->with('error', 'Có lỗi khi tạo danh mục');
    }


    public function index() {
        return view('list', [
            'title' => 'Danh Sách Danh Mục Mới Nhất',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function show(Request $request, $menuId)
    {
        $menu = Menu::find($menuId);
    
        if (!$menu) {
            return redirect()->route('menus.list')->with('error', 'Không tìm thấy danh mục');
        }
    
        return view('show', [
            'title' => 'Chỉnh sửa danh mục: ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }
    
    public function update(CreateFormRequest $request, $menuId) 
    {
        $menu = Menu::find($menuId);
    
        if (!$menu) {
            return redirect()->route('menus.list')->with('error', 'Không tìm thấy danh mục');
        }
    
        $result = $this->menuService->update($request, $menu);
    
        if ($result) {
            return redirect()->route('menus.list')->with('success', 'Cập nhật danh mục thành công');
        }
    
        return redirect()->back()->with('error', 'Có lỗi khi cập nhật danh mục');
    }
  
    
    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request); 

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
