<?php

namespace Halnique\Portfolio\Domain;


final class ProfileTagList extends ArrayObject
{
    protected static function validate(array $items): void
    {
        foreach ($items as $item) {
            if (!$item instanceof ProfileTag) {
                throw new \DomainException('Element should be ' . ProfileTag::class . ' type.');
            }
        }
    }
}
