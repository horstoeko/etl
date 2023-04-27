<?php

namespace horstoeko\etl\interfaces;

interface VariableCollectionInterface
{
    /**
     * Determine if the given variable exists.
     *
     * @param string $name
     * @return boolean
     */
    public function has(string $name): bool;

    /**
     * Get the given variable
     *
     * @param string $name
     * @return VariableInterface|null
     */
    public function get(string $name): ?VariableInterface;

    /**
     * Set the given variable
     *
     * @param string $name
     * @param VariableInterface $variable
     * @return void
     */
    public function set(string $name, VariableInterface $variable): void;

    /**
     * Remove the given variable
     *
     * @param string $name
     * @return void
     */
    public function unset(string $name): void;

    /**
     * Copy a variable collection
     *
     * @param VariableCollectionInterface $fromVariableCollection
     * @return VariableCollectionInterface
     */
    public static function createFromCollection(VariableCollectionInterface $fromVariableCollection): VariableCollectionInterface;
}