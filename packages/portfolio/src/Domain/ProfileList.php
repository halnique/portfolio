<?php

namespace Halnique\Portfolio\Domain;


final class ProfileList extends ArrayObject
{
    protected static function validate(array $items): void
    {
        foreach ($items as $item) {
            if (!$item instanceof Profile) {
                throw new \DomainException('Element should be ' . Profile::class . ' type.');
            }
        }
    }
}
