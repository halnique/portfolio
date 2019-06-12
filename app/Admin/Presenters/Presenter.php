<?php


namespace App\Admin\Presenters;


use Encore\Admin\Layout\Content;

interface Presenter
{
    public function render(): Content;
}
