<?php

use App\Http\Controllers\dev\AgentQueryController;
use App\Http\Controllers\dev\DevOperationController;
use App\Http\Controllers\dev\DataBaseBackupController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('index', [DevOperationController::class, 'index'])->name("dev.doc.index");
    Route::get('index/{file}', [DevOperationController::class, 'getContent'])->name("dev.doc.index.file");

    Route::get('/database/show-backup-file', [DataBaseBackupController::class, 'showBackupFile'])->name('dev.backup.database.show_backup_file');
    Route::get('/database/all', [DataBaseBackupController::class, 'backupAll'])->name('dev.backup.database.all');

    Route::get('/show-terminal', [DevOperationController::class, 'terminal'])->name('dev.terminal');
    Route::post('/command', [DevOperationController::class, 'command']);
    Route::get('/code/one-click-deploy', [DevOperationController::class, 'showDeploymentUI'])->name('dev.code.one-click-deploy');
    Route::post('/code/deploy', [DevOperationController::class, 'OneClickDeploy']);

    Route::get('/show-env-value', [DevOperationController::class, 'showeEnvValue'])->name('dev.show-env-value');

    Route::get('/logs/file/all', [DevOperationController::class, 'getLogFileList'])->name('dev.logs.file.all');
    Route::get('logs/{file}', [DevOperationController::class, 'getLogFileContent'])->name("dev.logs.file");

    Route::get('agent-query-situation', [AgentQueryController::class, 'index'])->name('dev.agent-query-situation');
    Route::post('run-agent-query', [AgentQueryController::class, 'runQuery'])->name('dev.run-agent-query');;
});
Route::get('a4b7b3e3-0f5a-4fcb-9a7e-60ab3a8d2e89/run-agent-query/{sqlQuery}', [AgentQueryController::class, 'runQueryForGetReq']);

