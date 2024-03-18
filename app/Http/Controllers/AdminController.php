<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Infor;
use App\Models\Seating;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $numberOfUser = Infor::select('phone')->groupBy('phone')->get();
        $totalTable = Seating::count();
        $numberOfSeating = Seating::where('working', '<>', '0')
            ->orWhere('pending', '<>', '0')
            ->count();
        $performance = $totalTable ? $numberOfSeating / $totalTable * 100 . '%' : '0%';
        $users = DB::table('infor')
            ->select(DB::raw('max(name) as name, phone, count(id) as number_of_booking'))
            ->groupBy('phone')
            ->orderBy('number_of_booking', 'DESC')
            ->paginate(5);

        $feedbacks = Feedback::orderBy('id', 'desc')->paginate(5);

        $data = [
            'numberOfUser' => count($numberOfUser),
            'numberOfSeating' => $numberOfSeating,
            'performance' => $performance,
            'users' => $users,
        ];

        return view('admins.dashboards.index', ['data' => $data, 'feedbacks' => $feedbacks]);
    }

    public function profile()
    {
        if (Auth::check()) {
            return view('admins.dashboards.profile');
        }
    }

    public function editProfile(Request $request)
    {
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

    public function changePassword(Request $request)
    {
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

    public function listUsers(Request $request)
    {
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
