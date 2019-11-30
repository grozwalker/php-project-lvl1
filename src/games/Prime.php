<?php

namespace BrainGames\Games\Prime;

const GAME_NAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getConditionals()
{
    $number = mt_rand(1, 200);

    return [
        (string) $number,
        [
            'number' => $number,
        ]
    ];
}

function getAnswer(array $conditionals)
{
    [
        'number' => $number,
    ] = $conditionals;

    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    return $correctAnswer;
}

function isPrime($number): bool
{
    $primes = [
        2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31,
       37, 41, 43, 47, 53, 59, 61, 67, 71, 73,
       79, 83, 89, 97, 101, 103, 107, 109, 113,
       127, 131, 137, 139, 149, 151, 157, 163,
       167, 173, 179, 181, 191, 193, 197, 199
    ];

    $isPrime = in_array($number, $primes);

    return $isPrime;
}
