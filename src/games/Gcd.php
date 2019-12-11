<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\run;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function startGame()
{
    $getQuestionWithAnswer = function () {
        return getQuestionWithAnswer();
    };

    run(GAME_DESCRIPTION, $getQuestionWithAnswer);
}

function getQuestionWithAnswer()
{
    $firstTerm = mt_rand(1, 99);
    $secondTerm = mt_rand(1, 99);

    $rightAnswer = getGcd($firstTerm, $secondTerm);

    return [
        "{$firstTerm} {$secondTerm}",
        $rightAnswer,
    ];
}

function getGcd($firstTerm, $secondTerm)
{
    while (true) {
        if ($firstTerm === $secondTerm) {
            return $secondTerm;
        }

        if ($firstTerm > $secondTerm) {
            $firstTerm -= $secondTerm;
        } else {
            $secondTerm -= $firstTerm;
        }
    }
}
