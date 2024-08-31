<?php
namespace App\Helpers;

class NumberFormat
{
    public static function price($number)
    {
        return 'Rp '.number_format($number,0,",",".");
    }

    public static function priceNoCurr($number)
    {
        return number_format($number,0,",",".");
    }
}
