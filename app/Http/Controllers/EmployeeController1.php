<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\User;

class EmployeeController extends Controller
{
    private $status     =   200;
    // --------------- [ Save Employee function ] -------------
    public function createEmployee(Request $request) {

        // validate inputs
        $validator          =       Validator::make($request->all(),
            [
                "passport_number"   =>      "required|alpha_num",
                "first_name"        =>      "required", 
                "last_name"         =>      "required", 
                "position"          =>      "required", 
                "phone_number"      =>      "required|numeric",
                "address"           =>      "required",
                "current_company"   =>      "required"
            ]
        );

        // if validation fails
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $employee_id             =       $request->id;
         $employeeArray           =       array(
            "passport_number"            =>      $request->passport_number,
            "first_name"             =>      $request->first_name,
            "last_name"             =>      $request->last_name,
            "position"                 =>      $request->position,
            "phone_number"           =>          $request->phone_number,
            "address"                 =>      $request->address,
            "current_company"       =>      $request->current_company
        );

        if($employee_id !="") {           
            $employee              =         Employee::find($employee_id);
            if(!is_null($employee)){
                $updated_status     =       employee::where("id", $employee_id)->update($employeeArray);
                if($updated_status == 1) {
                    return response()->json(["status" => $this->status, "success" => true, "message" => "employee detail updated successfully"]);
                }
                else {
                    return response()->json(["status" => "failed", "message" => "Whoops! failed to update, try again."]);
                }               
            }                   
        }

        else {
            $employee        =       Employee::create($employeeArray);
            if(!is_null($employee)) {            
                return response()->json(["status" => $this->status, "success" => true, "message" => "employee record created successfully", "data" => $employee]);
            }    
            else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }
        }        
    }

    // --------------- [ Employees Listing ] -------------------
    public function employeesListing() {
        $employees       =       Employee::all();
        if(count($employees) > 0) {
            return response()->json(["status" => $this->status, "success" => true, "count" => count($employees), "data" => $employees]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }

    // --------------- [ Employee Detail ] ----------------
    public function employeeDetail($id) {
        $employee        =       Employee::find($id);
        if(!is_null($employee)) {
            return response()->json(["status" => $this->status, "success" => true, "data" => $employee]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no employee found"]);
        }
    }
//---------------- [ Delete Employee ] ----------
    public function employeeDelete($id) {
        $employee        =       Employee::find($id);
        if(!is_null($employee)) {
            $delete_status      =       Employee::where("id", $id)->delete();
            if($delete_status == 1) {
                return response()->json(["status" => $this->status, "success" => true, "message" => "employee record deleted successfully"]);
            }
            else{
                return response()->json(["status" => "failed", "message" => "failed to delete, please try again"]);
            }
        }
        else {
            return response()->json(["status" => "failed", "message" => "Whoops! no employee found with this id"]);
        }
    }
}