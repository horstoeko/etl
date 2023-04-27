<?php

namespace horstoeko\etl\tests\testcases\variables;

use horstoeko\etl\tests\TestCase;
use horstoeko\etl\variables\IntegerVariable;

class IntegerVariableTest extends TestCase
{
    /**
     * Variable
     *
     * @var IntegerVariable
     */
    protected $variable;

    public function setup(): void
    {
        $this->variable = new IntegerVariable();
    }

    public function testIntegerDefaultValue(): void
    {
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(0, $this->variable->getValue());
    }

    public function testIntegerSaved(): void
    {
        $this->variable->setValue(123);
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());
    }

    public function testNegativeIntegerSaved(): void
    {
        $this->variable->setValue(-123);
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(-123, $this->variable->getValue());
    }

    public function testIntegerNotSavedBecauseStringValue(): void
    {
        $this->variable->setValue("AAAAA");
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(0, $this->variable->getValue());

        $this->variable->setValue(123);
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());

        $this->variable->setValue("BBBBB");
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());
    }

    public function testIntegerNotSavedBecauseFloatValue(): void
    {
        $this->variable->setValue(8.2);
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(0, $this->variable->getValue());

        $this->variable->setValue(123);
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());

        $this->variable->setValue(8.2);
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());
    }

    public function testIntegerAsString(): void
    {
        $this->variable->setValue("523");
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(523, $this->variable->getValue());
    }

    public function testFloatAsString(): void
    {
        $this->variable->setValue("8.2");
        $this->assertIsInt($this->variable->getValue());
        $this->assertEquals(0, $this->variable->getValue());
    }
}
