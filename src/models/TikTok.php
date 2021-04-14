<?php

namespace models;

class TikTok 
{
    const DEFAULT_FIRST_DIVIDER = 3;
    const DEFAULT_SECOND_DIVIDER = 5;
    const MESSAGE_FIRST_DIV = "Tik";
    const MESSAGE_SECOND_DIV = "Tok";
    const MESSAGE_BOTH_DIV = "TikTok";
    
    private $min;
    private $max;
    private $firstDivider;
    private $secondDivider;
    
    public function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
        $this->firstDivider = self::DEFAULT_FIRST_DIVIDER;
        $this->secondDivider = self::DEFAULT_SECOND_DIVIDER;
    }
    
    public function setDividers($firstDivider, $secondDivider){
        $this->firstDivider = $firstDivider;
        $this->secondDivider = $secondDivider;
    }
    
    /**
     * An array with values to print
     * @return type array 
     */
    public function getNumbers()
    {
        $numbers = [];
        for ($i = $this->min; $i <= $this->max; $i++) {
            $number = $this->getFormattedNumber($i);
            $numbers[] = $number;
        }
        return $numbers;
    }
    
    /**
     * Get formatted $number to print
     * @param int $number
     * @return value to print
     */
    private function getFormattedNumber(int $number)
    {
        $divisibleByFirstOne = ($number % $this->firstDivider) == 0;
        $divisibleBySecondOne = ($number % $this->secondDivider) == 0;
        if ($divisibleByFirstOne && $divisibleBySecondOne) {
            return self::MESSAGE_BOTH_DIV;
        } elseif ($divisibleByFirstOne) {
            return self::MESSAGE_FIRST_DIV;
        } elseif ($divisibleBySecondOne) {
            return self::MESSAGE_SECOND_DIV;
        } else {
            return $number;
        }
    }
}