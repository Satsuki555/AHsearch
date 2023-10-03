<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TopController;

use App\Http\Controllers\AhLoginController;

use App\Http\Controllers\PoLoginController;

use App\Http\Controllers\Ah_userController;

use App\Http\Controllers\Po_userController;

use App\Http\Controllers\MypageController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\ResetController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\PetController;

use App\Http\Controllers\AhController;

use App\Http\Controllers\PdfOutputController;

use App\Http\Controllers\SearchController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//ログイン前
Route::group(['middleware' => ['guest']], function () {

    // ログイン前トップ画面
    Route::get('/', [TopController::class, 'showTop'])->name('top');

    //ログイン機能
        // ペットオーナーログイン画面
        Route::get('/po_login', [PoLoginController::class, 'showPoLogin'])->name('po_login');

        //動物病院ログイン画面
        Route::get('/ah_login', [AhLoginController::class, 'showAhLogin'])->name('ah_login');

        //検索画面(ログイン後トップ画面)
            //ペットオーナー(ログイン処理)
            Route::post('/po_login', [PoLoginController::class, 'poLogin'])->name('po-login');
            //動物病院(ログイン処理)
            Route::post('/ah_login', [AhLoginController::class, 'ahLogin'])->name('ah-login');

    //パスワードリセットのメール送信画面
    Route::get('/reset_mail', [ResetController::class, 'showReset'])->name('reset_mail');

    // Route::get('/reset_mail', function () {
    //     return view('reset.reset_mail');
    // })->name('reset_mail');

    //パスワードリセットメール送信完了画面
    Route::post('/mail_send', [ResetController::class, 'mailSend'])->name('mail_send');

    // Route::post('/mail_send', function (Request $request) {
    //     $request->validate(['email' => 'required|email']);
    
    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );
    
    //     return $status === Password::RESET_LINK_SENT
    //                 ? back()->with(['status' => __($status)])
    //                 : back()->withErrors(['email' => __($status)]);
    // })->middleware('guest')->name('password.email');

    //パスワードリセットフォームを表示
    Route::get('/pass_reset', [ResetController::class, 'PassReset'])->name('pass_reset');

    // パスワード更新処理
    Route::post('/pass_update', [ResetController::class, 'PassUpdate'])->name('pass_update');

    // パスワード更新終了ページ
    Route::get('/pass_complet', [ResetController::class, 'PassComplet'])->name('pass_complet');


    //新規登録
        //ペットオーナー新規会員登録
        Route::get('/po_registration', [Po_userController::class, 'showPoRegi'])->name('po_registration');

        //po登録確認画面
        Route::post('/po_confirm', [Po_userController::class, 'PoRegiConfirm'])->name('po_confirm');

        //po登録完了画面
        Route::post('/po_complet', [Po_userController::class, 'PoRegiComplet'])->name('po_complet');

        //動物病院新規会員登録
        Route::get('/ah_registration', [Ah_userController::class, 'showAhRegi'])->name('ah_registration');

        //ah登録確認画面
        Route::post('/ah_user_confirm', [Ah_userController::class, 'AhRegiConfirm'])->name('ah_user_confirm');

        //ah登録完了画面
        Route::post('/ah_user_complet', [Ah_userController::class, 'AhRegiComplet'])->name('ah_user_complet');

});

 //メール送信テスト
 Route::get('/send', [ResetController::class, 'send'])->name('send');


