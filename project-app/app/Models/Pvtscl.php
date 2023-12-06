<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pvtscl extends Model
{
    use HasFactory;
    protected $table = 'pvtscl';

    protected $fillable = [
        'sclname',
        'eligibility',
        'gender',
        'state',
        'link',
        'pname',
        'pemail',
        'sclimg',
        'aadhar',
        'caste_certificate',
        'income_certificate',
        'domicile_certificate',
        'mark_sheets',
        'fee_receipt',
        'passport_photo',
        'token',
        'applications'
    ];
}
