<?php


use App\Http\Controllers\backup\DataBaseBackupController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {


    Route::get('/database/show-backup-file', [DataBaseBackupController::class, 'showBackupFile'])->name('admin.backup.database.show_backup_file');

    Route::get('/database/all', [DataBaseBackupController::class, 'backupAll'])->name('admin.backup.database.all');


});