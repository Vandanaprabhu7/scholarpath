<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user['dropdown'] == 'Admin') {
                return view('contact.thanksAdmin');
            }
            if ($user['dropdown'] == 'Client') {
                return view('contact.thanks');
            }
        } else {
            return view('login.lpage');
        }
    }
    public function check(Request $request)
    {
        $credentials = $request->validate([
            'semail' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('semail', $credentials['semail'])->first();
            $token = $user->token;
            $drop = $user->dropdown;
            if ($drop === 'Admin') {
                return Redirect::route('contact.thanksAdmin');
            } elseif ($drop === 'Client') {
                return Redirect::route('contact.thanks');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid login')->withInput();
        }
    }
    public function notcheck()
    {
        http_response_code(403);
        exit;
    }
    public function password1()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user['dropdown'] == 'Admin') {
                return view('contact.thanksAdmin');
            }
            if ($user['dropdown'] == 'Client') {
                return view('contact.thanks');
            }
        } else {
            return view('login.password1');
        }
    }
    public function password2()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user['dropdown'] == 'Admin') {
                return view('contact.thanksAdmin');
            }
            if ($user['dropdown'] == 'Client') {
                return view('contact.thanks');
            }
        } else {
            return view('login.password2');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home.index');
    }
}
