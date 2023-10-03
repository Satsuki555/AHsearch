<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\MemberRequest;

class UserController extends Controller
{
    /**
     * ログインしているユーザの会員情報の画面を表示
     * (ペットオーナーと管理ユーザ)
     * 
     * @return view
     */
    public function showMember()
    {
        $user = Auth::user();
        return view('mypage.member.member',['user' => $user]);
    }

    /**
     * ログインしているユーザの会員情報の画面を表示
     * (動物病院ユーザ)
     * 
     * @return view
     */
    public function showAhMember()
    {
        $user = Auth::user();
        return view('mypage.member.ah_member',['user' => $user]);
    }

    /**
     * ログインしているユーザの会員情報の変更画面を表示
     * (ペットオーナーと管理ユーザ)
     * 
     * @return view
     */
    public function showMemberChange($id)
    {
        $user = User::find($id);

        return view('mypage.member.member_change',['user' => $user]);
    }

    /**
     * ログインしているユーザの会員情報の変更画面を表示
     * (動物病院ユーザ)
     * 
     * @return view
     */
    public function showAhMemberChange($id)
    {
        $user = User::find($id);

        return view('mypage.member.ah_member_change',['user' => $user]);
    }

    /**
     * ログインしている会員情報変更確認画面
     * (ペットオーナーと管理ユーザ)
     */
    public function memberConfirm (MemberRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $member = $request -> all();
        //dd($registration);

        //確認画面のviewに変数を渡して表示
        return view('mypage.member.member_confirm', [
            'member' => $member,
        ]);

    }

    /**
     * ログインしている会員情報変更確認画面
     * (動物病院ユーザ)
     */
    public function ahMemberConfirm (MemberRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $member = $request -> all();
        //dd($registration);

        //確認画面のviewに変数を渡して表示
        return view('mypage.member.ah_member_confirm', [
            'member' => $member,
        ]);

    }

    /**
     * ログインしている会員情報変更完了画面
     */
    public function memberComplet(Request $request)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $member = $request -> except('action');
        // dd($member);

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('member_change',$member['id'])
                ->withInput($member);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            //トランザクション
            \DB::beginTransaction();

            try {
                //編集した会員情報を更新
                $input = User::find($member['id']);
                //dd($contact);
                $input -> fill([
                    'name' => $member['name'],
                    'kana' => $member['kana'],
                    'tel' => $member['tel'],
                    'email' => $member['email'],
                ]);
                $input -> save();
                //dd($contact);
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('mypage.member.member_complet');
        }
    }

    /**
     * 会員情報一覧画面を表示
     * 
     * @return view
     */
    public function showUserList()
    {
        $users = User::all();
        // dd($users);

        return view('mypage.list.user_list',['users' => $users]);
    }

    /**
     * 会員情報一覧詳細画面を表示
     * (ペットオーナー、管理ユーザ)
     * 
     * @return view
     */
    public function UserListDetail($id)
    {
        $user = User::find($id);
        // dd($users);

        if(is_null($user)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('user_list'));
        }

        return view('mypage.list.user_list_detail',['user' => $user]);
    }

    /**
     * 会員情報一覧詳細画面を表示
     * (動物病院ユーザ)
     * 
     * @return view
     */
    public function AhUserListDetail($id)
    {
        $user = User::find($id);
        // dd($user);

        if(is_null($user)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('user_list'));
        }

        return view('mypage.list.ah_user_list_detail',['user' => $user]);
    }

    /**
     * 会員情報の削除完了画面を表示
     * @param int $id
     * @return view
     */
    public function UserDelete($id)
    {
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('user_list'));
        }

        try {

            // dd($pet['user_id']);
            //削除
            User::destroy($id);
            //dd($contact);
        } catch(\Throwable $e) {
            //abort(500);
            echo "接続失敗: " . $e -> getMessage() . "\n";
            exit();
        }

        return view('mypage.list.user_delete');
    }


}
