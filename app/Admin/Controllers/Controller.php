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

    protected $attributesFieldMap = [];

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid($this->model());

        foreach (array_keys($this->attributesFieldMap) as $attribute) {
            $grid->column($attribute, __($attribute))->sortable();
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

        foreach (array_keys($this->attributesFieldMap) as $attribute) {
            $show->field($attribute, __($attribute));
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

        foreach ($this->attributesFieldMap as $attribute => $field) {
            $form->$field($attribute, __($attribute));
        }

        return $form;
    }
}
