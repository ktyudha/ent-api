<?php

use App\Http\Controllers\AchivementController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\Api\MemberApiController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\FinanceApiController;
use App\Http\Controllers\Api\MailingApiController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\DivisionApiController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\DepartmentApiController;
use App\Http\Controllers\Api\GenerationApiController;

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


Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);
// Route::apiResource('recruitment', RecruitmentController::class);

Route::middleware('auth:sanctum')->group(function () {
	Route::post('auth/logout', LogoutController::class);
	Route::get('user', [UserApiController::class, 'index']);
	// Route::post('recruitment', [RecruitmentController::class, 'store']);
	Route::apiResources([
		'experience' => ExperienceController::class,
		'achivement'=> AchivementController::class,
		'recruitment'=> RecruitmentController::class,
	]);
});

Route::apiResources([
	// collections
	'departments' => DepartmentApiController::class,
	'generations' => GenerationApiController::class,
	'divisions' => DivisionApiController::class,
	'members' => MemberApiController::class,

	// finance
	'finance' => FinanceApiController::class,

	// mailing
	'mailings' => MailingApiController::class,
]);

Route::get('/logs', [LogController::class, 'index']);
