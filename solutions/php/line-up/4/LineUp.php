<?php

declare(strict_types=1);

function format(string $name, int $number): string
{
    $lastOne = $number % 10;
    $lastTwo = $number % 100;

    $ordinal = match (true) {
        $lastOne === 1 && $lastTwo !== 11 => 'st',
        $lastOne === 2 && $lastTwo !== 12 => 'nd',
        $lastOne === 3 && $lastTwo !== 13 => 'rd',
        default => 'th',
    };

    return "{$name}, you are the {$number}{$ordinal} customer we serve today. Thank you!";
}
