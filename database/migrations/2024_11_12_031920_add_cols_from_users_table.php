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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->after('id');
            $table->string('first_name')->after('user_name');
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('last_name')->after('middle_name');
            $table->string('mobile_number')->after('last_name');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_name', 'first_name', 'middle_name', 'last_name', 'mobile_number', 'deleted_at']);
        });
    }
};
