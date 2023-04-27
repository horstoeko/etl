<?php

namespace horstoeko\etl\variables;

use stdClass;
use Traversable;

class ObjectVariable extends Variable
{
    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return "object";
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return new stdClass();
    }

    /**
     * @inheritDoc
     */
    public function validateBeforeSet(&$newValue): bool
    {
        if (!is_object($newValue)) {
            return false;
        }

        $newValue = (object)$newValue;

        return true;
    }
}