<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pikr_members', function (Blueprint $table) {
        $table->string('address')->nullable()->after('phone'); // Kolom baru
    });
}

public function down()
{
    Schema::table('pikr_members', function (Blueprint $table) {
        $table->dropColumn('address'); // Hapus kolom jika rollback
    });
}

};
