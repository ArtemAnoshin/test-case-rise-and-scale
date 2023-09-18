<?php

//<!--// ######## Представьте, что у вас есть мешок риса,##-->
//
//<!--// #####из которого вам нужно отмерить ровно 1 кг.##-->
//
//<!--// ###### В вашем распоряжении простейшие весы с двумя чашами,##-->
//
//<!--// ##### куда можно пересыпать рис, и гирька весом 1 г.##-->
//
//<!--// ## Какое минимальное взвешиваний понадобится, чтобы отмерить 1 кг риса?##-->
//
//<!--// # записать в виде кода-->

// Некое количество чего либо
// Некое количество сколько нам надо
// Весы - взвешиваем
// Что-то, куда можно пересыпать рис
// Мера весовая - эталон.
// Получить какое то количество из общего
// Получить количество взвешиваний

class WeighingService
{

}

class Scale
{
    private int $kettlebell;

    public function __construct(int $kettlebell)
    {
        $this->kettlebell = $kettlebell;
    }

    public function getKettlebellWeight(): int
    {
        return $this->kettlebell;
    }
}

$scale = new Scale(1);
$weightService = new WeighingService();

$scale->setKettlebell(1);

echo '<pre>';
var_dump($weightService);