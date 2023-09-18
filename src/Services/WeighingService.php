<?php

namespace Isibia\Weighingservice\Services;

use Isibia\Weighingservice\Models\AbstractBag;
use Isibia\Weighingservice\Models\AbstractDish;

class WeighingService
{
    private mixed $scale;
    private AbstractBag $bag;
    private AbstractDish $dish;

    public function __construct(
        WeighingInterface $scale,
        AbstractBag $bag,
        AbstractDish $dish
    )
    {
        $this->scale = $scale;
        $this->bag = $bag;
        $this->dish = $dish;
    }

    public function getWeight(int $int)
    {
    }

    public function getCountOperations()
    {
    }
}