<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startGame()
{
    $getQuestionWithAnswer = function () {
        return getQuestionWithAnswer();
    };

    run(GAME_DESCRIPTION, $getQuestionWithAnswer);
}

function getQuestionWithAnswer()
{
    $question = mt_rand(1, 200);

    $rightAnswer = isPrime($question) ? 'yes' : 'no';

    return [
        $question,
        $rightAnswer,
    ];
}

function isPrime($number): bool
{
    $MIN_DIVIDOR = 2;

    if ($number < $MIN_DIVIDOR) {
        return false;
    }

    $maxDividor = $number / 2;

    for ($d = $MIN_DIVIDOR; $d < $maxDividor; $d++) {
        if ($number % $d === 0) {
            return false;
        }
    }

    return true;
}
