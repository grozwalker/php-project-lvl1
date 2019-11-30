<?php

namespace BrainGames\Games\Gcd;

const GAME_NAME = 'Find the greatest common divisor of given numbers.';

function getConditionals()
{
    $firstTerm = mt_rand(1, 99);
    $secondTerm = mt_rand(1, 99);


    return [
        "{$firstTerm} {$secondTerm}",
        [
            'firstTerm' => $firstTerm,
            'secondTerm' => $secondTerm,
        ]
    ];
}

function getAnswer(array $conditionals)
{
    [
        'firstTerm' => $firstTerm,
        'secondTerm' => $secondTerm
    ] = $conditionals;

    $correctAnswer = getGcd($firstTerm, $secondTerm);

    return $correctAnswer;
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
