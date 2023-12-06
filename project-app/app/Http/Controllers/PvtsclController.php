<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\support\facades\Auth;
use App\Models\Pvtscl;
use Illuminate\Http\Request;
use App\Models\User;

class PvtsclController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user['dropdown'] == 'Admin') {
                return view('contact.addscl');
            }
            if ($user['dropdown'] == 'Client') {
                return view('contact.thanks');
            }
        } else {
            return view('home.index');
        }
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $token = $user['token'];
        $data = $request->validate([
            'sclname' => 'required',
            'eligibility' => 'required',
            'gender' => 'required',
            'state' => 'required',
            'link' => 'required',
        ]);

        $data['aadhar'] = $request->has('aadhar');
        $data['caste_certificate'] = $request->has('caste_certificate');
        $data['income_certificate'] = $request->has('income_certificate');
        $data['domicile_certificate'] = $request->has('domicile_certificate');
        $data['mark_sheets'] = $request->has('mark_sheets');
        $data['fee_receipt'] = $request->has('fee_receipt');
        $data['passport_photo'] = $request->has('passport_photo');
        $data['token'] = $token;
        $user = User::where('token', $token)->first();
        $data['pname'] = $user['fname'];
        $data['pemail'] = $user['semail'];
        Pvtscl::create($data);
        return redirect('/thanksAdmin')->with('success', 'Form submitted successfully!');
    }

    public function index()
    {
        $pvtsclData = Pvtscl::all();

        return view('scholarships.pvtscl', compact('pvtsclData'));
    }
    public function myScholarships(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user['dropdown'] == 'Admin') {
                $token = $user['token'];
                $pvtsclData = Pvtscl::where('token', $token)->get();

                // Check if there is any scholarship data
                if ($pvtsclData->count() > 0) {
                    // Get the first scholarship (assuming you only want to display one in case of multiple)
                    $firstScholarship = $pvtsclData->first();

                    // Check if the token from local storage matches the token in the table
                    if ($firstScholarship->token == $token) {
                        // Display the scholarship name
                        $sclname = $firstScholarship->sclname;

                        // Pass the data to the view
                        return view('scholarships.myscl', compact('pvtsclData', 'sclname'));
                    }
                }

                // If no matching scholarship is found or token doesn't match, you can handle it accordingly
                return view('scholarships.myscl', compact('pvtsclData'))->with('error', 'No matching scholarship found.');
            }
            if ($user['dropdown'] == 'Client') {
                return view('contact.thanks');
            }
        } else {
            return view('home.index');
        }
    }
}
