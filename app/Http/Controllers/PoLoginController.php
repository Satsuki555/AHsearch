<?php
// ペットオーナーログインコントローラー

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class PoLoginController extends Controller
{
    /**
     * ペットオーナーログイン画面を表示
     * 
     * @return view
     */
    public function showPoLogin()
    {
        return view('login.po_login');
    }

    /**
     * 認証の試行を処理(ログイン機能)
     * @param App\Http\Requests\LoginRequest $requset
     */
    public function poLogin(LoginRequest $request)
    {
        //dd($request->all());
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        //dd(Auth::attempt($credentials));

        //ログインが成功していたら
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('search')->with('login_success','ログインしました。');
        }

        //ログインに失敗したら
        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ])->onlyInput('email');
    }

    /**
     * ログアウト画面を表示
     * 
     * @return view
     */
    public function showLogout()
    {
        return view('login.logout');
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('top')->with('logout','ログアウトしました。');
    }
}
