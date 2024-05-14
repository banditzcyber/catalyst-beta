<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginLocalController;
// use App\Http\Controllers\RegisterController;

use App\Http\Controllers\SSO\ProfileEmployeeController;

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
use App\Http\Controllers\CloseGapController;

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
use App\Http\Controllers\DepartAssessmentValidationController;
use App\Http\Controllers\DepartAldpController;


use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

use Dcblogdev\MsGraph\Models\MsGraphToken;
use App\Http\Controllers\MicrosoftAuthController;

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



Route::get('/login', 'LoginController@redirectToAzure');
Route::get('/connect', 'LoginController@handleAzureCallback');


// MICROSOFT LOGIN
// Route::get('/',[LoginController::class,'signInForm'])->name('sign.in');
Route::get('/', [LoginController::class, 'signInForm'])->name('sign.in');
Route::get('microsoft-oAuth', [LoginController::class, 'microsoftOAuth'])->name('microsoft.oAuth');
Route::get('authenticate', [LoginController::class, 'microsoftOAuthCallback'])->name('microsoft.oAuth.callback');



// Route::get('/', [LoginController::class, 'index']);
Route::get('/formLogin', [LoginLocalController::class, 'formLogin']);
Route::post('/signin', [LoginLocalController::class, 'login']);
// Route::post('/authenticate', [LoginController::class, 'authenticate']);
Route::post('/signout', [LoginLocalController::class, 'logout']);
// Route::get('/auth-azure', [LoginController::class, 'authAzure']);



// ----------------------------------------Access for employee----------------------------------------------------

Route::resource('/profilessoemployee', ProfileEmployController::class);
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
Route::get('/profileEmploy/current', [ProfileEmployController::class, 'show']);
Route::get('/listItems', [ProfileEmployController::class, 'listItem']);
// Route::get('/current', [ProfileEmployController::class, 'index ']);

// ------------------------------------ Access form Section Manager -----------------------------------------------------------
Route::resource('/dashboardSection', DashboardSectionController::class);

// # menu ALDP
Route::resource('/aldpSection', AldpSectionController::class);
Route::get('/aldpSection/functional/{id_aldp}', [AldpSectionController::class, 'formFunctional']);
Route::get('/aldpSection/leadership/{id_aldp}', [AldpSectionController::class, 'formLeadership']);
Route::get('/aldpSection/other/{id_aldp}', [AldpSectionController::class, 'formOther']);
Route::get('/participant/{aldp_detail_id}/{aldp_id}/{item_id}', [AldpSectionController::class, 'formParticipant']);
Route::post('/deleteItemAldp', [AldpSectionController::class, 'deleteItemAldp']);
Route::post('/deleteParticipant', [AldpSectionController::class, 'deleteParticipat']);
Route::post('/addParticipant', [AldpSectionController::class, 'addParticipant']);
Route::post('/submitForm', [AldpSectionController::class, 'submitForm']);
Route::post('/submitFormOther', [AldpSectionController::class, 'submitFormOther']);
Route::get('/detailVerify/{id}', [AldpSectionController::class, 'showVerify']);
Route::get('/aldpSection/edit/{id}', [AldpSectionController::class, 'editData']);
Route::get('/aldpSection/editCnl/{id}', [AldpSectionController::class, 'editData']);
Route::post('/aldpSection/update', [AldpSectionController::class, 'updateData']);

Route::get('/subordinate', [SubordinateController::class, 'index']);
Route::get('/subordinate/profile/{employee_id}', [SubordinateController::class, 'profile']);
Route::get('/subordinate/current/{employee_id}', [SubordinateController::class, 'current']);
Route::get('/subordinate/items/{employee_id}', [SubordinateController::class, 'items']);

Route::get('/assessmentValidation', [AssessmentValidationController::class, 'index']);
Route::get('/assessmentValidation/show/{id}', [AssessmentValidationController::class, 'show']);
Route::post('/savevalidationform', [AssessmentValidationController::class, 'saveFormAssessment']);

Route::get('/reviewAssessment/{id}/{kd_assessment}/{jobcode}', [AssessmentValidationController::class, 'reviewAssessment']);
Route::post('/finishFormValidation', [AssessmentValidationController::class, 'finishFormValidation']);


// ------------------------------------------ Access from department -----------------------------------------------
Route::get('/departmentDashboard', [DepartDashboardController::class, 'index']);
Route::get('/departSubordinate', [DepartSubordinateController::class, 'index']);
Route::get('/departSubordinate/profile/{employee_id}', [DepartSubordinateController::class, 'profile']);

