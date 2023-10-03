<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PetRequest;

use App\Models\Pet;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    /**
     * ログインしているユーザの
     * うちの子カルテ一覧画面を表示
     * 
     * @return view
     */
    public function showMyPets()
    {
        $user = Auth::user();
        $pets = $user -> pet;
        // dd($pets->pet_img);

        return view('mypage.pet.myPets',['pets' => $pets]);
    }

    /**
     * 管理画面から遷移したユーザの
     * うちの子カルテ一覧画面を表示
     * 
     * @return view
     */
    public function ListMyPets($id)
    {
        $user_id = $id;
        // dd($user_id);
        $pets = Pet::where('user_id', $user_id)->get();
        // dd($pets);

        return view('mypage.list.list_myPets',['pets' => $pets, 'user_id' => $user_id]);
    }

    /**
     * うちの子カルテ新規登録画面を表示
     * 
     * @return view
     */
    public function showMyPetMake()
    {
        $user = Auth::user();

        return view('mypage.pet.myPet_make',['user' => $user]);
    }

    /**
     * ログインしているユーザの
     * うちの子カルテ詳細画面を表示
     * @param int $id
     * @return view
     */
    public function PetDetail($id)
    {
        $pet = Pet::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($pet)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('myPets'));
        }

        return view('mypage.pet.pet_detail',['pet' => $pet]);
    }

    /**
     * うちの子カルテ新規登録確認画面
     */
    public function MyPetConfirm(PetRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $pet = $request -> all();
        // dd($pet);

        
        //確認画面のviewに変数を渡して表示
        return view('mypage.pet.myPet_confirm', [
            'pet' => $pet,
        ]);
            

    }

    /**
     * うちの子カルテ新規登録完了画面
     */
    public function MyPetComplet(Request $request)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $pet = $request -> except('action');
        // dd($pet['user_id']);
        
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('myPet_make')
                ->withInput($pet);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            // dd($name);

            //トランザクション
            \DB::beginTransaction();

            try {

                // dd($pet['user_id']);
                //うちの子カルテの新規を登録
                Pet::create([
                    'name' => $pet['name'],
                    'animal' => $pet['animal'],
                    'breed' => $pet['breed'],
                    'birth' => $pet['birth'],
                    'sex' => $pet['sex'],
                    'rv_day' => $pet['rv_day'],
                    'vac_day' => $pet['vac_day'],
                    'user_id' => $pet['user_id'],
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
            return view('mypage.pet.myPet_complet');
        }
    }

    /**
     * ログインしているユーザの
     * うちの子カルテ編集画面を表示
     * @param int $id
     * @return view
     */
    public function PetUpdate($id)
    {
        $pet = Pet::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($pet)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('myPets'));
        }

        return view('mypage.pet.pet_update',['pet' => $pet]);
    }

    /**
     * ログインしているユーザの
     * うちの子カルテ編集確認画面を表示
     * 
     * @return view
     */
    public function PetUpdateConfirm(PetRequest $request)
    {
        //フォームから受け取った全てのinputの値を取得
        $pet = $request -> all();
        // dd($pet['pet_img']);

        //確認画面のviewに変数を渡して表示
        return view('mypage.pet.pet_update_confirm', [
            'pet' => $pet,
        ]);

    }

    /**
     * ログインしているユーザの
     * うちの子カルテ編集完了画面を表示
     * 
     * @return view
     */
    public function PetUpdateComplet(Request $request,$id)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $pet = $request -> except('action');
        // dd($inputs);
        
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('pet_update',$id)
                ->withInput($pet);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();
            
            // dd($name);

            //トランザクション
            \DB::beginTransaction();

            try {

                $pets = Pet::find($id);
                // dd($pet['user_id']);
                //po新規会員を登録
                $pets -> fill([
                    'name' => $pet['name'],
                    'animal' => $pet['animal'],
                    'breed' => $pet['breed'],
                    'birth' => $pet['birth'],
                    'sex' => $pet['sex'],
                    'rv_day' => $pet['rv_day'],
                    'vac_day' => $pet['vac_day'],
                    'user_id' => $pet['user_id'],
                ]);
                //dd($contact);
                $pets -> save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('mypage.pet.pet_update_complet');
        }
    }

    /**
     * ログインしているユーザの
     * ペット写真編集画面を表示
     * @param int $id
     * @return view
     */
    public function ImgUpdate($id)
    {
        $pet = Pet::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($pet)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('myPets'));
        }

        return view('mypage.pet.img_update',['pet' => $pet]);
    }

    /**
     * ログインしているユーザの
     * うちの子カルテ編集完了画面を表示
     * 
     * @return view
     */
    public function ImgUpdateComplet(Request $request,$id)
    {
        //dd($request);
        //フォームから受け取ったactionの値を取得
        $action = $request -> input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $pet = $request -> except('action');
        // dd($inputs);
        
        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                -> route('pet_detail',$id)
                ->withInput($pet);
        
        } else {
            //再送信を防ぐためにトークンを再発行
            //$request -> session() -> regenerateToken();

            if(request('pet_img')){
            // if($request->has('pet_img')) {
                // dd($request);

                //pet_imgというファイルの元々の名前を$originalに代入する
                $original = request() -> file('pet_img') -> getClientOriginalName();
                // dd($original);
                //元々のファイル名に日時を加えた名前をファイル名として$nameに代入する
                $img_name = date('Ymd_His').'_'.$original;
                //pet_imgというファイルをstorage/pet_imgに$nameの名前で保存する
                // dd($img_name);
                $file = request() -> file('pet_img') -> move('storage/pet_img',$img_name);
                //↑ここまでで画像自体の保存は完了
                //↓ここからデータベースの保存
                //データベースのpet_imgカラムには$nameを入れておく
            }
            // $post -> save();
            
            // dd($name);

            //トランザクション
            \DB::beginTransaction();

            try {

                $pets = Pet::find($id);
                // dd($pet['user_id']);
                //po新規会員を登録
                $pets -> fill([
                    'pet_img' => $img_name,
                ]);
                //dd($contact);
                $pets -> save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                //abort(500);
                echo "接続失敗: " . $e -> getMessage() . "\n";
                exit();
            }

            //完了画面のviewを表示
            return view('mypage.pet.img_update_complet');
        }
    }

    /**
     * うちの子カルテの削除完了画面を表示
     * @param int $id
     * @return view
     */
    public function PetDelete($id)
    {
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('myPets'));
        }

        try {

            // dd($pet['user_id']);
            //削除
            Pet::destroy($id);
            //dd($contact);
        } catch(\Throwable $e) {
            //abort(500);
            echo "接続失敗: " . $e -> getMessage() . "\n";
            exit();
        }

        return view('mypage.pet.pet_delete');
    }

}
