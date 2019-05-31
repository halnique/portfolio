<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
    {
        return redirect('/');
    }
}
