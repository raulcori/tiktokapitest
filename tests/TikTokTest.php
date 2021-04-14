<?php

use PHPUnit\Framework\TestCase;
use models\TikTok;

final class TikTokTest extends TestCase
{
    public function testPrintASingleTikAndSingleTok()
    {
        $tik = TikTok::MESSAGE_FIRST_DIV;
        $tok = TikTok::MESSAGE_SECOND_DIV;
        $model = new TikTok(1, 5);
        $array = [1, 2, $tik, 4, $tok];
        $this->assertSame($array, $model->getNumbers());
    }
    
    public function testPrintSingleTikTok()
    {
        $tiktok = TikTok::MESSAGE_BOTH_DIV;
        $model = new TikTok(14, 16);
        $array = [14, $tiktok, 16];
        $this->assertSame($array, $model->getNumbers());
    }
    
    public function testPrintMultipleTikTok()
    {
        $tik = TikTok::MESSAGE_FIRST_DIV;
        $tok = TikTok::MESSAGE_SECOND_DIV;
        $tiktok = TikTok::MESSAGE_BOTH_DIV;
        $model = new TikTok(1,20);
        $array = [1, 2, $tik, 4, $tok, $tik, 7, 8, $tik, $tok, 11, $tik, 13, 14, 
            $tiktok ,16, 17, $tik, 19, $tok];
        $this->assertSame($array, $model->getNumbers());
    }
    
    public function testPrintZeroCase()
    {
        $tiktok = TikTok::MESSAGE_BOTH_DIV;
        $model = new TikTok(0, 0);
        $array = [$tiktok];
        $this->assertSame($array, $model->getNumbers());
    }
    
    public function testPrintSingleNegative()
    {
        $tik = TikTok::MESSAGE_FIRST_DIV;
        $tok = TikTok::MESSAGE_SECOND_DIV;
        $tiktok = TikTok::MESSAGE_BOTH_DIV;
        $model = new TikTok(-6, -4);
        $array = [$tik, $tok, -4];
        $this->assertSame($array, $model->getNumbers());
    }
    
    public function testPrintMultiplesNegatives()
    {
        $tik = TikTok::MESSAGE_FIRST_DIV;
        $tok = TikTok::MESSAGE_SECOND_DIV;
        $tiktok = TikTok::MESSAGE_BOTH_DIV;
        $model = new TikTok(-6, 0);
        $array = [$tik, $tok, -4, $tik, -2, -1, $tiktok];
        $this->assertSame($array, $model->getNumbers());
    }

    public function testGetEmptyArrayFromAInverseRange()
    {
        $model = new TikTok(6, 0);
        $array = [];
        $this->assertSame($array, $model->getNumbers());
    }
}