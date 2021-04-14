<?php

namespace controllers;

use models\TikTok;

class TikTokController
{
    private $min;
    private $max;
    
    function __construct(int $min, int $max)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function printNumbers()
    {
        $model = new TikTok($this->min, $this->max);
        $numbers = $model->getNumbers();
        foreach ($numbers as $number) {
            echo "$number\r\n";
        }
    }
}