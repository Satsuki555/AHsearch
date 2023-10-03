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
        if(!Schema::hasTable('po_users')){
            Schema::create('po_users', function (Blueprint $table) {
                $table->id()->comment('ペットオーナーユーザID');
                $table->string('name',255)->comment('氏名');
                $table->string('kana',255)->comment('フリガナ');
                $table->string('tel',11)->comment('電話番号');
                $table->string('email',255)->unique()->comment('メールアドレス');
                $table->string('password',255)->comment('パスワード');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('po_users');
    }
};
