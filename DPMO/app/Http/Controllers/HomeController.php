<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ParentMenu;
use App\Models\User;
use App\Models\Role;

class HomeController extends Controller
{
    public static function getMenus()
    {
        $user = Auth::user();

        if (!$user) {
            return collect(); 
        }

        $roleAcc = Role::where('rolecode', $user->rolecode)->first();
        
        if (!$roleAcc) {
            return collect(); 
        }

        $menus = ParentMenu::with(['menus' => function ($query) {
            $query->orderBy('orderno');
        }])->orderBy('orderno')->get();

        // Filter based on role permissions
        $filteredMenus = $menus->map(function ($menu) use ($roleAcc) {
            // Filter submenus based on permissions
            $menu->menus = $menu->menus->filter(function ($submenu) use ($roleAcc) {
                if ($submenu->url == '/config' && $roleAcc->config == 0) {
                    return false;
                }
                if ($submenu->url == '/dept' && $roleAcc->dept == 0) {
                    return false;
                }
                if ($submenu->url == '/role' && $roleAcc->role == 0) {
                    return false;
                }
                if ($submenu->url == '/mguser' && $roleAcc->mguser == 0) {
                    return false;
                }
                if ($submenu->url == '/log' && $roleAcc->log == 0) {
                    return false;
                }
                return true;
            });

            return $menu;
        })->filter(function ($menu) {
            // If the parent menu has no submenus left, hide it
            return !$menu->menus->isEmpty() || !empty($menu->url);
        });

        return $filteredMenus;
    }

    public function dashboard(){
        return view('home.dashboard');
    }

    public function profile(){
        $user = Auth::user(); 
        return view('home.profile', compact('user'));
    }

    public function updateprofile(Request $request)
    {
        $request->validate([
            'username' =>['required','min:3', 'max:255']
        ], [
            'username.required' => 'Please enter your username.',
            'username.min' => 'Username must be at least 3 characters.'
        ]);

        $user = User::find(Auth::id()); 
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not authenticated.']);
        }

        $user->username = $request->username;
        $user->save(); 
        
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function resetpassword(){
        $userId = Auth::id();
        $password = User::where('id', $userId)->value('password');
        return view('home.resetpassword', compact('password'));
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'newpassword' => 'required|min:3',
            'confirmpassword' => 'required|same:newpassword',
        ], [
            'confirmpassword.same' => 'The confirmation password does not match.',
        ]);
        $user = User::find(Auth::id()); 
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not authenticated.']);
        }
        $user->update(['password' => Hash::make($request->newpassword)]); 
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
