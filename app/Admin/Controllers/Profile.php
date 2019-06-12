<?php


namespace App\Admin\Controllers;


use Halnique\Portfolio\Infrastructure\Eloquent;

class Profile extends Controller
{
    protected $title = Eloquent\Profile::class;

    private $model;

    protected $attributesFieldMap = [
        'id' => 'display',
        'name' => 'text',
        'introductions' => 'textarea',
        'icon_url' => 'text',
        'github' => 'text',
        'twitter' => 'text',
        'qiita' => 'text',
        'hatena' => 'text',
        'created_at' => 'display',
        'updated_at' => 'display',
    ];

    public function __construct(Eloquent\Profile $model)
    {
        $this->model = $model;
    }

    protected function model(): Eloquent\Model
    {
        return $this->model;
    }
}
