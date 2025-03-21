<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    // TODO: String Calculator Kata Tests

    private StringCalculator $stringCalculator;

    protected function setUp(): void{
        parent::setUp();

        $this->stringCalculator = new StringCalculator();
    }

    /**
     * @test
     */
    public function givenNullParametersReturnsZero(): void{
        $this->assertEquals(0,$this->stringCalculator->add(''));
    }

    /**
     * @test
     */
    public function givenOneParameterReturnsNumber(): void{
        $this->assertEquals(1,$this->stringCalculator->add('1'));
    }

    /**
     * @test
     */
    public function givenTwoParametersReturnsAddition(): void{
        $this->assertEquals(3,$this->stringCalculator->add('1,2'));
    }

    /**
     * @test
     */
    public function givenFiveParametersReturnsAddition(): void{
        $this->assertEquals(15,$this->stringCalculator->add('1,2,3,4,5'));
    }

    /**
     * @test
     */
    public function givenThreeParametersWithLineBreakReturnsAddition(): void{
        $this->assertEquals(6,$this->stringCalculator->add("1\n2,3"));
    }


}