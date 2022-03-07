<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\EmployeeController;

class Employee extends Model
{   
    use HasFactory;
    protected $fillable = [
        "passport_number", "first_name", "last_name", "position", "phone_number", "address", "current_company"
    ];
}
