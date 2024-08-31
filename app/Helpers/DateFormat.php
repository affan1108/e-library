<?php
namespace App\Helpers;

class DateFormat
{
    public static function longDate($datetime)
    {
        return date('d F Y', strtotime($datetime));
    }

    public static function semiLongDate($datetime)
    {
        return date('d M Y', strtotime($datetime));
    }

    public static function shortDate($datetime)
    {
        return date('d/m/Y', strtotime($datetime));
    }

    public static function datetime($datetime)
    {
        return date('d/m/Y H:i', strtotime($datetime));
    }

    public static function longDatetime($datetime)
    {
        return date('d F Y H:i', strtotime($datetime));
    }
}
