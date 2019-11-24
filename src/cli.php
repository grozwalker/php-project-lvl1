<?php

namespace BrainGames\Cli;

use function BrainGames\App\isAnswerCorrect;
use function BrainGames\App\isEven;
use function cli\line;
use function cli\prompt;

const NUMBER_OF_QUESTIONS = 3;

function run()
{

    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $isCorrectAnswer = false;

    for ($i = 0; $i < NUMBER_OF_QUESTIONS; $i++) {
        $number = mt_rand(1, 99);
        line('Question: ' . $number);

        $userAnswer = prompt('Your answer');
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        $isCorrectAnswer = $userAnswer === $correctAnswer;

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
