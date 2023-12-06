<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            return view('home.index');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function thanks()
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
            return view('home.index');
        }
    }
    public function thanksAdmin()
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
            return view('home.index');
        }
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
