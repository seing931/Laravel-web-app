<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request ->validate([
            'username' =>['required','min:3', 'max:255'],
            'email' =>['required', 'max:255','email','unique:users'],
            'password' =>['required', 'min:3','confirmed'],
        ], [
            'username.required' => 'Please enter your username.',
            'username.min' => 'Username must be at least 3 characters.',
            'email.required' => 'Please enter your email.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        $user = User::create($fields);

        Auth::login($user);
        
        event(new Registered($user));

        return redirect()->route('verification.notice');
    }

    public function verifynotice(){
        return view('auth/emailverify');
    }

    public function verifyemail(EmailVerificationRequest $request){
        $request ->fulfill();
        return redirect()->route('dashboard');
    }

    public function verifyhandler(Request $request){
        $request ->user() ->sendEmailVerificationNotification();
        return back()->with('message','Verification link sent!');
    }

    public function login(Request $request){
        $fields = $request ->validate([
            'email' =>['required', 'max:255','email'],
            'password' =>['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard');
        }else{
            return back()->withErrors(['login' => 'Invalid email or password.'])->withInput();
        }
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
