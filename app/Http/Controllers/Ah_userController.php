<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\AhRegistrationRequest;

use Illuminate\Support\Facades\Hash;

class Ah_userController extends Controller
{
    /**
     * 動物病院ログイン画面を表示
     * 
     * @return view
     */
    public function showAhLogin()
    {
        return view('login.ah_login');
    }

    /**
     * 動物病院新規登録画面を表示
     * 
     * @return view
     */
    public function showAhRegi()
    {
        return view('registration.ah_registration');
    }

    /**
     * 動物病院新規登録確認画面
     */
    public function AhRegiConfirm(AhRegistrationRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $registration = $request -> all();
        //dd($contact);

        //確認画面のviewに変数を渡して表示
        return view('registration.ah_user_confirm', [
            'registration' => $registration,
        ]);

    }

    /**
     * 動物病院新規登録完了画面
     */
    public function AhRegiComplet(Request $request)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $registration = $request -> except('action');
        //dd($contact);

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('ah_registration')
                ->withInput($registration);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            //トランザクション
            \DB::beginTransaction();

            try {

                //dd($contact);
                //ah新規会員を登録
                User::create([
                    'name' => $registration['name'],
                    'kana' => $registration['kana'],
                    'tel' => $registration['tel'],
                    'email' => $registration['email'],
                    'password' => Hash::make($registration['password']),
                    'role' => $registration['role'],
                ]);
                //dd($contact);
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('registration.ah_user_complet');
        }
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
