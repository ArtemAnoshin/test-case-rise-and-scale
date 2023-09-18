<?php

require_once 'vendor/autoload.php';

use Isibia\Weighingservice\Models\BagOfRice;
use Isibia\Weighingservice\Models\DishOfRice;
use Isibia\Weighingservice\Models\Scale;
use Isibia\Weighingservice\Services\WeighingService;

try {
    $scale = new Scale(1);
    $bagOfRice = new BagOfRice(10000);
    $dish = new DishOfRice(1200);
    $weightService = new WeighingService($scale, $bagOfRice, $dish);

    echo '<pre>';
    echo 'В мешке было: ' . $bagOfRice->getVolume() . '<br>';
    echo 'В тарелке было: ' . $dish->getVolume() . '<br>';

    echo 'ВЗВЕСИЛИ! ПЕРЕЛОЖИЛИ В ТАРЕЛКУ 1000!<br>';
    $weightService->getWeight(1000);

    echo 'В мешке осталось: ' . $bagOfRice->getVolume() . '<br>';
    echo 'В тарелке сейчас: ' . $dish->getVolume() . '<br>';
    echo 'Количество операций (иттераций): ' . $scale->getCountOperations() . '<br>';
} catch (\InvalidArgumentException $exception) {
    echo 'Error: ' . $exception->getMessage() . '; Code: ' . $exception->getCode();
}
