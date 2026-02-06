<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $pizzas, int $persons): int
    {
        return $pizzas * (($persons * 20) + 200);
    }

    public function calculateSauceRequirement(int $pizzas, int $volume): int
    {
        return ($pizzas * 125) / $volume;
    }

    public function calculateCheeseCubeCoverage(int $cheese_dimension, float $thickness, int $diameter): int
    {
        return floor(($cheese_dimension ** 3) / ($thickness * M_PI * $diameter));
    }

    public function calculateLeftOverSlices(int $pizzas, int $friends): int
    {
        return ($pizzas * 8) % $friends;
    }
}
