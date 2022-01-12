<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;

use Exception;
use Illuminate\Http\Request;

class QuizConvertService
{
    public static function convertArrayDataToQuizDTO(array $data): QuizDTO
    {
        $quizDTO = new QuizDTO('1', $data['title']);

        foreach ($data['questions'] as $key => $question) {
            $questionDTO = new QuestionDTO('1-' . ($key + 1), $question['text']);
            foreach ($question['choices'] as $key2 => $choice) {
                $choiceDTO = new ChoiceDTO('1-' . ($key + 1) . '-' . ($key2 + 1), $choice[0], $choice[1]);
                $questionDTO->addChoice($choiceDTO);
            }
            $quizDTO->addQuestion($questionDTO);
        }

        return $quizDTO;
    }

    public static function convertDBDataToQuizDTO()
    {
        //
    }

    public static function convertRequestToAnswersDTO(Request $request): AnswersDTO
    {
        $req = $request->all();
        array_shift($req);

        $answersDTO = new AnswersDTO('1');

        foreach ($req as $key => $answer) {
            $answerDTO = new AnswerDTO($key);
            foreach ($answer as $choice) $answerDTO->addChoiceUUID($choice);
            $answersDTO->addAnswer($answerDTO);
        }

        return $answersDTO;
    }
}
