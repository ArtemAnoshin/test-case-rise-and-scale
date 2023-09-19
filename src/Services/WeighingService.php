<?php

namespace Isibia\Weighingservice\Services;

use Isibia\Weighingservice\Exceptions\NotEnoughInTheBagException;
use Isibia\Weighingservice\Exceptions\TooSmallDishException;
use Isibia\Weighingservice\Exceptions\NotPossibleGetExactWeight;
use Isibia\Weighingservice\Models\AbstractBag;
use Isibia\Weighingservice\Models\AbstractDish;

class WeighingService
{
    private WeighingInterface $scale;
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

    public function getWeight(int $weight): void
    {
        if ($this->bag->getVolume() < $weight) {
            throw new NotEnoughInTheBagException('Not enough in the bag.', 422);
        }

        if (!$this->isPossibleGetExactWeight($weight)) {
            throw new NotPossibleGetExactWeight('it is not possible to get the exact weight. Change the kettlebell or weight', 422);
        }

        if ($this->dish->getMaxVolume() < $weight) {
            throw new TooSmallDishException('The dish is too small.', 422);
        }

        $this->doWeighing($weight);
    }

    private function isPossibleGetExactWeight(int $weight): bool
    {
        return !($weight % $this->scale->getKettlebell());
    }

    private function doWeighing(int $weight): void
    {
        $remainingWeight = $weight;

        $this->scale->reset();
        do {
            $this->scale->reset();
            do {
                $this->scale->calcCurrentWeight();
            } while ($this->scale->getCurrentWeight() * 4 < $remainingWeight);

            for ($i = 0; $i < 3; $i++) {
                if (($this->dish->getVolume() + $this->scale->getCurrentWeight()) <= $weight) {
                    $this->dish->updateVolume($this->scale->getCurrentWeight());
                    $this->bag->decreaseVolume($this->scale->getCurrentWeight());
                    $remainingWeight -= $this->scale->getCurrentWeight();
                }
            }
        } while ($this->dish->getVolume() < $weight);
    }
}