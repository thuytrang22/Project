<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function store()
    {
        $request->validate([
            'name_dis' => 'required|string',
            'birthday' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ]);
        User::create([
            'full_name' => ucwords($request->full_name),
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => ucwords($request->address),
        ]);
        return to_route('users.index')->with('store', 'success');
    }

    
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user
        ]);

    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(EditRequests $request)
    {
        $user = $request->validated();
        $user->update([
            'full_name' => ucwords($request->full_name),
            'birthday' => $request->birthday,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => ucwords($request->address),
        ]);
        return to_route('users.index')->with('update', 'success');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User has been deleted successfully');
    }
}
