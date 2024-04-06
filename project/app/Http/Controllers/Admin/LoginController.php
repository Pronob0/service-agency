<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('admin.dashboard'));
        }
        return back()->with('error', 'Sorry! Credentials Mismatch.');
    }

    public function forgotPasswordForm()
    {
        return view('admin.auth.forgot_passowrd');
    }

    public function forgotPasswordSubmit(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()->with('error', 'Sorry! Email doesn\'t exist');
        }

        $admin->verify_code = randNum();
        $admin->save();

        @email([
            'email' => $admin->email,
            'name' => $admin->name,
            'subject' => 'Password Reset Code',
            'message' => 'Password reset code is : ' . $admin->verify_code,
        ]);
        session()->put('email', $admin->email);
        return redirect(route('admin.verify.code'))->with('success', 'A password reset code has been sent to your email.');
    }

    public function verifyCode()
    {
        return view('admin.auth.verify_code');
    }

    public function verifyCodeSubmit(Request $request)
    {
        $request->validate(['code' => 'required|integer']);
        $user = Admin::where('email', session('email'))->first();
        if (!$user) {
            return back()->with('error', 'User doesn\'t exist');
        }

        if ($user->verify_code != $request->code) {
            return back()->with('error', 'Invalid verification code.');
        }
        return redirect(route('admin.reset.password'));
    }

    public function resetPassword()
    {
        return view('admin.auth.reset_password');
    }

    public function resetPasswordSubmit(Request $request)
    {
        $request->validate(['password' => 'required|confirmed|min:5']);
        $admin = Admin::where('email', session('email'))->first();
        $admin->password = bcrypt($request->password);
        $admin->update();
        return redirect(route('admin.login'))->with('success', 'Password reset successful.');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
