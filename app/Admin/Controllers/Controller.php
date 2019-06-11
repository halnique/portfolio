<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Halnique\Portfolio\Infrastructure\Eloquent\Model;

abstract class Controller extends AdminController
{
    abstract protected function model(): Model;

    protected $attributesLabelMap = [];

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid($this->model());

        foreach ($this->attributesLabelMap as $attribute => $label) {
            $grid->column($attribute, __($label))->sortable();
        }

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param int $id
     * @return Show
     */
    protected function detail(int $id): Show
    {
        $show = new Show($this->model()->findOrFail($id));

        foreach ($this->attributesLabelMap as $attribute => $label) {
            $show->field($attribute, __($label));
        }

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form($this->model());

        foreach ($this->attributesLabelMap as $attribute => $label) {
            $form->display($attribute, __($label));
        }

        return $form;
    }
}
