<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Service\QuizResultService;
use App\Service\QuizConvertService;
use App\Service\QuizGetService;
use Illuminate\Http\Request;


use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;


class QuizController extends BaseController
{
    private QuizDTO $quiz;

    private function initialize(){
        $data = QuizGetService::getDataFromArray();
        $this->quiz = QuizConvertService::convertArrayDataToQuizDTO($data);
    }

    public function createQuiz()
    {
        $this->initialize();

        return view('quiz', [
            'quiz' => $this->quiz
        ]);
    }

    public function getResult(Request $request)
    {
        $answers = QuizConvertService::convertRequestToAnswersDTO($request);

        $this->initialize();

        $quizResultService = new QuizResultService($this->quiz, $answers);

        return view('result', [
            'result' => $quizResultService->getResult()
        ]);
    }
}
