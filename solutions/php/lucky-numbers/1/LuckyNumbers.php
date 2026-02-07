<?php
declare(strict_types=1);

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        return (int)implode("", $digitsOfNumber1) + (int)implode("", $digitsOfNumber2);
    }

    public function isPalindrome(int $number): bool
    {
        return (int)implode('', array_reverse(str_split((string) $number))) === $number;
    }

    public function validate(string $input): string
    {
        if ($input === '') {
            return 'Required field';
        }

        if ((int)$input > 0) {
            return '';
        }

        return 'Must be a whole number larger than 0';

    }
}
