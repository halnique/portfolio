<?php


namespace App\Admin\Presenters\Components;


use Illuminate\View\View;

class Dashboard extends \Encore\Admin\Controllers\Dashboard
{
    public static function title(): View
    {
        return view('admin.dashboard.title');
    }

    public static function dependencies()
    {
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];

        return view('admin.dashboard.dependencies', compact('dependencies'));
    }
}
