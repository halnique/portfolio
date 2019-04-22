<?php

namespace Halnique\Portfolio\Infrastructure\Eloquent;


use Halnique\Portfolio\Domain\ToDomain;
use Illuminate\Database\Eloquent\Model as EloquentModel;

abstract class Model extends EloquentModel implements ToDomain
{
}
