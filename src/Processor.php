<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const QUESTIONS_COUNT = 3;

function run(string $gameName, callable $getQuestionWithAnswer)
{
    line('Welcome to the Brain Game!');
    line($gameName);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($i = 0; $i < QUESTIONS_COUNT; $i++) {
        [$question, $rightAnswer]  = $getQuestionWithAnswer();

        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        $isCorrectAnswer = $userAnswer == $rightAnswer;

        if ($isCorrectAnswer) {
            line('Correct!');
        } else {
            line("{$userAnswer} is wrong answer ;(. Correct answer was {$rightAnswer}");
            line("Let's try again, %s!", $name);

            return;
        }
    }

    line("Congratulations, %s!", $name);
}
