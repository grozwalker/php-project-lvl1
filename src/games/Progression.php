<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const GAME_NAME = 'What number is missing in the progression?';

function startGame()
{
    $questionGenerator = function () {
        return questionGenerator();
    };

    run(GAME_NAME, $questionGenerator);
}

function questionGenerator()
{
    $startTerm = mt_rand(1, 99);
    $step = mt_rand(1, 9);

    $sequence = getSequence($startTerm, $step);

    $hiddenPosition = mt_rand(0, count($sequence) - 1);

    $rightAnswer = $sequence[$hiddenPosition];

    $sequence[$hiddenPosition] = '..';

    return [
        implode(' ', $sequence),
        $rightAnswer,
    ];
}

function getSequence($startTerm, $step)
{
    $sequenceLength = 10;
    $sequence = [];

    for ($i = 0; $i < $sequenceLength; $i++) {
        $sequence[] = $startTerm + $i * $step;
    }

    return $sequence;
}
