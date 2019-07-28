<?php


namespace app\dictionaries;


class Status
{
    public static $items = [
        0 => 'Недостроено',
        1 => 'Достроено',
    ];

    public static function getItemValue($i)
    {
        if(isset(static::$items[$i])) {
            return static::$items[$i];
        }

        return 'status not found';
    }
}