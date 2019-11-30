<?php

namespace BrainGames\Games\Progression;

const GAME_NAME = 'What number is missing in the progression?';

function getConditionals()
{
    $startTerm = mt_rand(1, 99);
    $step = mt_rand(1, 9);

    $sequence = getSequence($startTerm, $step);

    $hiddenPosition = mt_rand(0, count($sequence) - 1);

    $sequence[$hiddenPosition] = '..';

    $answer = $sequence[$hiddenPosition];

    return [
        (string) implode(' ', $sequence),
        [
            'answer' => $answer,
        ]
    ];
}

function getAnswer(array $conditionals)
{
    [
        'answer' => $answer,
    ] = $conditionals;

    return $answer;
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
