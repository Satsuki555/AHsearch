<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\SearchRequest;

use App\Models\Ah;

class SearchController extends Controller
{
    /**
     * 動物病院検索画面を表示する
     * 
     * @return view
     */
    public function showSearch(){

        return view('search.search');
    }

    /**
     * 動物病院検索画面(ログイン後トップ画面)を表示する
     * 
     * @return view
     */
    public function FindAh(SearchRequest $request){

        // dd($request->city);
        $ahs = Ah::where('address', 'like', "%{$request->city}%")->orWhere('name', 'like', "%{$request->city}%")->get();
        // dd($ahs);

        $count = '「'.$request->city.'」'.'の検索結果'.count($ahs).'件';

        return view('search.find_ah',['ahs' => $ahs, 'count' => $count]);
    }

    /**
     * 病院情報 詳細画面を表示
     * @param int $id
     * @return view
     */
    public function SearchDetail($id)
    {
        $ah = Ah::find($id);
        // dd($pets->id);

        //IDがなかったらお問い合わせフォームにリダイレクトする
        if(is_null($ah)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('ah'));
        }

        return view('search.search_detail',['ah' => $ah]);
    }
}
