<?php

namespace BrainGames\Games\Progression;

const GAME_NAME = 'What number is missing in the progression?';
const SEQUENCE_LENGTH = 10;

function getConditionals()
{
    $startTerm = mt_rand(1, 99);
    $step = mt_rand(1, 9);

    $hiddenPosition = mt_rand(0, SEQUENCE_LENGTH - 1);

    $sequence = getSequence($startTerm, $step);

    $answer = $sequence[$hiddenPosition];
    $sequence[$hiddenPosition] = '..';

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
    $sequence = [];

    for ($i = 0; $i < SEQUENCE_LENGTH; $i++) {
        $sequence[] = $startTerm + $i * $step;
    }

    return $sequence;
}
