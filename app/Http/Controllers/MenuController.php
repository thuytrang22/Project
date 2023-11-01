<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateMenuRequsest;
use App\Http\Requests\UpdateMenuRequsest;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->input('keywords');

        $query = Menu::orderBy('id', 'desc');

        if (!empty($keywords)) {
            $query->where('name', 'like', '%' . $keywords . '%');
        }

        $menus = $query->paginate(6);

        return view('admins.menu', compact('menus', 'keywords'));
    }

    public function create()
    {
        return view('admins.menu');
    }

    public function store(CreateMenuRequsest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'public' => $request->file('public')->store('public'),
            'detail' => $request->input('detail'),
            'option' => $request->input('option'),
            'price' => $request->input('price'),
        ];
        Menu::create($data);
        return redirect()->route('menu')->with('store', 'success');
    }

    public function show(Menu $menu)
    {

        return view('admins.menu', [
            'menu' => $menu
        ]);
    }

    public function edit(Menu $menu)
    {
        return view('admins.menu', [
            'menu' => $menu
        ]);
    }

    public function update(UpdateMenuRequsest $request)
    {
        $menu = Menu::find($request->id);
        $menu->name = $request->name;
        $menu->detail = $request->detail;
        $menu->option = $request->option;
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

        return redirect()->route('menu')->with('update', 'success');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menu')->with('destroy', 'success');
    }
}
