<?php


namespace app\dictionaries;


class NumberOfFloors
{
    private static $items = [];

    public static function getItemsForList($startFloor, $stopFloor)
    {
        for ($i = $startFloor; $i <= $stopFloor; $i++) {
            static::$items[$i] = (string)$i;
        }

        return static::$items;
    }
}