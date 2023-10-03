<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                // $table->id()->unique();
                // $table->string('name');
                // $table->string('email')->unique();
                // $table->timestamp('email_verified_at')->nullable();
                // $table->string('password');
                // $table->rememberToken();
                // $table->timestamps();

                $table->id()->unique()->comment('ユーザID');
                $table->string('name',255)->comment('氏名または病院名');
                $table->string('kana',255)->comment('フリガナ');
                $table->string('tel',11)->comment('電話番号');
                $table->string('email',255)->unique()->comment('メールアドレス');
                $table->string('password',255)->comment('パスワード');
                $table->integer('role')->comment('権限(ペットオーナーは0,動物病院は1,管理ユーザは2)');
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                $table->timestamps();
                $table->string('reset_password_access_key',64)->unique()->nullable()->comment('パスワード再設定キー');
                $table->timestamp('reset_password_expire_at', $precision = 0)->nullable()->comment('パスワード再設定キーの有効期限');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
