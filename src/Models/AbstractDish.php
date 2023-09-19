<?php

namespace Isibia\Weighingservice\Models;

class AbstractDish
{
    protected int $volume = 0;
    protected int $maxVolume;

    public function __construct(int $maxVolume)
    {
        $this->maxVolume = $maxVolume;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function updateVolume(int $volume): void
    {
        $this->volume += $volume;
    }

    public function getMaxVolume(): int
    {
        return $this->maxVolume;
    }
}
