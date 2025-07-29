<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

abstract class Controller
{
    public function __construct(){
        $setting = settings(session()->get('setting_id'), 'id');
        View::share('setting', $setting);
    }
}
