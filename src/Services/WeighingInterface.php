<?php

namespace Isibia\Weighingservice\Services;

interface WeighingInterface
{
    public function reset(): void;
    public function getKettlebell(): int;
    public function getCountOperations(): int;
    public function getCurrentWeight(): int;
    public function calcCurrentWeight(): void;
    public function increaseCountOperations(): void;
}