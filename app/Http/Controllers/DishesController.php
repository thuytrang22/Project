<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DishesRequest;
use App\Models\Dishe;

class DishesController extends Controller
{
    public function index()
    {
        return view('admins.dishes.index');
    }

    public function create()
    {
        return view('admins.dishes.create');
    }

    public function store(DishesRequest $request)
    {
        $data = [
            'name' => $request->input('name'),
            'public' => $request->input('public'),
            'detail' => $request->input('detail'),
            'price' => $request->input('price'),
        ];
        dd($data);

        Dishe::create($data);
    
        return redirect()->route('create')->with('store', 'success');
    }
    

    // public function show(User $user)
    // {
    //     return view('users.show', [
    //         'user' => $user
    //     ]);

    // }

    // public function edit(User $user)
    // {
    //     return view('users.edit', [
    //         'user' => $user
    //     ]);
    // }

    // public function update(EditRequests $request)
    // {
    //     $user = $request->validated();
    //     $user->update([
    //         'full_name' => ucwords($request->full_name),
    //         'birthday' => $request->birthday,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'address' => ucwords($request->address),
    //     ]);
    //     return to_route('users.index')->with('update', 'success');
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return back()->with('success', 'User has been deleted successfully');
    // }
}
