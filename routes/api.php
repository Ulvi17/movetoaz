<?php

use App\Http\Controllers\admin\RoutesController;
use App\Http\Controllers\admin\AuthController;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

Route::get("flush", function () {
    Cache::flush();
    return "Cache OK";
});
Route::get("set_eyvaz", [AuthController::class, 'set_eyvaz']);
Route::get("clear_contactus", function () {
    DB::transaction(function () {
        $a = ContactUs::all();
        foreach ($a as $b) {
            $b->delete();
        }
    });
});
