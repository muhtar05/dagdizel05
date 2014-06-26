<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 21.11.13
 * Time: 18:37
 * To change this template use File | Settings | File Templates.
 */

class CalendarHelper
{

    public static function getRussianNameMonth($number)
    {
        switch($number)
        {
            case 1:
                $month = 'Январь';
                break;
            case 2:
                $month = 'Февраль';
                break;
            case 3:
                $month = 'Март';
                break;
            case 4:
                $month = 'Апрель';
                break;
            case 5:
                $month = 'Май';
                break;
            case 6:
                $month = 'Июнь';
                break;
            case 7:
                $month = 'Июль';
                break;

            case 8:
                $month = 'Август';
                break;

            case 9:
                $month = 'Сентябрь';
                break;

            case 10:
                $month = 'Октябрь';
                break;

            case 11:
                $month = 'Ноябрь';
                break;

            case 12:
                $month = 'Декабрь';
                break;

            default:
                break;
        }

       return $month;

    }


}