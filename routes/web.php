<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', App\Http\Controllers\EmployeeController::class);
});

/*Route::post("create-company","App\Http\Controllers\CompanyController@createCompany");

Route::get("companies", "App\Http\Controllers\CompanyController@companiesListing");

Route::get("company/{id}", "App\Http\Controllers\CompanyController@companyDetail");

Route::delete("company/{id}", "App\Http\Controllers\CompanyController@companyDelete");

Route::post("create-employee","App\Http\Controllers\EmployeeController@createEmployee");

Route::get("employees", "App\Http\Controllers\EmployeeController@employeesListing");

Route::get("employee/{id}", "App\Http\Controllers\EmployeeController@employeeDetail");

Route::delete("employee/{id}", "App\Http\Controllers\EmployeeController@employeeDelete");*/
