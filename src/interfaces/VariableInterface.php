<?php

namespace horstoeko\etl\interfaces;

interface VariableInterface
{
    /**
     * Get the variable type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Returns the variables default value
     *
     * @return mixed
     */
    public function getDefaultValue();

    /**
     * Get the v name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Return the variable value
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Sets the new variable value
     *
     * @param mixed $newValue
     * @return mixed
     */
    public function setValue($newValue): void;

    /**
     * Resets the variable to its default value
     *
     * @return void
     */
    public function clear(): void;

    /**
     * Validate value before setting it
     *
     * @param mixed $newValue
     * @return boolean
     */
    public function validateBeforeSet(&$newValue): bool;

    /**
     * Returns true of one of the given data type is matching
     *
     * @param string $expectedTypes
     * @return boolean
     */
    public function matchesType(string $expectedTypes): bool;

    /**
     * Returns true of one of the given data types are matching
     *
     * @param array $expectedTypes
     * @return boolean
     */
    public function matchesOneTypeOf($expectedTypes = []): bool;
}