<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;

use Exception;
use Illuminate\Http\Request;

class QuizGetService
{
    public static function getDataFromArray(): array
    {
        return [
            'title' => 'PHP-quiz',
            'questions' => [
                ['text' => 'Who is known as the father of PHP?', 'choices' => [
                    ['Linus Torvalds', false],
                    ['Rasmus Lerdorf', true],
                    ['Brendan Eich', false],
                    ['Bill Gates', false]
                ]],
                ['text' => 'Which of the following frameworks was created for PHP-web-artisans?', 'choices' => [
                    ['Laravel', true],
                    ['React', false],
                    ['Angular', false],
                    ['Bootstrap', false]
                ]],
                ['text' => 'How to get the length of a string in PHP?', 'choices' => [
                    ['strlen()', true],
                    ['strlength()', false],
                    ['stringlen()', false],
                    ['stringlength()', false]
                ]],
                ['text' => 'What are the differences between echo and print in PHP?', 'choices' => [
                    ['echo returns a value whereas print does not return a value', false],
                    ['echo does not return a value whereas print returns a value of true', false],
                    ['echo does not return a value whereas print returns a value of 1', true],
                    ['echo can accept multiple parameters while print can only take a single argument', true]
                ]],
                ['text' => 'What are the expressions to be used to include and evaluate the specified file?', 'choices' => [
                    ['include()', true],
                    ['insert()', false],
                    ['require()', true],
                    ['request()', false]
                ]],
//                ['text' => '', 'choices' => [
//                    ['', false],
//                    ['', false],
//                    ['', false],
//                    ['', false]
//                ]],
            ]
        ];
    }

    public static function getDataFromDB()
    {
        //
    }
}
