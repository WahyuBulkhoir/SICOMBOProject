<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisKelaminToPikrMembersAndCandidatePikrMembers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pikr_members', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('phone')->nullable();
        });

        Schema::table('candidate_pikr_members', function (Blueprint $table) {
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pikr_members', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });

        Schema::table('candidate_pikr_members', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }
}
