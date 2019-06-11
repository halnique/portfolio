<?php

namespace App\Admin\Controllers;

use App\Admin\Presenters;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    public function index(Presenters\Index $presenter)
    {
        return $presenter->render();
    }
}
