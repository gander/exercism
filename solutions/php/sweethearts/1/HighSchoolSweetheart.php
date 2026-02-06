<?php
declare(strict_types=1);

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return trim($name)[0];
    }

    public function initial(string $name): string
    {
        return mb_strtoupper($this->firstLetter($name)).'.';
    }

    public function initials(string $name): string
    {
        return implode(' ', array_map(fn($i) => $this->initial($i), explode(' ', trim($name))));
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $a = $this->initials($sweetheart_a);
        $b = $this->initials($sweetheart_b);

        return <<<EXPECTED_HEART
         ******       ******
       **      **   **      **
     **         ** **         **
    **            *            **
    **                         **
    **     $a  +  $b     **
     **                       **
       **                   **
         **               **
           **           **
             **       **
               **   **
                 ***
                  *
    EXPECTED_HEART;



    }
}
