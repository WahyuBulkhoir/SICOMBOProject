<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In the generated migration file (located in database/migrations):
        public function up()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->string('profile_picture')->nullable(); // Allow null if users don't initially have a profile picture
            });
        }

        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('profile_picture');
            });
        }

};