Route::get('/assessmentValidationDepartment', [DepartAssessmentValidationController::class, 'index']);
Route::get('/assessmentValidationDepartment/show/{id}', [DepartAssessmentValidationController::class, 'show']);
Route::post('/finishFormValidationDepartment', [DepartAssessmentValidationController::class, 'finishFormValidation']);

Route::post('/departSubordinate', [DepartSubordinateController::class, 'finishFormValidation']);

Route::get('/departAldp', [DepartAldpController::class, 'index']);
Route::get('/departAldpShow/{id}', [DepartAldpController::class, 'show']);
Route::get('/departAldp/functional/{id_aldp}', [DepartAldpController::class, 'formFunctional']);
Route::get('/departAldp/leadership/{id_aldp}', [DepartAldpController::class, 'formLeadership']);
Route::get('/departAldp/other/{id_aldp}', [DepartAldpController::class, 'formOther']);
Route::post('/departAldp/saveForm', [DepartAldpController::class, 'store']);
Route::get('/departAldp/edit/{id}', [DepartAldpController::class, 'editData']);
Route::get('/departAldp/editCnl/{id}', [DepartAldpController::class, 'editData']);
Route::post('/departAldp/update', [DepartAldpController::class, 'updateData']);

// ------------------------------------- Access for administrator -----------------------------------------------
Route::get('/dashboardFunct', [DashboardFunctController::class, 'index']);
Route::resource('/performance', PerformanceStandardController::class);
Route::resource('/items', ItemController::class);
Route::resource('/employees', EmployeeController::class);

// # ALDP
Route::resource('/aldpAdmin', AldpController::class);
Route::get('/aldpAdmin/edit/{id}', [AldpController::class, 'editData']);
Route::post('/aldpAdmin/update', [AldpController::class, 'updateData']);

Route::resource('/matrix', ProfileMatrixController::class);
Route::get('/matrix/edit/{id}', [ProfileMatrixController::class, 'editData']);
Route::post('/matrix/updateData', [ProfileMatrixController::class, 'updateData']);

// ## Asessment
Route::resource('/assessmentAdmin', AssessmentController::class);
Route::get('/assessmentAdmin/show/{id}', [AssessmentController::class, 'show']);
Route::get('/assessmentAdmin/edit/{id}', [AssessmentController::class, 'editData']);
Route::post('/assessmentAdmin/update', [AssessmentController::class, 'updateData']);
Route::resource('/assessmentAdminDetails', AssessmentDetailController::class);
Route::get('/assessmentAdmin/profile/{employee_id}', [AssessmentController::class, 'profile']);
Route::get('/edititem/{id}', [AssessmentController::class, 'editAssessment']);
Route::get('/updateitem/{id}', [AssessmentController::class, 'updateItemAssessment']);

// ## Menu UserLogin
Route::resource('/userlogin', UserLoginController::class);
Route::get('/userlogin/edit/{id}', [UserLoginController::class, 'editData']);
Route::post('/userlogin/update', [UserLoginController::class, 'updateData']);

// ## Close GAP
Route::resource('/closegap', CloseGapController::class);
Route::post('/updateStatus', [CloseGapController::class, 'updateStatus']);
Route::get('/create', [CloseGapController::class, 'create']);
Route::get('/store', [CloseGapController::class, 'store']);
Route::get('/read', [CloseGapController::class, 'read']);
Route::get('/onprogress', [CloseGapController::class, 'onprogress']);
Route::get('/show/{id}', [CloseGapController::class, 'show']);
Route::get('/update/{id}', [CloseGapController::class, 'updateData']);
Route::get('/closegapcompleted', [CloseGapController::class, 'closegapcompleted']);
Route::get('/closegapreview', [CloseGapController::class, 'closegapreview']);

// Menu Competency
Route::resource('/competency', CompetencyController::class);
Route::get('/formCompetency', [CompetencyController::class, 'form']);
Route::get('/saveData', [CompetencyController::class, 'saveData']);
Route::post('/competency/updateData', [CompetencyController::class, 'updateData']);

// import data
Route::post('/competency/import-data', [CompetencyController::class, 'importData']);
Route::post('/performance/importData', [PerformanceStandardController::class, 'importData']);
Route::post('/items/importData', [ItemController::class, 'importData']);
Route::post('/matrix/importData', [ProfileMatrixController::class, 'importData']);
Route::post('/employees/importData', [EmployeeController::class, 'importData']);
Route::post('/assessment/importData', [AssessmentController::class, 'importData']);

