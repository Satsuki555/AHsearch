<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* ①ここから追加 */
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\UserTokenRepositoryInterface;
use App\Http\Requests\ResetMailRequest;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;
/* ①ここまで追加 */

class ResetController extends Controller
{
    /* ②ここから追加 */
    private $userRepository;
    private $userTokenRepository;

    private const MAIL_SENDED_SESSION_KEY = 'user_reset_password_mail_sended_action';

    private const UPDATE_PASSWORD_SESSION_KEY = 'user_update_password_action';

    //UserRepositoryInterfaceを使うための宣言
    public function __construct(
        UserRepositoryInterface $userRepository,
        UserTokenRepositoryInterface $userTokenRepository,
    )
    {
        $this->userRepository = $userRepository;
        $this->userTokenRepository = $userTokenRepository;
    }
    /* ②ここまで追加 */


    /**
     * パスワードリセットのメール送信画面を表示
     * 
     * @return view
     */
    public function showReset()
    {
        return view('reset.reset_mail');
    }

    //  メール送信
    public function mailSend(ResetMailRequest $request)
    {   

        /* ③ここから追加 */
        try {
            // // ユーザー情報取得
            $user = $this->userRepository->findFromEmail($request->email);
            // $name = $user['name'];
            // $email = $user['email'];
            // dd($name);//ここまではOK
            $userToken = $this->userTokenRepository->updateOrCreateUserToken($user->id);
            // dd($userToken);

            // メール送信
            // Mail::send(['text' => 'mails.password_reset_mail'],['name' => 'AHsearch'],function($message, ResetMailRequest $request){
            //     // ユーザー情報取得
            //     $user = $this->userRepository->findFromMail($request->email);
            //     $userEmail = $user['email'];
            //     dd($userEmail);
            //     $message->to($userEmail,'to AHsearch')->subject('test');
            //     $message->from('puroguramingutest@gmail.com','AHsearch');
            // });
            Log::info(__METHOD__ . '...ID:' . $user->id . 'のユーザーにパスワード再設定用メールを送信します。');
            //メール送信
            Mail::send(new ResetPasswordMail($user, $userToken));
            // dd($user['email']);
            Log::info(__METHOD__ . '...ID:' . $user->id . 'のユーザーにパスワード再設定用メールを送信しました。');
        } catch(Exception $e) {
            Log::error(__METHOD__ . '...ユーザーへのパスワード再設定用メール送信に失敗しました。 request_email = ' . $request->email . ' error_message = ' . $e);
            return redirect()->route('reset_mail')
                ->with('flash_message', '処理に失敗しました。時間をおいて再度お試しください。');
        }
        // 不正アクセス防止セッションキー
        session()->put(self::MAIL_SENDED_SESSION_KEY, 'user_reset_password_send_email');
        /* ③ここまで追加 */

        //メール送信完了画面を表示
        return view('reset.mail_send');
        // return redirect()->route('mail_send');
    }

    // メール送信完了
    public function sendCompleteResetPasswordMail()
    {
        /* ④ここから追加 */
        // 不正アクセス防止セッションキーを持っていない場合
        if (session()->pull(self::MAIL_SENDED_SESSION_KEY) !== 'user_reset_password_send_email') {
            return redirect()->route('reset_mail')
                ->with('flash_message', '不正なリクエストです。');
        }
        /* ④ここまで追加 */
        
        return view('users.reset_input_mail_complete');
    }

    /**
    * ユーザーのパスワード再設定フォーム画面
    *
    * @param Request $request
    * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    */
    public function PassReset(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(403, 'URLの有効期限が過ぎたためエラーが発生しました。パスワードリセットメールを再発行してください。');
        }
        $resetToken = $request->reset_token;
        try {
            $userToken = $this->userTokenRepository->getUserTokenfromToken($resetToken);
        } catch (Exception $e) {
            Log::error(__METHOD__ . ' UserTokenの取得に失敗しました。 error_message = ' . $e);
            return redirect()->route('reset.reset_mail')
                ->with('flash_message', __('パスワードリセットメールに添付されたURLから遷移してください。'));
        }

        return view('reset.pass_reset')
            ->with('userToken', $userToken);
    }

    /**
    * パスワード更新処理
    *
    * @param ResetPasswordRequest $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function PassUpdate(ResetPasswordRequest $request)
    {
        try {
            $userToken = $this->userTokenRepository->getUserTokenfromToken($request->reset_token);
            $this->userRepository->updateUserPassword($request->password, $userToken->user_id);
            Log::info(__METHOD__ . '...ID:' . $userToken->user_id . 'のユーザーのパスワードを更新しました。');
        } catch (Exception $e) {
            Log::error(__METHOD__ . '...ユーザーのパスワードの更新に失敗しました。...error_message = ' . $e);
            return redirect()->route('password_reset.email_form')
                ->with('flash_message', __('処理に失敗しました。時間をおいて再度お試しください。'));
        }
        // パスワードリセット完了画面への不正アクセスを防ぐためのセッションキー
        $request->session()->put(self::UPDATE_PASSWORD_SESSION_KEY, 'user_update_password');

        return redirect()->route('pass_complet');

    }

    /**
    * パスワードリセット完了ページ
    *
    * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    */
    public function PassComplet()
    {
        // パスワード更新処理で保存したセッションキーに値がなければアクセスできないようにすることで不正アクセスを防ぐ
        if (session()->pull(self::UPDATE_PASSWORD_SESSION_KEY) !== 'user_update_password') {
            return redirect()->route('reset_mail')
                ->with('flash_message', '不正なリクエストです。');
        }

        return view('reset.pass_complet');
    }
}
