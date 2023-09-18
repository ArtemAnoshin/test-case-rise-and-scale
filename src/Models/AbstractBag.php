<?php

namespace Isibia\Weighingservice\Models;

use Isibia\Weighingservice\Exceptions\BagEmptyException;

class AbstractBag
{
    protected int $volume;

    public function __construct(int $volume)
    {
        if ($volume === 0) {
            throw new BagEmptyException('Your bag is empty.', 422);
        }

        $this->volume = $volume;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }
}
