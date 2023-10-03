<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Contact Modelを呼び出す
use App\Models\Contact;

//バリデーションの必要なRequestクラスを呼び出す
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * お問い合わせ入力画面を表示
     * 
     * @return view
     */
    public function showContact()
    {
        return view('contact.contact');
    }

    /**
     * お問い合わせ確認画面
     */
    public function ContactConfirm(ContactRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $contact = $request -> all();
        //dd($contact);

        //確認画面のviewに変数を渡して表示
        return view('contact.c_confirm', [
            'contact' => $contact,
        ]);

    }

    /**
     * お問い合わせ完了画面
     */
    public function ContactComplet(Request $request)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $contact = $request -> except('action');
        //dd($contact);

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('contact')
                ->withInput($contact);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            //トランザクション
            \DB::beginTransaction();

            try {

                //dd($contact);
                //お問い合わせを登録
                Contact::create($contact);
                //dd($contact);
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('contact.c_complet');
        }
    }

    /**
     * お問い合わせ一覧画面を表示
     * 
     * @return view
     */
    public function showContactList()
    {
        $contacts = Contact::all();
        return view('mypage.list.contact_list',['contacts' => $contacts]);
    }

    /**
     * お問い合わせ一覧詳細画面を表示
     * 
     * @return view
     */
    public function ContactListDetail($id)
    {
        $contact = Contact::find($id);
        // dd($contact);

        if(is_null($contact)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('contact_list'));
        }

        return view('mypage.list.contact_list_detail',['contact' => $contact]);
    }

    /**
     * お問い合わせの削除完了画面を表示
     * @param int $id
     * @return view
     */
    public function ContactDelete($id)
    {
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('contact_list'));
        }

        try {

            // dd($pet['user_id']);
            //削除
            Contact::destroy($id);
            //dd($contact);
        } catch(\Throwable $e) {
            //abort(500);
            echo "接続失敗: " . $e -> getMessage() . "\n";
            exit();
        }

        return view('mypage.list.contact_delete');
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
