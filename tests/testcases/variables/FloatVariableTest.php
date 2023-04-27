<?php

namespace horstoeko\etl\tests\testcases\variables;

use horstoeko\etl\tests\TestCase;
use horstoeko\etl\variables\FloatVariable;

class FloatVariableTest extends TestCase
{
    /**
     * Variable
     *
     * @var FloatVariable
     */
    protected $variable;

    public function setup(): void
    {
        $this->variable = new FloatVariable();
    }

    public function testFloatDefaultValue(): void
    {
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(0, $this->variable->getValue());
    }

    public function testFloatSaved(): void
    {
        $this->variable->setValue(123);
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());

        $this->variable->setValue(123.565);
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(123.565, $this->variable->getValue());
    }

    public function testNegativeFloatSaved(): void
    {
        $this->variable->setValue(-123);
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(-123, $this->variable->getValue());

        $this->variable->setValue(-123.565);
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(-123.565, $this->variable->getValue());
    }

    public function testFloatNotSavedBecauseStringValue(): void
    {
        $this->variable->setValue("AAAAA");
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(0, $this->variable->getValue());

        $this->variable->setValue(123);
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(123, $this->variable->getValue());

        $this->variable->setValue(123.565);
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(123.565, $this->variable->getValue());

        $this->variable->setValue("BBBBB");
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(123.565, $this->variable->getValue());
    }

    public function testFloatAsString(): void
    {
        $this->variable->setValue("8.2");
        $this->assertIsFloat($this->variable->getValue());
        $this->assertEquals(8.2, $this->variable->getValue());
    }
}
