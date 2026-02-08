<?php
declare(strict_types=1);

use Random\Randomizer;

readonly class SimpleCipher
{
    public string $key;
    private array $shifts;

    public function __construct(?string $key = null)
    {
        $this->key = $key ?? new Randomizer()->getBytesFromString('abcdefghilkmnopqrstuvwxyz', 100);

        if (!ctype_lower($this->key) || !ctype_alpha($this->key)) {
            throw new InvalidArgumentException('Key must contain only lowercase letters.');
        }

        $this->shifts = array_map(fn(string $l) => ord(strtoupper($l)) - 65, str_split($this->key));
    }

    public function encode(string $plainText): string
    {
        $letters = str_split($plainText);

        foreach ($letters as $index => $letter) {
            $letters[$index] = $this->encodeLetter($letter, $index);
        }

        return implode('', $letters);
    }

    public function decode(string $cipherText): string
    {
        $letters = str_split($cipherText);

        foreach ($letters as $index => $letter) {
            $letters[$index] = $this->decodeLetter($letter, $index);
        }

        return implode('', $letters);
    }


    function encodeLetter(string $letter, int $index): string
    {
        if ($letter >= 'A' && $letter <= 'Z') {
            $position = ord($letter) - 65;
            $shiftedPosition = ($position + $this->shifts[$index]) % 26;
            return chr($shiftedPosition + 65);
        }

        if ($letter >= 'a' && $letter <= 'z') {
            $position = ord($letter) - 97;
            $shiftedPosition = ($position + $this->shifts[$index]) % 26;
            return chr($shiftedPosition + 97);
        }

        return $letter;
    }

    function decodeLetter(string $letter, int $index): string
    {
        if ($letter >= 'A' && $letter <= 'Z') {
            $position = ord($letter) - 65;
            $shiftedPosition = ($position - $this->shifts[$index] + 26) % 26;
            return chr($shiftedPosition + 65);
        }

        if ($letter >= 'a' && $letter <= 'z') {
            $position = ord($letter) - 97;
            $shiftedPosition = ($position - $this->shifts[$index] + 26) % 26;
            return chr($shiftedPosition + 97);
        }

        return $letter;
    }
}
