<?php

declare(strict_types=1);

function format(string $name, int $number): string
{
    $ordinary = match ($number % 10) {
        1 => $number . 'st',
        2 => $number . 'nd',
        3 => $number . 'rd',
        default => $number . 'th',
    };

    $ordinary = match ($number % 100) {
        11, 12, 13 => $number . 'th',
        default => $ordinary,
    };

    return "$name, you are the $ordinary customer we serve today. Thank you!";
}
