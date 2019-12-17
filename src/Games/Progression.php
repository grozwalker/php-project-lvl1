<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const SEQUENCE_LENGTH = 10;

function startGame()
{
    $getQuestionWithAnswer = function () {
        return getQuestionWithAnswer();
    };

    run(GAME_DESCRIPTION, $getQuestionWithAnswer);
}

function getQuestionWithAnswer()
{
    $startTerm = mt_rand(1, 99);
    $step = mt_rand(1, 9);

    $sequence = getSequence($startTerm, $step, SEQUENCE_LENGTH);

    $hiddenElementPosition = mt_rand(0, count($sequence) - 1);

    $rightAnswer = $sequence[$hiddenElementPosition];

    $sequence[$hiddenElementPosition] = '..';

    return [
        implode(' ', $sequence),
        $rightAnswer,
    ];
}

function getSequence($startTerm, $step, $sequenceLength)
{
    $sequence = [];

    for ($i = 0; $i < $sequenceLength; $i++) {
        $sequence[] = $startTerm + $i * $step;
    }

    return $sequence;
}
