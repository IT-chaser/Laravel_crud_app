<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("create-company","CompanyController@createCompany");

Route::get("companys", "CompanyController@companysListing");

Route::get("company/{id}", "CompanyController@companyDetail");

Route::delete("company/{id}", "CompanyController@companyDelete");

Route::post("create-employee","EmployeeController@createEmployee");

Route::get("employees", "EmployeeController@employeesListing");

Route::get("employee/{id}", "EmployeeController@employeeDetail");

Route::delete("employee/{id}", "EmployeeController@employeeDelete");