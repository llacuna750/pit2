<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() // Step 3: Create Roles and Update User Model
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user');
            // $table->string('avatar')->nullable();
            $table->string('avatar')->nullable(); // inside create_users_table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
