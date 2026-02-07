<?php

declare(strict_types=1);

function format(string $name, int $number): string
{
    $ordinal = match (true) {
        $number % 10 === 1 && $number % 100 !== 11 => 'st',
        $number % 10 === 2 && $number % 100 !== 12 => 'nd',
        $number % 10 === 3 && $number % 100 !== 13 => 'rd',
        default => 'th',
    };

    return "{$name}, you are the {$number}{$ordinal} customer we serve today. Thank you!";
}
