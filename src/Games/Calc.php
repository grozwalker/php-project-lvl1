<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\run;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ['-', '+', '*'];

function startGame()
{
    $getQuestionWithAnswer = function () {
        return getQuestionWithAnswer();
    };

    run(GAME_DESCRIPTION, $getQuestionWithAnswer);
}

function getQuestionWithAnswer()
{
    $firstTerm = mt_rand(1, 99);
    $secondTerm = mt_rand(1, 99);

    $operation = OPERATIONS[array_rand(OPERATIONS)];

    $rightAnswer = getAnswer($firstTerm, $operation, $secondTerm);

    return [
        "$firstTerm $operation $secondTerm",
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
    }

    return $correctAnswer;
}
