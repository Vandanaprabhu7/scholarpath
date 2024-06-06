<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Private_Scholarships;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addScholarship()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user['dropdown'] == 'Admin') {
                return view('admin.newScholarship');
            }
            if ($user['dropdown'] == 'Client') {
                return view('contact.thanks');
            }
        } else {
            return view('login.lpage');
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $token = $user['token'];
        $input = $request->all();
        $user = User::where('token', $token)->first();
        if ($user) {
            $ptoken = $user['token'];
            $pname = $user['fname'];
            $pemail = $user['semail'];
        } else {
            http_response_code(403);
            exit;
        }
        $new = Private_Scholarships::create([
            'ptoken' => $ptoken,
            'pname' => $pname,
            'pemail' => $pemail,
            'sname' => $input['sname'],
            'eligibility' => $input['eligibility'],
            'class' => $input['class'],
            'religion' => $input['religion'],
            'caste' => $input['caste'],
            'income' => $input['income'],
            'state' => $input['state'],
            'customFields' => json_encode($input['customFields']),
        ]);
        $new->save();
        return view('admin.newScholarship');
    }
}
