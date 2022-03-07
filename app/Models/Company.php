<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CompanyController;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        "company_name", "ceo_name", "address", "email", "website", "phone_number"
    ];
}
