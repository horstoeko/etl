<?php

namespace horstoeko\etl\variables;

class IntegerVariable extends Variable
{
    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return "integer";
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return 0;
    }

    /**
     * @inheritDoc
     */
    public function validateBeforeSet(&$newValue): bool
    {
        if (filter_var($newValue, FILTER_VALIDATE_INT) === false) {
            return false;
        }

        $newValue = (int)$newValue;

        return true;
    }
}