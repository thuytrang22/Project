<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\CreateCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRquest;

class CategoriesController extends Controller
{
    public function index (Request $request)
    {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = Categories::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $categories = $query->paginate(6);
        return view ('admins.categories.index', compact('categories', 'keywords', 'sortBy', 'sortDirection'));
    }

    public function create()
    {
        return view('admins.categories.create');
    }

    public function store(CreateCategoriesRequest $request)
    {
        $data = [
            'name' => $request->input('name')
        ];
        Categories::create($data);
        return redirect()->route('categories')->with('store', 'success');
    }

    public function edit(Categories $id)
    {
        return view('admins.categories.edit', [
            'category' => $id
        ]);
    }

    public function update(UpdateCategoriesRquest $request)
    {
        $category = Categories::find($request->id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories')->with('update', 'success');
    }

    public function destroy($id)
    {
        Categories::destroy($id);
        return redirect()->route('categories')->with('destroy', 'success');
    }
}
