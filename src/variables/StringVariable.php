<?php

namespace horstoeko\etl\variables;

class StringVariable extends Variable
{
    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return "string";
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return "";
    }

    /**
     * @inheritDoc
     */
    public function validateBeforeSet(&$newValue): bool
    {
        $newValue = (string)$newValue;

        return true;
    }
}