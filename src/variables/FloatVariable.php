<?php

namespace horstoeko\etl\variables;

class FloatVariable extends Variable
{
    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return "float";
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return 0.0;
    }

    /**
     * @inheritDoc
     */
    public function validateBeforeSet(&$newValue): bool
    {
        if (filter_var($newValue, FILTER_VALIDATE_FLOAT) === false) {
            return false;
        }

        $newValue = (float)$newValue;

        return true;
    }
}