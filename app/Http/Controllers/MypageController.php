<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    /**
     * マイページを表示
     * 
     * @return view
     */
    public function showMypage()
    {
        return view('mypage.mypage');
    }


    /**
     * ペットオーナー用マイページを表示
     * 
     * @return view
     */
    public function showPoMypage()
    {
        return view('mypage.po_mypage');
    }

    /**
     * 動物病院用マイページを表示
     * 
     * @return view
     */
    public function showAhMypage()
    {
        return view('mypage.ah_mypage');
    }

    /**
     * 管理ユーザ用マイページを表示
     * 
     * @return view
     */
    public function showMMypage()
    {
        return view('mypage.m_mypage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
