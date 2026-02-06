<?php
declare(strict_types=1);

final class ProgramWindow
{
    public $x = null;
    public $y = null;
    public $height = null;
    public $width = null;

    public function __construct()
    {
        $this->x = 0;
        $this->y = 0;
        $this->height = 600;
        $this->width = 800;
    }

    public function resize(Size $size): void {
        $this->height = $size->height;
        $this->width = $size->width;
    }

    public function move(Position $position): void {
        $this->y = $position->y;
        $this->x = $position->x;
    }
}
