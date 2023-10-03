<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * ログイン前トップ画面を表示する
     * 
     * @return view
     */
    public function showTop(){

        return view('index');
    }

}
