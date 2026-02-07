<?php

declare(strict_types=1);

class ResistorColorDuo
{
    public const array COLORS = ['black', 'brown', 'red', 'orange', 'yellow', 'green', 'blue', 'violet', 'grey', 'white'];

    public function getColorsValue(array $colors): int
    {
        // ignore additional colors
        $colors = array_slice($colors, 0, 2);

        // reverse order for increasing multiplications
        $colors = array_reverse($colors);

        $value = 0;
        foreach ($colors as $index => $color) {
            $value += array_search($color, self::COLORS) * pow(10, $index);
        }
        return $value;
    }
}
