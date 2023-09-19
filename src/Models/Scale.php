<?php

namespace Isibia\Weighingservice\Models;

use Isibia\Weighingservice\Services\WeighingInterface;

class Scale implements WeighingInterface
{
    private int $kettlebell;
    private int $countOperations = 0;
    private int $currentWeight = 0;

    public function __construct(int $kettlebell)
    {
        $this->kettlebell = $kettlebell;
    }

    public function getKettlebell(): int { return $this->kettlebell; }
    public function getCountOperations(): int { return $this->countOperations; }
    public function getCurrentWeight(): int { return $this->currentWeight; }

    public function increaseCountOperations(): void
    {
        $this->countOperations++;
    }

    public function reset(): void
    {
        $this->currentWeight = $this->getKettlebell();
        $this->increaseCountOperations();
    }

    public function calcCurrentWeight(): void
    {
        $this->currentWeight *= 2;
        $this->increaseCountOperations();
    }
}