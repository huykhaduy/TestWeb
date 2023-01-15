<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Question;
use App\User;
use Illuminate\Http\Request;


class FormQuestionController extends Controller
{
    public function getAllQuestionInChapter(string $chapter){
       
        $questions = Chapter::getQuestions($chapter);
        // $questions = Question::find('9836f6b8-d818-4493-bf09-2aea5f286bbc')->first();
        // $questions = Chapter::find(1)->with('choices')->first();
        // $questions = Question::where('chapterId', $chapter)->with('choices')->first();
        // return response()->json([
        //     'questions' => $questions,
        // ]);

        return response()->json(
            ['questions' => $questions],
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }


}
