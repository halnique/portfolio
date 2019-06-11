<?php


namespace App\Admin\Controllers;


use Halnique\Portfolio\Infrastructure\Eloquent;

class Tag extends Controller
{
    protected $title = Eloquent\Tag::class;

    private $model;

    protected $attributesLabelMap = [
        'id' => 'ID',
        'name' => 'Name',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
    ];

    public function __construct(Eloquent\Tag $model)
    {
        $this->model = $model;
    }

    protected function model(): Eloquent\Model
    {
        return $this->model;
    }
}
