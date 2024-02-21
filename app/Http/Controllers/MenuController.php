<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateMenuRequsest;
use App\Http\Requests\UpdateMenuRequsest;

class MenuController extends Controller
{
    public function index(Request $request, Categories $category)
{
    $keywords = $request->input('keywords');
    $sortBy = $request->input('sortBy', 'id');
    $sortDirection = $request->input('sortDirection', 'desc');

    $query = Menu::orderBy($sortBy, $sortDirection);

    if (!empty($keywords)) {
        $query->where(function ($query) use ($keywords) {
            $query->where('name', 'like', '%' . $keywords . '%');
        });
    }
    $menus = $query->paginate(5);
    return view('admins.menus.index', compact('menus', 'keywords', 'sortBy', 'sortDirection', 'category'));
}
    
    public function create( Categories $category)
    {
        return view('admins.menus.create', compact('category'));
    }

    public function store(CreateMenuRequsest $request, Categories $category)
    {
        $data = [
            'name' => $request->input('name'),
            'public' => $request->file('public')->store('public'),
            'detail' => $request->input('detail'),
            'id_category' => $request->input('id_category'),
            'price' => $request->input('price'),
        ];

        Menu::create($data);

        return redirect()->route('category.menus', ['category' => $category])->with('store', 'success');

    }

    public function show($categoryId, $id) {
        $category = Categories::findOrFail($categoryId);
        $menu = Menu::findOrFail($id);
        return view('admins.menus.show', ['category' => $category], ['menu' => $menu]);
    }
    

    public function edit($categoryId, $id)
    {
        $category = Categories::findOrFail($categoryId);
        $menu = Menu::findOrFail($id);
        return view('admins.menus.edit', ['menu' => $menu, 'category' => $category]);
    }

    public function update(UpdateMenuRequsest $request, Categories $category)
    {
        $menu = Menu::find($request->id);
        $menu->name = $request->name;
        $menu->detail = $request->detail;
        $menu->id_category = $request->id_category;
        $menu->price = ucwords($request->price);

        if ($request->hasFile('public')) {
            Storage::delete($request->public);
            $public = $request->file('public');
            $path = $public->store('public');
            $menu->public = $path;
        } else {
            $menu->public = $request->old_public;
        }

        $menu->save();

        return redirect()->route('category.menus', ['category' => $category])->with('update', 'success');
    }

    public function destroy($id, $menuId)
    {
        Menu::destroy($menuId);
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->back()->with('error', 'Menu not found');
        }

        $category = $menu->category;

        $menu->delete();

        return redirect()->route('category.menus', ['category' => $category])->with('success', 'Menu deleted successfully');
    }
}
