<?php


namespace app\dictionaries;


class Metro
{
    public static $items = [
        0 => 'metro_1',
        1 => 'metro_2',
        2 => 'metro_3',
        3 => 'metro_4',
        4 => 'metro_5',
        5 => 'metro_6',
        6 => 'metro_7',
        7 => 'metro_8',
        8 => 'metro_9',
        9 => 'metro_10',
    ];

    public static function getItemValue($i)
    {
        if(isset(static::$items[$i])) {
            return static::$items[$i];
        }

        return 'metro not found';
    }
}