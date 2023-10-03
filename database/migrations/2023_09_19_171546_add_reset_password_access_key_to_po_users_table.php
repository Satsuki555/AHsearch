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
        Schema::table('po_users', function (Blueprint $table) {
            $table->string('reset_password_access_key', 255)->nullable()->unique()->comment('パスワード再設定キー');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('po_users', function (Blueprint $table) {
            //
        });
    }
};
