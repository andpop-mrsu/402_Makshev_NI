<?php 
	namespace NikitaMakshev\Coldhot\Controller;
    use function NikitaMakshev\Coldhot\View\showGame;
    
    function startGame() {
        echo "Game started".PHP_EOL;
        showGame();
    }
?>