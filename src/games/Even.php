<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const GAME_NAME = 'Answer "yes" if number even otherwise answer "no".';

function startGame()
{
    $questionGenerator = function () {
        return questionGenerator();
    };

    run(GAME_NAME, $questionGenerator);
}

function questionGenerator(): array
{
    $number = mt_rand(1, 99);

    $rightAnswer = isEven($number) ? 'yes' : 'no';

    return [$number, $rightAnswer];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
