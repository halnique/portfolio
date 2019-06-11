<?php


namespace App\Admin\Controllers;


use Halnique\Portfolio\Infrastructure\Eloquent;

class ProfileTag extends Controller
{
    protected $title = Eloquent\ProfileTag::class;

    private $model;

    protected $attributesLabelMap = [
        'id' => 'ID',
        'profile_id' => 'profiles ID',
        'tag_id' => 'tags ID',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
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
