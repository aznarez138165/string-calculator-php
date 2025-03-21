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
    public function inputNullStringOutputZero(): void{
        $addChecker = $this->stringCalculator->Add("");

        $this->assertEquals(0,$addChecker);
    }

    /**
     * @test
     */
    public function inputOneStringOutputNumber(): void{
        $addChecker = $this->stringCalculator->Add("1");

        $this->assertEquals(1,$addChecker);
    }

    /**
     * @test
     */
    public function inputTwoStringsOutputAdd(): void{
        $addChecker = $this->stringCalculator->Add("1,2");

        $this->assertEquals(3,$addChecker);
    }


}