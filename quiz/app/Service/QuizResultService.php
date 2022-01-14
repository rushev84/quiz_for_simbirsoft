<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;

use Exception;

class QuizResultService
{
    private QuizDTO $quiz;
    private AnswersDTO $answers;

    public function __construct(QuizDTO $quiz, AnswersDTO $answers)
    {
        $this->quiz = $quiz;
        $this->answers = $answers;
    }

    public function getResult(): float
    {
        // your code here

        $count_of_right_answers = 0;

        $all_right_choices = [];

        foreach ($this->quiz->getQuestions() as $question) {
            $choices = $question->getChoices();
            $right_choices = [];
            foreach ($choices as $choice) {
                if ($choice->isCorrect() === true) {
                    $right_choices[] = $choice->getUUID();
                }
            }
            $all_right_choices[] = $right_choices;
        }

        $all_user_choices = [];

        foreach ($this->answers->getAnswers() as $answer) {
            $choices = $answer->getChoices();
            $all_user_choices[] = $choices;
        }

        for ($i = 0; $i < count($all_right_choices); $i++) {
            if ($all_right_choices[$i] === $all_user_choices[$i]) $count_of_right_answers++;
        }

        return round($count_of_right_answers/count($all_right_choices), 2);
    }
}
