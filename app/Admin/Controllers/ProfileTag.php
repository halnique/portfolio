<?php


namespace App\Admin\Controllers;


use Halnique\Portfolio\Infrastructure\Eloquent;

class ProfileTag extends Controller
{
    protected $title = Eloquent\ProfileTag::class;

    private $model;

    protected $attributesFieldMap = [
        'id' => 'display',
        'profile_id' => 'id',
        'tag_id' => 'id',
        'created_at' => 'display',
    ];

    public function __construct(Eloquent\ProfileTag $model)
    {
        $this->model = $model;
    }

    protected function model(): Eloquent\Model
    {
        return $this->model;
    }
}
