<?php


namespace App\Admin\Presenters;


use App\Admin\Presenters\Components\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class Index implements Presenter
{
    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function render(): Content
    {
        return $this->content
            ->title(config('admin.name'))
            ->description(config('admin.description'))
            ->row(Dashboard::title())
            ->row(function (Row $row) {
                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
}
