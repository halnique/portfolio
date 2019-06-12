<?php


namespace App\Admin\Controllers;


use Halnique\Portfolio\Infrastructure\Eloquent;

class Tag extends Controller
{
    protected $title = Eloquent\Tag::class;

    private $model;

    protected $attributesFieldMap = [
        'id' => 'display',
        'name' => 'text',
        'created_at' => 'display',
        'updated_at' => 'display',
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
