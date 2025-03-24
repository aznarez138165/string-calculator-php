<?php

namespace Deg540\StringCalculatorPHP;

use http\Exception\InvalidArgumentException;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\throwException;

class StringCalculator
{
    // TODO: String Calculator Kata

    public function __construct()
    {
    }

    /**
     * @param string $numbers
     *
     * @return int
     * @throws \InvalidArgumentException
     */
    public function add(string $numbers): int {
        if($this->isEmpty($numbers)){
            return 0;
        }

        $cleanedNumbersArray = $this->getCleanedArray($numbers);

        $numbersArray = $this->getNumbersArray($cleanedNumbersArray);

        $this->checkNegativeNumbers($numbersArray);

        if($this->isOnlyOneNumber($numbersArray)){
            return intval($numbersArray[0]);
        }

        return $this->getAdd($numbersArray);
    }

    /**
     * @param string $numbers
     * @return bool
     */
    public function isEmpty(string $numbers): bool
    {
        return empty($numbers);
    }

    /**
     * @param string $numbers
     * @return string[]
     */
    public function getCleanedArray(string $numbers): array
    {
        $delimiter = ",";
        if(str_starts_with($numbers, "//")){
            preg_match("/\/\/(.+)\n/", $numbers, $matches);
            if (!empty($matches[1])) {
                $delimiter = $matches[1];
            }

            $numbers = substr($numbers, strpos($numbers, "\n") + 1);
        }

        return preg_split("/[$delimiter\n]/", $numbers);
    }

    /**
     * @param array $numbersArray
     * @return bool
     */
    public function isOnlyOneNumber(array $numbersArray): bool
    {
        return count($numbersArray) === 1;
    }

    /**
     * @param array $numbersArray
     * @return float|int
     */
    public function getAdd(array $numbersArray): int|float
    {
        return array_sum(array_map('intval', $numbersArray));
    }

    /**
     * @param array $numbersArray
     * @return void
     */
    public function checkNegativeNumbers(array $numbersArray): void
    {
        $negativos = [];
        foreach ($numbersArray as $number) {
            if (intval($number) < 0) {
                $negativos[] = $number;
            }
        }

        if (!empty($negativos) > 0) {
            throw new \InvalidArgumentException("negativos no soportados: " . implode(", ", $negativos));
        }
    }

    /**
     * @param array $cleanedNumbersArray
     * @return array
     */
    public function getNumbersArray(array $cleanedNumbersArray): array
    {
        $numbersArray = [];
        foreach ($cleanedNumbersArray as $number) {
            if (intval($number) < 1000) {
                $numbersArray[] = $number;
            }
        }
        return $numbersArray;
    }

}