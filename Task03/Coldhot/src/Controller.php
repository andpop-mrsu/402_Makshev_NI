<?php 
	namespace NikitaMakshev\Coldhot\Controller;
    use function NikitaMakshev\Coldhot\View\showGame;

function startGame()
{
    showGame();

    $array = array(0, 1, 2, 3, 4, 5, 7, 8, 9);
    shuffle($array);
    $currentNumber = array($array[0], $array[1], $array[2]);
    $number = 0;

    while ($number != $currentNumber) {
        $number = readline("Enter your number: ");
        $numberArray = str_split($number);
        if (strlen($number)!=3) {
            echo "Number must be three-digit\n";
        } else {
            if ($numberArray == $currentNumber) {
                echo "You won!\n";
                exit;
            } else {
                $hot_array = array_intersect_assoc($numberArray, $currentNumber);
                $heat_array = array_intersect($numberArray, $currentNumber);
                if (count($hot_array) != 0) {
                    echo("Горячо!\n");
                } elseif (count($heat_array) != 0) {
                    echo("Тепло!\n");
                } else echo "Холодно!\n";
            }
        }
    }
}
