<?php

declare(strict_types=1);

function from(DateTimeImmutable $date): DateTimeImmutable
{
    return $date->modify(sprintf('+%d seconds', 1_000_000_000));
}
