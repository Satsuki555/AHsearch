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
        if(!Schema::hasTable('ah')){
            Schema::create('ah', function (Blueprint $table) {
                $table->id()->unique()->comment('病院ID');
                $table->string('ah_img')->nullable()->comment('病院ロゴマーク');
                $table->string('name',255)->comment('病院名');
                $table->text('explanation')->nullable()->comment('病院説明');
                $table->string('time',255)->comment('診察時間');
                $table->string('animal',255)->comment('診察可能動物');
                $table->string('emergency',255)->nullable()->comment('緊急対応');
                $table->string('trimming',255)->nullable()->comment('トリミング');
                $table->string('hotel',255)->nullable()->comment('ペットホテル');
                $table->string('reservation',255)->nullable()->comment('予約');
                $table->string('address',255)->comment('住所');
                $table->string('tel',11)->comment('電話番号');
                $table->string('parking',255)->nullable()->comment('駐車場(台)');
                $table->string('insurance',255)->nullable()->comment('保険対応');
                $table->string('hp',255)->nullable()->comment('ホームページ');
                $table->foreignId('user_id')->constrained()->comment('動物病院ユーザID');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ah');
    }
};
