<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_QUESTIONS = 3;

function run(string $gameName, callable $questionGenerator)
{
    line('Welcome to the Brain Game!');
    line($gameName);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $isCorrectAnswer = false;

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        [$question, $rightAnswer]  = $questionGenerator();

        line('Question: ' . $question);

        $userAnswer = prompt('Your answer');

        $isCorrectAnswer = $userAnswer == $rightAnswer;

        if ($isCorrectAnswer) {
            line('Correct!');
        } else {
            line($userAnswer . ' is wrong answer ;(. Correct answer was ' . $rightAnswer);
            break;
        }
    }

    if ($isCorrectAnswer) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
