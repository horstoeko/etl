<?php

namespace horstoeko\etl\variables;

use Traversable;

class ArrayVariable extends Variable
{
    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return "array";
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function validateBeforeSet(&$newValue): bool
    {
        if (!is_array($newValue) && (!($newValue instanceof Traversable))) {
            return false;
        }

        $newValue = (array)$newValue;

        return true;
    }
}