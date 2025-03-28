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
    public function givenNullNumberReturnsZero(): void{
        $this->assertEquals(0,$this->stringCalculator->add(""));
    }

    /**
     * @test
     */
    public function givenOneNumberReturnsNumber(): void{
        $this->assertEquals(1,$this->stringCalculator->add("1"));
    }

    /**
     * @test
     */
    public function givenTwoNumbersReturnsSumOfNumbers(): void{
        $this->assertEquals(3,$this->stringCalculator->add("1,2"));
    }

    /**
     * @test
     */
    public function givenNumbersReturnsSumOfNumbers(): void{
        $this->assertEquals(15,$this->stringCalculator->add("1,2,3,4,5"));
    }

    /**
     * @test
     */
    public function givenNumbersWithLineBreakReturnsSumOfNumbers(): void{
        $this->assertEquals(6,$this->stringCalculator->add("1\n2,3"));
    }

    /**
     * @test
     */
    public function givenNumbersWithCustomDelimeterReturnsSumOfNumbers(): void{
        $this->assertEquals(3,$this->stringCalculator->add("//[;]\n1;2"));
    }

    /**
     * @test
     */
    public function givenNegativeNumbersThrowsException(): void{
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("negativos no soportados: -2, -3");

        $this->stringCalculator->add("1,-2,-3");
    }

    /**
     * @test
     */
    public function givenNumberGreaterThanThousandReturnsSumOfNumbersIgnoringNumber(): void{
        $this->assertEquals(3,$this->stringCalculator->add("1,2,1001"));
    }

    /**
     * @test
     */
    public function givenDelimeterWithMoreThanOneCharacterReturnsSumOfNumbers(): void{
        $this->assertEquals(6,$this->stringCalculator->add("//[***]\n1***2***3"));
    }

    /**
     * @test
     */
    public function givenMoreThanOneDelimeterReturnsSumOfNumbers(): void{
        $this->assertEquals(6,$this->stringCalculator->add("//[*][%]\n1*2%3"));
    }

    /**
     * @test
     */
    public function givenMoreThanOneDelimeterWithMoreThanOneCharacterReturnsSumOfNumbers(): void{
        $this->assertEquals(7,$this->stringCalculator->add("//[**][%%][&&]\n1**2%%3&&1"));
    }

}