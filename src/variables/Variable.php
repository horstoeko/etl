<?php

namespace horstoeko\etl\variables;

use horstoeko\etl\interfaces\VariableInterface;

abstract class Variable implements VariableInterface
{
    /**
     * Parameter name
     *
     * @var string
     */
    protected $name = "";

    /**
     * Parameter value
     *
     * @var mixed
     */
    protected $value;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clear();
    }

    /**
     * @inheritDoc
     */
    abstract public function getType(): string;

    /**
     * @inheritDoc
     */
    abstract public function getDefaultValue();

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @inheritDoc
     */
    public function setValue($newValue): void
    {
        if (!$this->validateBeforeSet($newValue)) {
            return;
        }

        $this->value = $newValue;
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        $this->value = $this->getDefaultValue();
    }

    /**
     * @inheritDoc
     */
    public function validateBeforeSet(&$newValue): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function matchesType(string $expectedTypes): bool
    {
        return strcasecmp($expectedTypes, $this->getType()) === 0;
    }

    /**
     * @inheritDoc
     */
    public function matchesOneTypeOf($expectedTypes = []): bool
    {
        return in_array($this->getType(), $expectedTypes) === true;
    }
}
