<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade
use App\Models\Scholarship;
use Illuminate\support\Facades\Auth;
use App\Models\User;
use App\Models\Pvtscl;

class ScholarshipController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            // Retrieve all scholarships initially
            $scholarships = Scholarship::all();

            // Check if gender and state parameters are present in the request
            $genderFilter = $request->input('gender');
            $stateFilter = $request->input('state');

            // Filter scholarships based on selected gender
            if ($genderFilter) {
                $scholarships = $scholarships->where('gender', $genderFilter);
            }

            // Filter scholarships based on selected state
            if ($stateFilter) {
                $scholarships = $scholarships->where('state', $stateFilter);
            }

            return view('scholarships.index', compact('scholarships'));
        } else {
            return view('home.index');
        }
    }
    public function privateInstituteScholarships()
    {
        if (Auth::check()) {
            // Fetch data from the database (assuming 'pvtscl' is the table name)
            $scholarships = DB::table('pvtscl')->get();

            // Pass the data to the view in the 'scholarships' directory
            return view('scholarships.pvtscl', ['scholarships' => $scholarships]);
        } else {
            return view('home.index');
        }
    }
    public function allscholarships()
    {
        if (Auth::check()) {
            $govtscholarships = DB::table('scl')->get();
            $pvtscholarships = DB::table('pvtscl')->get();
            return view('scholarships.allscholarships', ['govtscholarships' => $govtscholarships, 'pvtscholarships' => $pvtscholarships]);
        } else {
            return view('home.index');
        }
    }
    public function apply($ptoken, $id)
    {
        $provider = User::where('token', $ptoken)->first();
        $scl = Pvtscl::where('id', $id)->first();
        if ($scl['token'] == $ptoken) {
            return view('scholarships.applications', ['scl' => $scl]);
        } else {
            http_response_code(403);
            exit;
        }
    }
    public function applypost($ptoken, $id, Request $request)
    {
        $user = Auth::user();
        $utoken = $user->token;
        $user = User::where('token', $utoken)->first();
        $scl = Pvtscl::where('token', $ptoken)->first();
        $filepath1 = null;
        $filepath2 = null;
        $filepath3 = null;
        $filepath4 = null;
        $filepath5 = null;
        $filepath6 = null;
        $filepath7 = null;

        if ($request->hasFile('aadhar')) {
            $file1_name = time() . 'aadhar.' . "pdf";
            $request->file('aadhar')->move(public_path('users'), $file1_name);
            $filepath1 = "/uploads/" . $file1_name;
        }
        if ($request->hasFile('caste_certificate')) {
            $file2_name = time() . 'caste_certificate.' . "pdf";
            $request->file('caste_certificate')->move(public_path('users'), $file2_name);
            $filepath2 = "/uploads/" . $file2_name;
        }

        if ($request->hasFile('income_certificate')) {
            $file3_name = time() . 'income_certificate.' . "pdf";
            $request->file('income_certificate')->move(public_path('users'), $file3_name);
            $filepath3 = "/uploads/" . $file3_name;
        }
        if ($request->hasFile('domicile_certificate')) {
            $file4_name = time() . 'domicile_certificate.' . "pdf";
            $request->file('domicile_certificate')->move(public_path('users'), $file4_name);
            $filepath4 = "/uploads/" . $file4_name;
        }
        if ($request->hasFile('mark_sheets')) {
            $file5_name = time() . 'mark_sheets.' . "pdf";
            $request->file('mark_sheets')->move(public_path('users'), $file5_name);
            $filepath5 = "/uploads/" . $file5_name;
        }
        if ($request->hasFile('fee_receipt')) {
            $file6_name = time() . 'fee_receipt.' . "pdf";
            $request->file('fee_receipt')->move(public_path('users'), $file6_name);
            $filepath6 = "/uploads/" . $file6_name;
        }
        if ($request->hasFile('passport_photo')) {
            $file7_name = time() . '.' . 'pdf';
            $request->file('passport_photo')->move(public_path('users'), $file7_name);
            $filepath7 = "/uploads/" . $file7_name;
        }
        $sclapplications = json_decode($scl->applications, true) ?? [];
        $newApplication = [
            'name' => $request['name'],
            'address' => $request['address'],
            'phoneno' => $request['phoneno'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'filepath1' => $filepath1,
            'filepath2' => $filepath2,
            'filepath3' => $filepath3,
            'filepath4' => $filepath4,
            'filepath5' => $filepath5,
            'filepath6' => $filepath6,
            'filepath7' => $filepath7,
        ];

        $sclapplications[] = $newApplication;
        $scl['applications'] = json_encode($sclapplications);
        $scl->save();

        $userapplications = json_decode($user->myapplications, true) ?? [];
        $newuserapplication = [
            'name' => $request['name'],
            'address' => $request['address'],
            'phoneno' => $request['phoneno'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'filepath1' => $filepath1,
            'filepath2' => $filepath2,
            'filepath3' => $filepath3,
            'filepath4' => $filepath4,
            'filepath5' => $filepath5,
            'filepath6' => $filepath6,
            'filepath7' => $filepath7,
        ];

        $userapplications[] = $newuserapplication;
        $user['myapplications'] = json_encode($userapplications);
        $user->save();
        return redirect()->route('contact.thanks');
    }
}
