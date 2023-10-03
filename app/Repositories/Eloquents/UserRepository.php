<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

use Illuminate\Support\Facades\Hash;




class UserRepository implements UserRepositoryInterface
{
    private $user;

    /**
     * constructor
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // メールアドレスからユーザー情報取得
    public function findFromEmail(string $email): User
    {
        return $this->user->where('email', $email)->firstOrFail();
    }

    /**
     * ユーザーのパスワードの更新処理
     * @inheritDoc
     */
    public function updateUserPassword(string $password, int $id): void
    {
        $this->user->where('id', $id)->update(['password' => Hash::make($password)]);
    }

    // パスワードリセット用トークンを発行
    // public function updateOrCreateUser(int $userId): User
    // {
    //     $now = Carbon::now();
    //     // $userIdをハッシュ化
    //     $hashedToken = hash('sha256', $userId);
    //     return $this->userToken->updateOrCreate(
    //         [
    //             'id' => $userId,
    //         ],
    //         [
    //         // $hashedTokenを含むトークンを作成
    //         'rest_password_access_key' => uniqid(rand(), $hashedToken),
    //         // トークンの有効期限を現在から24時間後に設定
    //         'rest_password_expire_data' => $now->addHours(24)->toDateTimeString()
    //         ]);
    // }
}