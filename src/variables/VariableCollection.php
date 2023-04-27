<?php

namespace horstoeko\etl\variables;

use ArrayAccess;
use ArrayIterator;
use Iterator;
use Traversable;
use horstoeko\etl\interfaces\VariableCollectionInterface;
use horstoeko\etl\interfaces\VariableInterface;

class VariableCollection implements VariableCollectionInterface, ArrayAccess, Iterator
{
    /**
     * Variables
     *
     * @var VariableInterface[]
     */
    protected $variables;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->variables = [];
    }

    /**
     * @inheritDoc
     */
    public function has(string $name): bool
    {
        return \array_key_exists($name, $this->variables);
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): ?VariableInterface
    {
        if (!$this->has($name)) {
            return null;
        }

        return $this->variables[$name];
    }

    /**
     * @inheritDoc
     */
    public function set(string $name, VariableInterface $variable): void
    {
        $this->variables[$name] = $variable;
    }

    /**
     * @inheritDoc
     */
    public function unset(string $name): void
    {
        if (!$this->has($name)) {
            return;
        }

        unset($this->variables[$name]);
    }

    /**
     * @inheritDoc
     */
    public static function createFromCollection(VariableCollectionInterface $fromVariableCollection): VariableCollectionInterface
    {
        $toVariableCollection = new self();

        foreach ($fromVariableCollection as $variableName => $variable) {
            $toVariableCollection->set($variableName, $variable);
        }

        return $toVariableCollection;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset): bool
    {
        return $this->has($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value): void
    {
        $this->set($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset): void
    {
        $this->unset($offset);
    }

    /**
     * @inheritDoc
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->variables);
    }

    /**
     * @inheritDoc
     */
    function rewind(): void
    {
        reset($this->variables);
    }

    /**
     * @inheritDoc
     */
    function current()
    {
        return current($this->variables);
    }

    /**
     * @inheritDoc
     */
    function key()
    {
        return key($this->variables);
    }

    /**
     * @inheritDoc
     */
    function next(): void
    {
        next($this->variables);
    }

    /**
     * @inheritDoc
     */
    function valid(): bool
    {
        return key($this->variables) !== null;
    }
}
