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
        Schema::create('hutangpiutangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('akun_id')->constrained('akuns')->onDelete('cascade');
            $table->string('nama_pihak');
            $table->enum('jenis', ['HUTANG', 'PIUTANG']);
            $table->decimal('nominal', 15, 2);
            $table->date('jatuh_tempo');
            $table->enum('status', ['BELUM DIBAYAR', 'LUNAS'])->default('BELUM DIBAYAR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutangpiutangs');
    }
};
