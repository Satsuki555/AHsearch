<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AhRequest;

use App\Models\Ah;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class AhController extends Controller
{
    /**
     * ログインしているユーザの
     * 動物病院一覧画面を表示
     * 
     * @return view
     */
    public function showAh()
    {
        // $ahs = \Auth::user()->ah;
        $ahs = Ah::where('user_id', \Auth::user()->id)->get();
        // dd($ahs);

        return view('mypage.ah.ah',['ahs' => $ahs]);
    }

    /**
     * 管理画面からの
     * 動物病院一覧画面を表示
     * 
     * @return view
     */
    public function ListAh($id)
    {
        $user_id = $id;
        // dd($user_id);
        $ahs = Ah::where('user_id', $user_id)->get();
        // dd($pets);

        return view('mypage.list.ah_list',['ahs' => $ahs, 'user_id' => $user_id]);
    }

    /**
     * 病院情報　新規登録画面を表示
     * 
     * @return view
     */
    public function showAhMake()
    {
        $user = Auth::user();

        return view('mypage.ah.ah_make',['user' => $user]);
    }

    /**
     * ログインしているユーザの
     * 病院情報 詳細画面を表示
     * @param int $id
     * @return view
     */
    public function AhDetail($id)
    {
        $ah = Ah::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($ah)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ah'));
        }

        return view('mypage.ah.ah_detail',['ah' => $ah]);
    }

    /**
     * 病院情報 新規登録確認画面
     */
    public function AhConfirm(AhRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $ah = $request -> all();
        // dd($pet);

        
        //確認画面のviewに変数を渡して表示
        return view('mypage.ah.ah_confirm', [
            'ah' => $ah,
        ]);
            

    }

    /**
     * 病院情報 新規登録完了画面
     */
    public function AhComplet(Request $request)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $ah = $request -> except('action');
        // dd($ah['user_id']);
        
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('ah_make')
                ->withInput($ah);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            // dd($name);

            //トランザクション
            \DB::beginTransaction();

            try {

                // dd($ah['user_id']);
                //うちの子カルテの新規を登録
                Ah::create([
                    'name' => $ah['name'],
                    'explanation' => $ah['explanation'],
                    'time' => $ah['time'],
                    'animal' => $ah['animal'],
                    'emergency' => $ah['emergency'],
                    'trimming' => $ah['trimming'],
                    'hotel' => $ah['hotel'],
                    'reservation' => $ah['reservation'],
                    'address' => $ah['address'],
                    'tel' => $ah['tel'],
                    'parking' => $ah['parking'],
                    'insurance' => $ah['insurance'],
                    'hp' => $ah['hp'],
                    'user_id' => $ah['user_id'],
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
            return view('mypage.ah.ah_complet');
        }
    }

    /**
     * ログインしているユーザの
     * 病院情報　編集画面を表示
     * @param int $id
     * @return view
     */
    public function AhUpdate($id)
    {
        $ah = Ah::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($ah)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ah'));
        }

        return view('mypage.ah.ah_update',['ah' => $ah]);
    }

    /**
     * ログインしているユーザの
     * 動物病院　編集確認画面を表示
     * 
     * @return view
     */
    public function AhUpdateConfirm(AhRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $ah = $request -> all();
        // dd($pet['pet_img']);

        //確認画面のviewに変数を渡して表示
        return view('mypage.ah.ah_update_confirm', [
            'ah' => $ah,
        ]);

    }

    /**
     * ログインしているユーザの
     * 病院情報　編集完了画面を表示
     * 
     * @return view
     */
    public function AhUpdateComplet(Request $request,$id)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $ah = $request -> except('action');
        // dd($inputs);
        
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('ah_update',$id)
                ->withInput($ah);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();
            
            // dd($name);

            //トランザクション
            \DB::beginTransaction();

            try {

                $ahs = Ah::find($id);
                // dd($pet['user_id']);
                //po新規会員を登録
                $ahs -> fill([
                    'name' => $ah['name'],
                    'explanation' => $ah['explanation'],
                    'time' => $ah['time'],
                    'animal' => $ah['animal'],
                    'emergency' => $ah['emergency'],
                    'trimming' => $ah['trimming'],
                    'hotel' => $ah['hotel'],
                    'reservation' => $ah['reservation'],
                    'address' => $ah['address'],
                    'tel' => $ah['tel'],
                    'parking' => $ah['parking'],
                    'insurance' => $ah['insurance'],
                    'hp' => $ah['hp'],
                    'user_id' => $ah['user_id'],
                ]);
                //dd($contact);
                $ahs -> save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('mypage.ah.ah_update_complet');
        }
    }

    /**
     * ログインしているユーザの
     * 動物病院の写真編集画面を表示
     * @param int $id
     * @return view
     */
    public function AhImgUpdate($id)
    {
        $ah = Ah::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($ah)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ah'));
        }

        return view('mypage.ah.ah_img_update',['ah' => $ah]);
    }

    /**
     * ログインしているユーザの
     * 動物病院の写真　編集完了画面を表示
     * 
     * @return view
     */
    public function AhImgUpdateComplet(Request $request,$id)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $ah = $request -> except('action');
        // dd($inputs);
        
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('ah_detail',$id)
                ->withInput($ah);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            if(request('ah_img')){
            // if($request->has('pet_img')) {
                // dd($request);

                //pet_imgというファイルの元々の名前を$originalに代入する
                $original = request() -> file('ah_img') -> getClientOriginalName();
                // dd($original);
                //元々のファイル名に日時を加えた名前をファイル名として$nameに代入する
                $img_name = date('Ymd_His').'_'.$original;
                //pet_imgというファイルをstorage/pet_imgに$nameの名前で保存する
                // dd($img_name);
                $file = request() -> file('ah_img') -> move('storage/ah_img',$img_name);
                //↑ここまでで画像自体の保存は完了
                //↓ここからデータベースの保存
                //データベースのpet_imgカラムには$nameを入れておく
            }
            // $post -> save();
            
            // dd($name);

            //トランザクション
            \DB::beginTransaction();

            try {

                $ahs = Ah::find($id);
                // dd($pet['user_id']);
                //po新規会員を登録
                $ahs -> fill([
                    'ah_img' => $img_name,
                ]);
                //dd($contact);
                $ahs -> save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('mypage.ah.ah_img_update_complet');
        }
    }

    /**
     * 病院情報の削除完了画面を表示
     * @param int $id
     * @return view
     */
    public function AhDelete($id)
    {
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ah'));
        }

        try {

            // dd($pet['user_id']);
            //削除
            Ah::destroy($id);
            //dd($contact);
        } catch(\Throwable $e) {
            //abort(500);
            echo "接続失敗: " . $e -> getMessage() . "\n";
            exit();
        }

        return view('mypage.ah.ah_delete');
    }
}
