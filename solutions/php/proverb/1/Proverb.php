<?php

declare(strict_types=1);

class Proverb
{
    private const string LINE = "For want of a %s the %s was lost.";
    private const string LAST = "And all for the want of a %s.";


    public function recite(array $words): array
    {
        if (empty($words)) {
            return [];
        }

        $pairs = array_map(
            null,
            array_slice($words, 0, -1),
            array_slice($words, 1)
        );

        $pairs[] = [array_shift($words), null];

        return array_map(
            fn(array $pair): string => $pair[1] === null
                ? sprintf(self::LAST, $pair[0])
                : vsprintf(self::LINE, $pair),
            $pairs
        );
    }
}
