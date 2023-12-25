<?php

use App\Http\Controllers\dev\DevOperationController;
use App\Http\Controllers\dev\DataBaseBackupController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
    Route::get('index', [DevOperationController::class, 'index'])->name("dev.doc.index");
    Route::get('index/{file}', [DevOperationController::class, 'getContent'])->name("dev.doc.index.file");

    Route::get('/database/show-backup-file', [DataBaseBackupController::class, 'showBackupFile'])->name('dev.backup.database.show_backup_file');
    Route::get('/database/all', [DataBaseBackupController::class, 'backupAll'])->name('dev.backup.database.all');

    Route::get('/code/show-deploy-ui', [DevOperationController::class, 'showDeployUi'])->name('dev.code.show-deploy-ui');
    Route::get('/code/deploy', [DevOperationController::class, 'deploy'])->name('dev.code.deploy');
});
