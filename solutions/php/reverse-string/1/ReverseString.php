<?php

declare(strict_types=1);

function reverseString(string $text): string
{
    return implode('', array_reverse(str_split($text)));
}
