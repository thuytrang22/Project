<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admins.dashboards.index');
    }

    public function profile()
    {
        if (Auth::check()) {
            // $user = Auth::user();
            return view('admins.dashboards.profile');
        }
    }
    
    public function editProfile (Request $request) {
        $userID = Auth::id();
        $user = User::find($userID);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('image')) {
            Storage::delete($request->image);
            $image = $request->file('image');
            $path = $image->store('public');
            $user->image = $path;
        } else {
            $user->image = $request->old_image;
        }

        $user->save();

        return redirect()->route('profile')->with('update', 'success');
    }

    public function changePassword (Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('profile')->with('success', 'Mật khẩu đã được thay đổi thành công.');
        }
        return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.'])->withInput();
    }
    
    public function listUsers (Request $request) {
        $keywords = $request->input('keywords');
        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'desc');
    
        $query = User::orderBy($sortBy, $sortDirection);
    
        if (!empty($keywords)) {
            $query->where(function ($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords . '%');
            });
        }
    
        $users = $query->paginate(5);

        return view('admins.dashboards.list-users', compact('users', 'keywords', 'sortBy', 'sortDirection'));
    }
}
