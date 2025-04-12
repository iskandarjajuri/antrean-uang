<?php

namespace App\Http\Controllers;


use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display the settings index page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('settings.index');
    }

    /**
     * Display the user information page.
     *
     * @return View
     */
    public function userInfo(): View
    {
        return view('settings.user-info');
    }
}
