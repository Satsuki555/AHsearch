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
        if(!Schema::hasTable('ah_users')){
            Schema::create('ah_users', function (Blueprint $table) {
                $table->id()->unique()->comment('動物病院ユーザID');
                $table->string('name',255)->comment('病院名');
                $table->string('kana',255)->comment('フリガナ');
                $table->string('tel',11)->comment('電話番号');
                $table->string('email',255)->unique()->comment('メールアドレス');
                $table->string('password',255)->comment('パスワード');
                $table->integer('role')->default('0')->comment('権限(動物病院は0,管理ユーザは1)');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ah_users');
    }
};
