<?php

namespace App\DTO;

final class AnswerDTO
{
    private string $questionUUID;
    private array $choices = [];

    public function __construct(string $questionUUID)
    {
        $this->questionUUID = $questionUUID;
    }

    public function getQuestionUUID()
    {
        return $this->questionUUID;
    }

    public function addChoiceUUID(string $choiceUUID)
    {
        $this->choices[] = $choiceUUID;
    }

    public function getChoices()
    {
        return $this->choices;
    }
}
