<?php
use App\Http\Controllers\api\app\agent\AgentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->prefix('v1/agent')->controller(AgentController::class)->group(function () {
    Route::get('/', 'profile');
    Route::get('/list', 'getAllAgentProfile');
    Route::get('/renewal', 'renewal');
    Route::get('/claim', 'claim');
    Route::get('/noti', 'noti');
    Route::put('/noti/read/{id}', 'readNoti');
    Route::get('/leader-board', 'leaderBoard');
    Route::get('/training-resource', 'trainingResource');
});
