<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post("create-company","CompanyController@createCompany");

Route::get("companys", "CompanyController@companysListing");

Route::get("company/{id}", "CompanyController@companyDetail");

Route::delete("company/{id}", "CompanyController@companyDelete");

Route::post("create-employee","EmployeeController@createEmployee");

Route::get("employees", "EmployeeController@employeesListing");

Route::get("employee/{id}", "EmployeeController@employeeDetail");

Route::delete("employee/{id}", "EmployeeController@employeeDelete");