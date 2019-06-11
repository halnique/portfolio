<?php


namespace App\Admin\Controllers;


use Halnique\Portfolio\Infrastructure\Eloquent;

class Profile extends Controller
{
    protected $title = Eloquent\Profile::class;

    private $model;

    protected $attributesLabelMap = [
        'id' => 'ID',
        'name' => 'Name',
        'introductions' => 'Introductions',
        'icon_url' => 'Icon Url',
        'github' => 'GitHub Account',
        'twitter' => 'Twitter Account',
        'qiita' => 'Qiita Account',
        'hatena' => 'Hatena Account',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
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
