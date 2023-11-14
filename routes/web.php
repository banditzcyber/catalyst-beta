<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;

// Administrator
use App\Http\Controllers\CompetencyController;
use App\Http\Controllers\PerformanceStandardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileMatrixController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentDetailController;
use App\Http\Controllers\UserLoginController;

use App\Http\Controllers\DashboardFunctController;
use App\Http\Controllers\AldpController;
use App\Http\Controllers\ClosegapController;

// Employees
use App\Http\Controllers\ProfileEmployController;
use App\Http\Controllers\DashboardEmployController;
use App\Http\Controllers\MylearningController;
use App\Http\Controllers\AssessmentEmployeeController;

//Section Manager
use App\Http\Controllers\DashboardSectionController;
use App\Http\Controllers\AldpSectionController;
use App\Http\Controllers\SubordinateController;
use App\Http\Controllers\AssessmentValidationController;

//Department
use App\Http\Controllers\DepartDashboardController;
use App\Http\Controllers\DepartSubordinateController;


use Illuminate\Support\Facades\Redirect;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function() {
//     return view('admin.dashboard.index', [
//         'title'     => 'Dashboard'
//     ]);
// });

// Route::post('/dashboard', [DashboardController::class, 'authenticate']);

// Route::middleware(['auth', 'check.role:1'])->group(function () {
//     Route::resource('/profileEmploy', ProfileEmployController::class);
//     Route::resource('/dashboardEmploy', DashboardEmployController::class);
//     Route::resource('/mylearning', MylearningController::class);
//     Route::resource('/assessmentEmployee', AssessmentEmployeeController::class);
//     Route::get('/formassessment/{id}/{kd_assessment}/{jobcode}', [AssessmentEmployeeController::class, 'form']);
//     Route::post('/saveformassessment', [AssessmentEmployeeController::class, 'saveFormAssessment']);

//     // dashboard
//     // Route::post('/profileEmploy/current', [AssessmentController::class, 'currentData']);
// });

// Route::middleware(['auth', 'check.role:2'])->group(function () {
//     Route::resource('/dashboardSection', DashboardSectionController::class);
//     Route::resource('/aldpSection', AldpSectionController::class);

//     Route::resource('/profileEmploy', ProfileEmployController::class);
//     Route::resource('/dashboardEmploy', DashboardEmployController::class);
//     Route::resource('/mylearning', MylearningController::class);
//     Route::resource('/assessmentEmployee', AssessmentEmployeeController::class);
//     Route::get('/formassessment/{id}/{kd_assessment}/{jobcode}', [AssessmentEmployeeController::class, 'form']);
//     Route::post('/saveformassessment', [AssessmentEmployeeController::class, 'saveFormAssessment']);

//     // dashboard
//     Route::post('/profileEmploy/current', [AssessmentController::class, 'currentData']);
// });


// Route::middleware(['auth', 'check.role:5'])->group(function () {

//     Route::get('/dashboardFunct', [DashboardFunctController::class, 'index']);
//     Route::resource('/competency', CompetencyController::class);
//     Route::resource('/performance', PerformanceStandardController::class);
//     Route::resource('/items', ItemController::class);
//     Route::resource('/matrix', ProfileMatrixController::class);
//     Route::resource('/employees', EmployeeController::class);
//     Route::resource('/assessmentAdmin', AssessmentController::class);
//     Route::resource('/assessmentAdminDetails', AssessmentDetailController::class);
//     Route::resource('/aldpAdmin', AldpController::class);
//     Route::resource('/closegap', ClosegapController::class);
//     Route::resource('/userlogin', UserLoginController::class);

//     // import data
//     Route::post('/competency/import-data', [CompetencyController::class, 'importData']);
//     Route::post('/performance/importData', [PerformanceStandardController::class, 'importData']);
//     Route::post('/items/importData', [ItemController::class, 'importData']);
//     Route::post('/matrix/importData', [ProfileMatrixController::class, 'importData']);
//     Route::post('/employees/importData', [EmployeeController::class, 'importData']);
//     Route::post('/assessment/importData', [AssessmentController::class, 'importData']);


// });

// Access for employee

Route::resource('/profileEmploy', ProfileEmployController::class);
Route::resource('/dashboardEmploy', DashboardEmployController::class);
Route::resource('/mylearning', MylearningController::class);
Route::get('/mylearnig/form/{id}', [MyLearningController::class, 'form']);
Route::get('/mylearnig/details/{id}', [MyLearningController::class, 'show']);
Route::resource('/assessmentEmployee', AssessmentEmployeeController::class);
Route::get('/formassessment/{id}/{kd_assessment}/{jobcode}', [AssessmentEmployeeController::class, 'form']);
Route::post('/saveformassessment', [AssessmentEmployeeController::class, 'saveFormAssessment']);
Route::get('/resultAssessment/{id}/{kd_assessment}/{jobcode}', [AssessmentEmployeeController::class, 'resultAssessment']);
Route::post('/finishForm', [AssessmentEmployeeController::class, 'finishForm']);

// dashboard
Route::get('/profileEmploy/current', [ProfileEmployController::class, 'shojw']);
Route::get('/listItems', [ProfileEmployController::class, 'listItem']);
// Route::get('/current', [ProfileEmployController::class, 'index ']);

// Access form Manager
Route::resource('/dashboardSection', DashboardSectionController::class);
Route::resource('/aldpSection', AldpSectionController::class);
Route::get('/aldpSection/functional/{id_aldp}', [AldpSectionController::class, 'formFunctional']);
Route::get('/aldpSection/cnl/{id_aldp}', [AldpSectionController::class, 'create']);
Route::get('/aldpSection/other/{id_aldp}', [AldpSectionController::class, 'create']);
Route::get('/participant/{aldp_detail_id}/{aldp_id}', [AldpSectionController::class, 'formParticipant']);
Route::post('/deleteParticipant', [AldpSectionController::class, 'deleteParticipat']);
Route::post('/addParticipant', [AldpSectionController::class, 'addParticipant']);
Route::get('/subordinate', [SubordinateController::class, 'index']);
Route::get('/subordinate/profile/{employee_id}', [SubordinateController::class, 'profile']);
Route::get('/assessmentValidation', [AssessmentValidationController::class, 'index']);



//Access from department
Route::get('/departmentDashboard', [DepartDashboardController::class, 'index']);
Route::get('/departSubordinate', [DepartSubordinateController::class, 'index']);
Route::get('/departSubordinate/profile/{employee_id}', [DepartSubordinateController::class, 'profile']);

// Access for admin
Route::get('/dashboardFunct', [DashboardFunctController::class, 'index']);
Route::resource('/competency', CompetencyController::class);
Route::resource('/performance', PerformanceStandardController::class);
Route::resource('/items', ItemController::class);
Route::resource('/matrix', ProfileMatrixController::class);
Route::resource('/employees', EmployeeController::class);
Route::resource('/assessmentAdmin', AssessmentController::class);
Route::resource('/assessmentAdminDetails', AssessmentDetailController::class);
Route::resource('/aldpAdmin', AldpController::class);
Route::resource('/closegap', ClosegapController::class);
Route::resource('/userlogin', UserLoginController::class);
Route::post('/updateStatus', [ClosegapController::class, 'updateStatus']);

Route::get('/create', [ClosegapController::class, 'create']);
Route::get('/store', [ClosegapController::class, 'store']);
Route::get('/read', [ClosegapController::class, 'read']);
Route::get('/onprogress', [ClosegapController::class, 'onprogress']);
Route::get('/show/{id}', [ClosegapController::class, 'show']);
Route::get('/update/{id}', [ClosegapController::class, 'updateData']);

// competency
Route::get('/formCompetency', [CompetencyController::class, 'form']);
Route::get('/saveData', [CompetencyController::class, 'saveData']);

// import data
Route::post('/competency/import-data', [CompetencyController::class, 'importData']);
Route::post('/performance/importData', [PerformanceStandardController::class, 'importData']);
Route::post('/items/importData', [ItemController::class, 'importData']);
Route::post('/matrix/importData', [ProfileMatrixController::class, 'importData']);
Route::post('/employees/importData', [EmployeeController::class, 'importData']);
Route::post('/assessment/importData', [AssessmentController::class, 'importData']);


// administrator
// Route::resource('/competency', CompetencyController::class);
// Route::resource('/performance', PerformanceStandardController::class);
// Route::resource('/items', ItemController::class);
// Route::resource('/matrix', ProfileMatrixController::class);
// Route::resource('/employees', EmployeeController::class);
// Route::resource('/assessmentAdmin', AssessmentController::class);
// Route::resource('/assessmentAdminDetails', AssessmentDetailController::class);
// Route::resource('/aldpAdmin', AldpController::class);
// Route::resource('/closegap', ClosegapController::class);
// Route::resource('/userlogin', UserLoginController::class);

// Route::post('/competency/import-data', [CompetencyController::class, 'importData']);


// employees
// Route::resource('/profileEmploy', ProfileEmployController::class);
// Route::resource('/dashboardEmploy', DashboardEmployController::class);
// Route::resource('/mylearning', MylearningController::class);
// Route::resource('/assessmentEmployee', AssessmentEmployeeController::class);
// Route::get('/formassessment/{id}/{kd_assessment}/{jobcode}', [AssessmentEmployeeController::class, 'form']);
// Route::post('/saveformassessment', [AssessmentEmployeeController::class, 'saveFormAssessment']);



//Section Manager
// Route::resource('/dashboardSection', DashboardSectionController::class);
// Route::resource('/aldpSection', AldpSectionController::class);
