<?php

namespace Isibia\Weighingservice\Models;

use Isibia\Weighingservice\Services\WeighingInterface;

class Scale implements WeighingInterface
{
    private int $kettlebell;
    private int $bowlLeft = 0;
    private int $bowlRight = 0;
    private int $countOperations = 0;

    public function __construct(int $kettlebell)
    {
        $this->kettlebell = $kettlebell;
    }

    public function getKettlebell(): int
    {
        return $this->kettlebell;
    }

    public function getBowlLeft(): int
    {
        return $this->bowlLeft;
    }

    public function setBowlLeft(int $bowlLeft): void
    {
        $this->bowlLeft = $bowlLeft;
    }

    public function getBowlRight(): int
    {
        return $this->bowlRight;
    }

    public function setBowlRight(int $bowlRight): void
    {
        $this->bowlRight = $bowlRight;
    }

    public function getKettlebellWeight(): int
    {
        return $this->kettlebell;
    }

    public function getCountOperations()
    {
        return $this->countOperations;
    }
}