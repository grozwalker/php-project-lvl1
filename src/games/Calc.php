<?php

namespace BrainGames\Games\Calc;

const GAME_NAME = 'What is the result of the expression?';

function getConditionals()
{
    $firstTerm = mt_rand(1, 99);
    $secondTerm = mt_rand(1, 99);
    $availableOperations = ['-', '+', '*'];
    $operationCount = count($availableOperations) - 1;

    $operation = $availableOperations[mt_rand(0, $operationCount)];

    return [
        (string) $firstTerm . $operation . (string) $secondTerm,
        [
            'firstTerm' => $firstTerm,
            'operation' => $operation,
            'secondTerm' => $secondTerm,
        ]
    ];
}

function getAnswer(array $conditionals)
{
    [
        'firstTerm' => $firstTerm,
        'operation' => $operation,
        'secondTerm' => $secondTerm
    ] = $conditionals;

    switch ($operation) {
        case '+':
            $correctAnswer = $firstTerm + $secondTerm;
            break;

        case '-':
            $correctAnswer = $firstTerm - $secondTerm;
            break;

        case '*':
            $correctAnswer = $firstTerm * $secondTerm;
            break;

        default:
            $correctAnswer = $firstTerm + $secondTerm;
    }

    return $correctAnswer;
}