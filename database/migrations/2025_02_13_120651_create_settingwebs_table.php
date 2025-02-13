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
        Schema::create('settingwebs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_website');
            $table->text('deskripsi_website');
            $table->string('favicon_website');
            $table->string('logo_website');
            $table->string('telepon');
            $table->text('alamat');
            $table->string('email');
            $table->string('copyright');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settingwebs');
    }
};
