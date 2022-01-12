<?php

namespace App\DTO;

use App\DTO\QuestionDTO;

final class QuizDTO
{
    private string $uuid;
    private string $title;
    private array $questions = [];

    public function __construct(string $uuid, string $title)
    {
        $this->uuid = $uuid;
        $this->title = $title;
    }

    public function getUUID()
    {
        return $this->uuid;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function addQuestion(QuestionDTO $question): self
    {
        $this->questions[] = $question;
        
        return $this;
    }

    public function getQuestions(): array
    {
        return $this->questions;
    }
}
