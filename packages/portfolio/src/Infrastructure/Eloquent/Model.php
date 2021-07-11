<?php

namespace Halnique\Portfolio\Infrastructure\Eloquent;


use Halnique\Portfolio\Domain\ToDomain;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * @method static findOrFail($id, $columns = ['*'])
 */
abstract class Model extends EloquentModel implements ToDomain
{
    use HasFactory;
}
