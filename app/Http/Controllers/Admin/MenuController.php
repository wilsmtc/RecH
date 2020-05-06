<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Http\Requests\ValidacionMenu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menu.crear');
    }

    public function store(ValidacionMenu $request)
    {
        menu::create($request->all());        
        return redirect('admin/menu/crear')->with ('mensaje','Menu creado con exito');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data=Menu::findOrFail($id);
        return view('admin.menu.editar', compact('data'));
    }

    public function update(ValidacionMenu $request, $id)
    {
        Menu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('mensaje', 'Menú actualizado con exito');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect('admin/menu')->with('mensaje', 'Menú eliminado con exito');
        
    }
    //funcion para guardar los menus
    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
