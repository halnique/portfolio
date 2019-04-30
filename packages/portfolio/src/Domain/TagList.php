<?php

namespace Halnique\Portfolio\Domain;


final class TagList extends ArrayObject
{
    protected static function validate(array $items): void
    {
        foreach ($items as $item) {
            if (!$item instanceof Tag) {
                throw new \DomainException('Element should be ' . Tag::class . ' type.');
            }
        }
    }
}
