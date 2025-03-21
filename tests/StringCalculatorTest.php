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
    public function inputNullParametersOutputZero(): void{
        $addChecker = $this->stringCalculator->add('');

        $this->assertEquals(0,$addChecker);
    }

    /**
     * @test
     */
    public function inputOneParameterOutputNumber(): void{
        $addChecker = $this->stringCalculator->add('1');

        $this->assertEquals(1,$addChecker);
    }

    /**
     * @test
     */
    public function inputTwoParametersOutputAdd(): void{
        $addChecker = $this->stringCalculator->add('1,2');

        $this->assertEquals(3,$addChecker);
    }

    /**
     * @test
     */
    public function inputFiveParametersOutputAdd(): void{
        $addChecker = $this->stringCalculator->add('1,2,3,4,5');

        $this->assertEquals(15,$addChecker);
    }

    /**
     * @test
     */
    public function inputTwoParametersWithLineBreakOutputAdd(): void{
        $addChecker = $this->stringCalculator->add("1,2\n3");

        $this->assertEquals(3,$addChecker);
    }


}