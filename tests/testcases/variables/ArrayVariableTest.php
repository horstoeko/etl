<?php

namespace horstoeko\etl\tests\testcases\variables;

use horstoeko\etl\tests\TestCase;
use horstoeko\etl\variables\ArrayVariable;

class ArrayVariableTest extends TestCase
{
    /**
     * Variable
     *
     * @var ArrayVariable
     */
    protected $variable;

    public function setup(): void
    {
        $this->variable = new ArrayVariable();
    }

    public function testArrayDefaultValue(): void
    {
        $this->assertIsArray($this->variable->getValue());
        $this->assertEmpty($this->variable->getValue());
    }

    public function testArraySaved(): void
    {
        $this->variable->setValue([1,2,3]);
        $this->assertIsArray($this->variable->getValue());
        $this->assertArrayHasKey(0, $this->variable->getValue());
        $this->assertArrayHasKey(1, $this->variable->getValue());
        $this->assertArrayHasKey(2, $this->variable->getValue());
        $this->assertArrayNotHasKey(3, $this->variable->getValue());
    }

    public function testArrayNotSavedBecauseStringValue(): void
    {
        $this->variable->setValue("AAAAA");
        $this->assertIsArray($this->variable->getValue());
        $this->assertEmpty($this->variable->getValue());

        $this->variable->setValue([1,2,3]);
        $this->assertIsArray($this->variable->getValue());
        $this->assertArrayHasKey(0, $this->variable->getValue());
        $this->assertArrayHasKey(1, $this->variable->getValue());
        $this->assertArrayHasKey(2, $this->variable->getValue());
        $this->assertArrayNotHasKey(3, $this->variable->getValue());

        $this->variable->setValue("BBBBB");
        $this->assertIsArray($this->variable->getValue());
        $this->assertArrayHasKey(0, $this->variable->getValue());
        $this->assertArrayHasKey(1, $this->variable->getValue());
        $this->assertArrayHasKey(2, $this->variable->getValue());
        $this->assertArrayNotHasKey(3, $this->variable->getValue());
    }

    public function testArrayNotSavedBecauseFloatValue(): void
    {
        $this->variable->setValue(8.2);
        $this->assertIsArray($this->variable->getValue());
        $this->assertEmpty($this->variable->getValue());

        $this->variable->setValue([1,2,3]);
        $this->assertIsArray($this->variable->getValue());
        $this->assertArrayHasKey(0, $this->variable->getValue());
        $this->assertArrayHasKey(1, $this->variable->getValue());
        $this->assertArrayHasKey(2, $this->variable->getValue());
        $this->assertArrayNotHasKey(3, $this->variable->getValue());

        $this->variable->setValue(8.2);
        $this->assertIsArray($this->variable->getValue());
        $this->assertArrayHasKey(0, $this->variable->getValue());
        $this->assertArrayHasKey(1, $this->variable->getValue());
        $this->assertArrayHasKey(2, $this->variable->getValue());
        $this->assertArrayNotHasKey(3, $this->variable->getValue());
    }

    public function testArrayAsString(): void
    {
        $this->variable->setValue("[1,2,3]");
        $this->assertIsArray($this->variable->getValue());
        $this->assertEmpty($this->variable->getValue());
    }
}
