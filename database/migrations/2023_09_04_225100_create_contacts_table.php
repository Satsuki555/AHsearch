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
        if(!Schema::hasTable('contacts')){
            Schema::create('contacts', function (Blueprint $table) {
                $table->id()->unique()->comment('お問い合わせID');
                $table->string('name',255)->comment('氏名または病院名');
                $table->string('email',255)->comment('メールアドレス');
                $table->text('body')->comment('内容');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
