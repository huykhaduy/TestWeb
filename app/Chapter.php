<?php

namespace App;

use Illuminate\Support\Str;
use App\GoogleForm\GoogleAPI;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    //
    protected $table = 'chapter';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public static function getQuestions(string $chapterId){
        $chapter = Chapter::find($chapterId);
        $count_question = Question::where('chapterId', $chapter->id)->count();
        $chapter_form = Chapter::getFormIdInUrl($chapter->lesson_link);
        if ($count_question == 0){
            $google = new GoogleAPI();
            $form = $google->get_form_id($chapter_form);
            $formItem = $form->getItems();

            $current_level = 1;
            foreach ($formItem as $item){
                if ($item->getQuestionItem() == null){
                    // Page break;
                    $current_level++;
                    continue;
                }
                $title = $item->getTitle();
                $questionItem = $item->getQuestionItem();
                $choices = $questionItem->getQuestion()->getChoiceQuestion()->getOptions();
                $shuffle = $questionItem->getQuestion()->getChoiceQuestion()->getShuffle();
                if ($shuffle == null){
                    $shuffle = false;
                }
                $question_type = $questionItem->getQuestion()->getChoiceQuestion()->getType();
                $point_value = $questionItem->getQuestion()->getGrading()->getPointValue();
                $answers = $questionItem->getQuestion()->getGrading()->getCorrectAnswers()->getAnswers();
                
                $question = new Question;
                $question_id = (string) Str::orderedUuid();
                $question->title = $title;
                $question->question_level = $current_level;
                $question->question_type = $question_type;
                $question->question_description = "";
                $question->point_value = $point_value;
                $question->shuffle = $shuffle;
                if ($questionItem->getImage() != null){
                    $question->image_url = $questionItem->getImage()->getContentUri();
                }
                $question->chapterId = $chapter->id;
                $question->questionId = $question_id;
                $question->save();

                foreach($choices as $choice){
                    $choiceItem = new Choice;
                    if ($choice->getImage() != null){
                        $choiceItem->image_url = $choice->getImage()->getContentUri();
                    }
                    $choiceItem->choice_value = $choice->getValue();
                    $choiceItem->questionId = $question_id;
                    foreach($answers as $answer){
                        if (strcmp($answer->getValue(), $choice->getValue()) == 0){
                            $choiceItem->isTrue = true;
                            break;
                        }
                    }
                    $choiceItem->save();
                }
            }
        }

        // $max_level = Question::where('chapterId', $chapter->id)->max('question_level');
        // $question_groups = array();
        // for ($i = 1; $i <= $max_level; $i++) {
        //     $questions_level = Question::where('chapterId', $chapter->id)
        //         ->where('question_level', $i)
        //         ->with('choices')
        //         ->inRandomOrder()->get();
        //     array_push($question_groups, $questions_level);
        // }
        $questions_level = Question::where('chapterId', $chapter->id)
            ->inRandomOrder()
            ->select('questionId', 'title', 'question_description', 'question_type', 'image_url', 'point_value')
            ->with([
                'choices' => function ($query) {
                    $query->when('shuffle' == true, function ($q) {
                        return $q->inRandomOrder();
                    });
                    $query->when('shuffle' == false, function($q){
                        return $q;
                    });
                }])
            ->get();
        $sort_value = $questions_level->sortBy(function ($item, $key) {
            return $item['question_level'];
        });

        $ouput = $sort_value->values()->all();
        return $ouput;

        // $subset = collect($ouput)->map(function ($item) {
        //     return collect($item->toArray())
        //         ->only(['questionId', 'choices'])
        //         ->all();
        // });
        // return $subset;
        
        // return $sort_value->values()->all();

    }

    private static function getFormIdInUrl(string $form_url){
        $splitArr = explode('/', $form_url);
        $maxLen = 0;
        $maxStr = '';
        for ($i = 0; $i < count($splitArr); $i++){
            if ($maxLen < strlen($splitArr[$i])) {
                $maxLen = strlen($splitArr[$i]);
                $maxStr = $splitArr[$i];
            }
        }
        if ($maxLen > 20){
            return $maxStr;
        }
        throw new \Exception('Form ID is not valid');
    }

    public function questions(){
        return $this->hasMany('App\Question', 'chapterId', 'id');
    }

    public function choices()
    {
        return $this->hasManyThrough(Choice::class, Question::class, 'chapterId', 'questionId', 'id', 'questionId');
    }

    /* 3 cách: 
        1. Gửi cả dữ liệu random từ database

        2. Gửi structure rồi từ structure yêu cầu từng câu hỏi

        3. Gửi structure rồi từ structure sẽ yêu cầu từ từ
    */
}