//ログイン後
Route::group(['middleware' => ['auth']], function () {
    
    //検索画面
    Route::get('/search', [SearchController::class, 'showSearch'])->name('search');

    //検索結果画面
    Route::post('/find_ah', [SearchController::class, 'FindAh'])->name('find_ah');

    //病院情報詳細画面
    Route::get('/search_detail/{id}', [SearchController::class, 'SearchDetail'])->name('search_detail');

    //マイページ
    Route::get('/mypage', [MypageController::class, 'showMypage'])->name('mypage');

    // //ペットオーナー用マイページ
    // Route::get('/po_mypage', [MypageController::class, 'showPoMypage'])->name('po_mypage');

    // //動物病院用マイページ
    // Route::get('/ah_mypage', [MypageController::class, 'showAhMypage'])->name('ah_mypage');

    // //管理ユーザ用マイページ
    // Route::get('/m_mypage', [MypageController::class, 'showMMypage'])->name('m_mypage');

    //会員情報
        //ログインしているユーザの会員情報(ペットオーナーと管理ユーザ)
        Route::get('/member', [UserController::class, 'showMember'])->name('member');

        //ログインしているユーザの会員情報(動物病院)
        Route::get('/ah_member', [UserController::class, 'showAhMember'])->name('ah_member');

        //会員情報変更画面(ペットオーナーと管理ユーザ)
        Route::get('/member_change/{id}', [UserController::class, 'showMemberChange'])->name('member_change');

        //会員情報変更画面(動物病院)
        Route::get('/ah_member_change/{id}', [UserController::class, 'showAhMemberChange'])->name('ah_member_change');

        //会員情報変更確認画面(ペットオーナーと管理ユーザ)
        Route::post('/member_confirm', [UserController::class, 'memberConfirm'])->name('member_confirm');

        //会員情報変更確認画面(動物病院)
        Route::post('/ah_member_confirm', [UserController::class, 'ahMemberConfirm'])->name('ah_member_confirm');

        //会員情報変更完了画面
        Route::post('/member_complet', [UserController::class, 'memberComplet'])->name('member_complet');

    //うちの子カルテ
        //ログインしているユーザのうちの子カルテ一覧
        Route::get('/myPets', [PetController::class, 'showMyPets'])->name('myPets');

        //ログインしているユーザのうちの子カルテ詳細画面
        Route::get('/pet_detail/{id}', [PetController::class, 'PetDetail'])->name('pet_detail');

        //ログインしているユーザのうちの子カルテ新規登録画面
        Route::get('/myPet_make', [PetController::class, 'showMyPetMake'])->name('myPet_make');

        //ログインしているユーザのうちの子カルテ新規登録確認画面
        Route::post('/myPet_confirm', [PetController::class, 'MyPetConfirm'])->name('myPet_confirm');

        //ログインしているユーザのうちの子カルテ新規登録完了画面
        Route::post('/myPet_complet', [PetController::class, 'MyPetComplet'])->name('myPet_complet');

        //ログインしているユーザのうちの子カルテ編集画面
        Route::get('/pet_update/{id}', [PetController::class, 'PetUpdate'])->name('pet_update');

        //ログインしているユーザのうちの子カルテ編集確認画面
        Route::post('/pet_update_confirm/{id}', [PetController::class, 'PetUpdateConfirm'])->name('pet_update_confirm');

        //ログインしているユーザのうちの子カルテ編集完了画面
        Route::post('/pet_update_complet/{id}', [PetController::class, 'PetUpdateComplet'])->name('pet_update_complet');

        //ログインしているユーザのペット写真編集画面
        Route::get('/img_update/{id}', [PetController::class, 'ImgUpdate'])->name('img_update');

        //ログインしているユーザのペット写真編集完了画面
        Route::post('/img_update_complet/{id}', [PetController::class, 'ImgUpdateComplet'])->name('img_update_complet');

        //ログインしているユーザのうちの子カルテ削除完了画面
        Route::post('/pet_delete/{id}', [PetController::class, 'PetDelete'])->name('pet_delete');

        //うちの子カルテPDF出力
        Route::get('/pdf/{id}', [PdfOutputController::class, 'output'])->name('pdf');

    //病院情報
        //ログインしているユーザの病院情報一覧
        Route::get('/ah', [AhController::class, 'showAh'])->name('ah');

        //ログインしているユーザの病院情報詳細画面
        Route::get('/ah_detail/{id}', [AhController::class, 'AhDetail'])->name('ah_detail');

        //ログインしているユーザの病院情報新規登録画面
        Route::get('/ah_make', [AhController::class, 'showAhMake'])->name('ah_make');

        //ログインしているユーザの病院情報新規登録確認画面
        Route::post('/ah_confirm', [AhController::class, 'ahConfirm'])->name('ah_confirm');

        //ログインしているユーザの病院情報新規登録完了画面
        Route::post('/ah_complet', [AhController::class, 'ahComplet'])->name('ah_complet');

        //ログインしているユーザの病院情報編集画面
        Route::get('/ah_update/{id}', [AhController::class, 'ahUpdate'])->name('ah_update');

        //ログインしているユーザの病院情報編集確認画面
        Route::post('/ah_update_confirm/{id}', [AhController::class, 'ahUpdateConfirm'])->name('ah_update_confirm');

        //ログインしているユーザの病院情報編集完了画面
        Route::post('/ah_update_complet/{id}', [AhController::class, 'ahUpdateComplet'])->name('ah_update_complet');

        //ログインしているユーザの動物病院の写真編集画面
        Route::get('/ah_img_update/{id}', [AhController::class, 'AhImgUpdate'])->name('ah_img_update');

        //ログインしているユーザの動物病院の写真編集完了画面
        Route::post('/ah_img_update_complet/{id}', [AhController::class, 'AhImgUpdateComplet'])->name('ah_img_update_complet');

        //ログインしているユーザの病院情報削除完了画面
        Route::post('/ah_delete/{id}', [AhController::class, 'AhDelete'])->name('ah_delete');

    //一覧
        //ユーザ一覧を表示
        Route::get('/user_list', [UserController::class, 'showUserList'])->name('user_list');

        //ユーザ一覧詳細画面を表示(ペットオーナー、管理ユーザ)
        Route::get('/user_list_detail/{id}', [UserController::class, 'UserListDetail'])->name('user_list_detail');

        //ユーザ一覧詳細画面を表示(動物病院ユーザ)
        Route::get('/ah_user_list_detail/{id}', [UserController::class, 'AhUserListDetail'])->name('ah_user_list_detail');

        //ログインしているユーザのうちの子カルテ削除完了画面
        Route::post('/user_delete/{id}', [UserController::class, 'UserDelete'])->name('user_delete');

        //管理画面からのうちの子カルテ一覧
        Route::get('/list_myPets/{id}', [PetController::class, 'ListMyPets'])->name('list_myPets');

        //管理画面からの病院情報一覧
        Route::get('/list_ah/{id}', [AhController::class, 'ListAh'])->name('list_ah');

        //お問い合わせ覧を表示
        Route::get('/contact_list', [ContactController::class, 'showContactList'])->name('contact_list');

        //お問い合わせ一覧詳細画面を表示
        Route::get('/contact_list_detail/{id}', [ContactController::class, 'ContactListDetail'])->name('contact_list_detail');

        //お問い合わせ削除完了画面
        Route::post('/contact_delete/{id}', [ContactController::class, 'ContactDelete'])->name('contact_delete');



    //お問い合わせ
        //お問い合わせ入力画面
        Route::get('/contact', [ContactController::class, 'showContact'])->name('contact');

        //お問い合わせ確認画面
        Route::post('/c_confirm', [ContactController::class, 'ContactConfirm'])->name('c_confirm');

        //お問い合わせ完了画面
        Route::post('/c_complet', [ContactController::class, 'ContactComplet'])->name('c_complet');

    //ログアウト
        //ログアウト画面
        Route::get('/logout', [PoLoginController::class, 'showLogout'])->name('logout');

        //ログアウト(処理)
        Route::post('/logout', [PoLoginController::class, 'logout'])->name('logout');
});

