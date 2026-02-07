<?php

declare(strict_types=1);

function format(string $name, int $number): string
{
    $ordinary = match ($number % 10) {
        1 => 'st',
        2 => 'nd',
        3 => 'rd',
        default => 'th',
    };

    $ordinary = match ($number % 100) {
        11, 12, 13 => 'th',
        default => $ordinary,
    };

    return "{$name}, you are the {$number}{$ordinary} customer we serve today. Thank you!";
}
