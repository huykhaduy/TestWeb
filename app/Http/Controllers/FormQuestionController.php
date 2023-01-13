<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Question;
use App\User;
use Illuminate\Http\Request;


class FormQuestionController extends Controller
{
    public function getAllQuestionInChapter(string $chapter){
        // $chapter = Chapter::find($chapter);
        // $questions = Question::where('chapterId', $chapter->id);
        // $question = new Question;
        // $question->questionId = '1234';
        // $question->title = 'hello world '.$chapter->name;
        // $question->image_url = 'hello.png';
        // $question->point_value = 3;
        // $question->shuffle = true;
        // $question->chapterId = $chapter->id;
        // $question->save();
        // if ($questions->count() == 0)
        //     return false;
        // return true;
        // foreach ($questions as $question){
        //     echo $question->
        // }
        // return $chapter->name;
        // return response()->json([
        //     'questions' => $questions,
        // ]);
        $questions = Chapter::getQuestions($chapter);
        // $questions = Question::find('9836f6b8-d818-4493-bf09-2aea5f286bbc')->first();
        return response()->json([
            'questions' => $questions,
        ]);
        // $users = User::where('id','<', 10)->first();
        // return response()->json([
        //     'questions' => json_encode($users)
        // ]);
    }

    private function toJSONFormat($question_groups){
        foreach( $question_groups as $question_level){
            foreach( $question_level as $question_item){
                Question::find($question_item['id'])->delete();
            }
        }
    }
}
