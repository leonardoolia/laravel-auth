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
        Schema::table('projects', function (Blueprint $table) {
            // Creazione colonna "id" nella tabella projects
            // $table->unsignedInteger('type_id')->nullable()->after('id');
            // $table->foreign('type_id')->references('id')->on('types')->nullOnDelete();

            $table->foreignId('type_id')->after('id')->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Distruzione colonna "id" nella tabella projects
            $table->dropForeign('projects_category_id_foreign');
            $table->dropColumn('type_id');
        });
    }
};
