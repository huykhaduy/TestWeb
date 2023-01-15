<?php

namespace App\Http\Controllers;

use App\User;
use App\GoogleForm\GoogleAPI;
use Google\Service\Forms\CorrectAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GoogleFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function goLogin(Request $request)
    {
        $google = new GoogleAPI();
        $form = $google->get_form_id('1wZd9WZ8mBRDcniFlM3KeGm6KbdjF-vH47T1rprLROpc');

        // Lấy tiêu đề 
        $form->getInfo()->getTitle();
        // Lấy mô tả
        $form->getInfo()->getDescription();
        // Lấy tiêu đề tài liệu
        $form->getInfo()->getDocumentTitle();

        foreach ($form->getItems() as $item) {
            //     $item->getQuestionGroupItem()->getQuestions()
            //     $item->getTitle();
            //     $item->getImageItem();
            // $item->getQuestionItem()->getQuestion();
            // Lấy câu hỏi
            $item->getTitle();
            // Lấy hình ảnh câu hỏi
            $item->getQuestionItem()->getImage();
            // Lấy các đáp án đúng
            $item->getQuestionItem()->getQuestion()->getGrading()->getCorrectAnswers();
            // Lấy các đáp án
            $item->getQuestionItem()->getQuestion()->getChoiceQuestion();
            //     $item->getQuestionItem();
            //     new Google/Service/Forms/CorrectAnswers
            //     $item->getDescription();
        }
        return view('test_google', ['form' => $form->getItems(), 'json' => json_encode($form, JSON_PRETTY_PRINT)]);
    }

    public function show(){
        $form = User::all();
        return view('test_google', ['json' => json_encode($form)]);
    }
}