<?php

namespace App\DTO;

final class ChoiceDTO
{
    private string $uuid;
    private string $text;
    private bool $isCorrect;

    public function __construct(
        string $uuid, 
        string $text,
        bool $isCorrect
    ) {
        $this->uuid = $uuid;
        $this->text = $text;
        $this->isCorrect = $isCorrect;
    }

    public function getUUID()
    {
        return $this->uuid;
    }

    public function getText()
    {
        return $this->text;
    }

    public function isCorrect()
    {
        return $this->isCorrect;
    }
}
