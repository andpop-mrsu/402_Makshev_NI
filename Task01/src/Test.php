<?php

namespace App\Test;

use App\Vector;

function runTest()
{
    $v1 = new Vector(1, 2.5, 4);
    echo "v1 = " . $v1 . "\n"; // (1; 2.5; 4)
    
    $v2 = new Vector(2, 3, -2);
    echo "v2 = " . $v2 . "\n"; // (2; 3; -2)

    $vectorAddition = $v1->add($v2);
    $vectorDifference = $v1->sub($v2);
    $vectorNumberProduct = $v1->product(2);
    $scalarProduct = $v1->scalarProduct($v2);
    $vectorProduct = $v1->vectorProduct($v2);

    echo "Сумма векторов\n";
    echo $vectorAddition; // (3; 5.5; 2)
    echo "\nРазность векторов\n";
    echo $vectorDifference; // (-1; -0.5; 6)
    echo "\nПроизведение вектора на число\n";
    echo $vectorNumberProduct; // (2; 5; 8)
    echo "\nСкалярное произведение векторов\n";
    echo $scalarProduct; // 1.5
    echo "\nВекторное произведение\n";
    echo $vectorProduct; // (17; -10; 2)
}
