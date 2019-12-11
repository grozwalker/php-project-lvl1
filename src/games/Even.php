<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const GAME_DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function startGame()
{
    $getQuestionWithAnswer = function () {
        return getQuestionWithAnswer();
    };

    run(GAME_DESCRIPTION, $getQuestionWithAnswer);
}

function getQuestionWithAnswer(): array
{
    $number = mt_rand(1, 99);

    $rightAnswer = isEven($number) ? 'yes' : 'no';

    return [$number, $rightAnswer];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
