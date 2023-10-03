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
            $table->timestamp('reset_password_expire_at', $precision = 0)->nullable()->comment('パスワード再設定キーの有効期限');
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
