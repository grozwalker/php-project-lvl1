<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_QUESTIONS = 3;

function run(string $gameName = null)
{
    $namespace = 'BrainGames\Games\\' . ucfirst($gameName) . '\\';
    $getConditionals = $namespace . 'getConditionals';
    $getCorrectAnswer = $namespace . 'getAnswer';

    if (!function_exists($getConditionals) || !function_exists($getCorrectAnswer)) {
        line("Sorry, but we cant find game:(");

        return;
    }

    line('Welcome to the Brain Game!');
    line(constant($namespace . 'GAME_NAME'));

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $isCorrectAnswer = false;

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        [$question, $conditionals]  = $getConditionals();

        line('Question: ' . $question);

        $userAnswer = prompt('Your answer');

        $correctAnswer = $getCorrectAnswer($conditionals);

        $isCorrectAnswer = $userAnswer == $correctAnswer;

        if ($isCorrectAnswer) {
            line('Correct!');
        } else {
            line($userAnswer . ' is wrong answer ;(. Correct answer was ' . $correctAnswer);
            break;
        }
    }

    if ($isCorrectAnswer) {
        line("Congratulations, %s!", $name);
    } else {
        line("Let's try again, %s!", $name);
    }
}
