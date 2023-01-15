<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function getHome(){
        return view('user.home');
    }
    public function showChapter(Request $request){
        $chap_id = $request->get('chap');
        $data = null;
        if($chap_id){
            $data =  DB::table('chapter')->where('id', $chap_id)
                ->first();
        }
        return view('user.chapter_detail', ['data' => $data]);
    }
    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }
}
