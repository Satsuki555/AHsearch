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
        if(!Schema::hasTable('medical_history')){
            Schema::create('medical_history', function (Blueprint $table) {
                $table->id()->unique()->comment('病歴ID');
                $table->string('disease',255)->comment('病名');
                $table->text('treatment')->comment('治療内容');
                $table->integer('pet_id')->comment('ペットID');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_history');
    }
};
