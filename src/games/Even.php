<?php

namespace BrainGames\Games\Even;

const GAME_NAME = 'Answer "yes" if number even otherwise answer "no".';

function getConditionals()
{
    $number = mt_rand(1, 99);

    return [
        $number,
        [
            'number' => $number,
        ]
    ];
}

function getAnswer(array $conditionals)
{
    ['number' => $number] = $conditionals;

    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return $correctAnswer;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
