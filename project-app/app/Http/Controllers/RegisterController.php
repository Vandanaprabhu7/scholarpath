<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
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
            return view('contact.create');
        }
    }
    public function store(Request $request)
    {
        $input = $request->all();

        // Add validation rules to check if the email already exists in the database
        $rules = [
            'semail' => 'required|email|unique:users', // Assuming your users table is named 'users'
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // If the email already exists, return an error response
            return redirect()->back()->with('error', 'Email already exists');
        }
        $token = Str::random(30);
        $drop = $request->input('dropdown');
        $user = User::create([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'semail' => $input['semail'],
            'password' => $input['password'],
            'token' => $token,
            'dropdown' => $drop
        ]);
        return view('login.lpage');
    }
    public function change(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('semail', $email)->first();
        if ($user) {
            $user->password = bcrypt($password);
            $user->save();
            return redirect('/login');
        } else {
            echo "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>
            <h1 style='font-size: xx-large; color: #bbb; text-align: center;'>Something went wrong! :(<br>Check the entered details and verify again</h1>
        </div>";
        }
    }
}
