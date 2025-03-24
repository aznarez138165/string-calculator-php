<?php

namespace Deg540\StringCalculatorPHP;

use function PHPUnit\Framework\isNull;

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
     */
    public function add(string $numbers): int {
        if($this->isEmpty($numbers)){
            return 0;
        }

        $numbersArray = $this->getCleanedArray($numbers);

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

}