<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
Use App\Models\UserToken;
use Carbon\Carbon;

use Illuminate\Support\Facades\URL;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $userToken;

    /**
     * Create a new message instance.
     * 
     * construct
     * 新しいメッセージインスタンスの生成
     * 
     *　
     */
    public function __construct(
        User $user,
        UserToken $userToken
    )
    {
        $this->user = $user;
        $this->userToken = $userToken;
    }

    /**
     * Create a new message instance.
     * 
     * 新しいメッセージインスタンスの生成
     *
     * @return void
     */
    // public function __construct($name, $email)
    // {
    //     $this->name = $name;
    //     $this->email = $email;
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // トークン取得 
        $tokenParam = ['reset_token' => $this->userToken->token];
        $now = Carbon::now();

        // 署名付き有効期限48時間のURLを生成
        $url = URL::temporarySignedRoute('pass_reset' , $now->addHours(48), $tokenParam);

        // HTML形式でメール作成
        return $this->from(config('mail.from.address'), config('mail.from.name'))
                    ->to($this->user->email)
                    ->subject('パスワード再設定用URLのご案内')
                    ->view('mails.password_reset_mail')
                    ->with([
                        'user' => $this->user,
                        'url' => $url,
                    ]);

        // return $this->to($this->email)
        //     ->subject('パスワードの再設定')
        //     ->view('mails.password_reset_mail')
        //     ->with([
        //         'name' => $this->name,
        //     ]);
    }


    /**
     * Get the message envelope.
     * 
     */
    // public function envelope(): Envelope
    // {
    //     // return new Envelope(
    //     //     from: new Address('puroguramingutest@gmail.com', 'AHsearch'),
    //     //     subject: 'Reset Password Mail',
    //     // );
    // }

    /**
     * Get the message content definition.
     * メッセージの内容の定義を取得
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.password_reset_mail',
        );
    }

    /**
     * Get the attachments for the message.
     * メッセージの添付を取得
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
