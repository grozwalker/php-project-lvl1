<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\run;

const GAME_NAME = 'What is the result of the expression?';
const OPERATIONS = ['-', '+', '*'];

function startGame()
{
    $questionGenerator = function () {
        return questionGenerator();
    };

    run(GAME_NAME, $questionGenerator);
}

function questionGenerator()
{
    $firstTerm = mt_rand(1, 99);
    $secondTerm = mt_rand(1, 99);
    $operationsCount = count(OPERATIONS) - 1;

    $operation = OPERATIONS[mt_rand(0, $operationsCount)];

    $rightAnswer = getAnswer($firstTerm, $operation, $secondTerm);

    return [
        "{$firstTerm} {$operation} {$secondTerm}",
        $rightAnswer
    ];
}

function getAnswer(int $firstTerm, string $operation, int $secondTerm): int
{
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
