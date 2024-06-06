<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function getUserInfo()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                return view('profiles.profile_info', [
                    'userData' => $user,
                ]);
            } else {
                http_response_code(403);
                exit;
            }
        } else {
            return view('login.lpage');
        }
    }
    public function edit()
    {
        $user = Auth::user();
        $user = User::where('token', $user['token'])->first();

        return view('profiles.profile_edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user = User::where('token', $user['token'])->first();

        if ($user) {
            // Validate the request
            $request->validate([
                'fname' => 'required|string|max:255',
                'lname' => 'nullable|string|max:255',
                'semail' => 'required|email|unique:users,semail,' . $user->id,
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                // Add validation rules for other fields
            ]);
            if ($request->hasFile('image')) {
                $image_name = time() . '.' . $request->image->extension();
                $request->image->move(public_path('users'), $image_name);
                $path = "/users/" . $image_name;
                $user->image = $path;
            }
            // Update the user's information in the database
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->semail = $request->input('semail');

            // Update other fields as needed
            $user->save();

            return redirect()->route('profile.info')
                ->with('success', 'Profile updated successfully');
        } else {
            // Handle the case when the user with the provided token is not found
            return redirect()->route('profile.info')
                ->with('error', 'User not found');
        }
    }

    public function destroy()
    {
        $user = Auth::user();
        $user = User::where('token', $user['token'])->first();
        if ($user) {
            // Delete the user's account
            $user->delete();

            // Log the user out
            Auth::logout();

            return redirect()->route('home.index')->with('status', 'profile-deleted');
        }
        return redirect()->route('profile.info', ['token' => $user['token']])
            ->with('error', 'Account deletion failed');
    }
}
