<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Company;

class CompanyController extends Controller
{
    private $status     =   200;
    // --------------- [ Save Company function ] -------------
    public function createCompany(Request $request) {

        // validate inputs
        $validator          =       Validator::make($request->all(),
            [
                "company_name"      =>      "required",
                "ceo_name"          =>      "required",
                "address"           =>      "required",
                "email"             =>      "required|email", 
                "website"           =>      "required", 
                "phone_number"      =>      "required|numeric"
            ]
        );

        // if validation fails
        if($validator->fails()) {
            return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
        }

        $company_id             =       $request->id;
         $companyArray           =       array(
            "company_name"            =>      $request->company_name,
            "ceo_name"             =>      $request->ceo_name,
            "address"             =>      $request->address,
            "email"                 =>      $request->email,
            "website"           =>          $request->website,
            "phone_number"                 =>      $request->phone_number
        );

        if($company_id !="") {           
            $company              =         Company::find($company_id);
            if(!is_null($company)){
                $updated_status     =       company::where("id", $company_id)->update($companyArray);
                if($updated_status == 1) {
                    return response()->json(["status" => $this->status, "success" => true, "message" => "company detail updated successfully"]);
                }
                else {
                    return response()->json(["status" => "failed", "message" => "Whoops! failed to update, try again."]);
                }               
            }                   
        }

        else {
            $company        =       Company::create($companyArray);
            if(!is_null($company)) {            
                return response()->json(["status" => $this->status, "success" => true, "message" => "company record created successfully", "data" => $company]);
            }    
            else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }
        }        
    }

    // --------------- [ Companies Listing ] -------------------
    public function companiesListing() {
        $companies       =       Company::all();
        if(count($companies) > 0) {
            return response()->json(["status" => $this->status, "success" => true, "count" => count($companies), "data" => $companies]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }

    // --------------- [ Company Detail ] ----------------
    public function companyDetail($id) {
        $company        =       Company::find($id);
        if(!is_null($company)) {
            return response()->json(["status" => $this->status, "success" => true, "data" => $company]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no company found"]);
        }
    }
//---------------- [ Delete Company ] ----------
    public function companyDelete($id) {
        $company        =       Company::find($id);
        if(!is_null($company)) {
            $delete_status      =       Company::where("id", $id)->delete();
            if($delete_status == 1) {
                return response()->json(["status" => $this->status, "success" => true, "message" => "company record deleted successfully"]);
            }
            else{
                return response()->json(["status" => "failed", "message" => "failed to delete, please try again"]);
            }
        }
        else {
            return response()->json(["status" => "failed", "message" => "Whoops! no company found with this id"]);
        }
    }
}