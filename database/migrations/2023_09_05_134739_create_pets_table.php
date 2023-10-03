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
        if(!Schema::hasTable('pets')){
            Schema::create('pets', function (Blueprint $table) {
                $table->id()->unique()->comment('ペットID');
                $table->string('pet_img')->nullable()->comment('ペットの写真');
                $table->string('name',255)->comment('ペットの名前');
                $table->string('animal',255)->nullable()->comment('動物種');
                $table->string('breed',255)->nullable()->comment('品種');
                $table->date('birth')->nullable()->comment('ペットの生年月日');
                $table->string('sex',32)->nullable()->comment('ペットの性別');
                $table->date('rv_day')->nullable()->comment('狂犬病ワクチン接種日');
                $table->date('vac_day')->nullable()->comment('混合ワクチン接種日');
                $table->foreignId('user_id')->constrained()->comment('ペットオーナーID');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
