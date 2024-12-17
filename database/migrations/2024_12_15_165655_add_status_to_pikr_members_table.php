<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPikrMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pikr_members', function (Blueprint $table) {
            $table->string('status')->nullable()->after('email'); // Menambahkan kolom status setelah kolom email
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pikr_members', function (Blueprint $table) {
            $table->dropColumn('status'); // Menghapus kolom status jika migrasi dibatalkan
        });
    }
}
