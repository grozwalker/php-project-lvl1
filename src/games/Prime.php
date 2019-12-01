<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const GAME_NAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startGame()
{
    $questionGenerator = function () {
        return questionGenerator();
    };

    run(GAME_NAME, $questionGenerator);
}

function questionGenerator()
{
    $number = mt_rand(1, 200);

    $rightAnswer = isPrime($number) ? 'yes' : 'no';

    return [
        (string) $number,
        $rightAnswer,
    ];
}

function isPrime($number): bool
{
    $MIN_DIVIDOR = 2;

    $maxDividor = $number / 2;

    for ($d = $MIN_DIVIDOR; $d < $maxDividor; $d++) {
        if ($number % $d === 0) {
            return false;
        }
    }

    return true;
}
