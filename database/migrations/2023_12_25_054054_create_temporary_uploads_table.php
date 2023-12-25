<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('temporary_uploads', function (Blueprint $table) {
            $table->id();

            $table->nullableMorphs('owner');

            $table->timestamps();

            $table->comment('上傳檔案暫存對象');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_uploads');
    }
};
