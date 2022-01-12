<?php

namespace App\DTO;

use App\DTO\AnswerDTO;

final class AnswersDTO
{
    private string $quizUUID;
    private array $answers = [];

    public function __construct(string $quizUUID)
    {
        $this->quizUUID = $quizUUID;
    }

    public function getQuizUUID()
    {
        return $this->quizUUID;
    }

    public function addAnswer(AnswerDTO $answer)
    {
        $this->answers[] = $answer;
    }

    public function getAnswers()
    {
        return $this->answers;
    }
}
