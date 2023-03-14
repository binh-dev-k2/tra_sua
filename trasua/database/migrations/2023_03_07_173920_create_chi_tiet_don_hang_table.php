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
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_don_hang')->constrained("don_hang")->cascadeOnDelete();
            $table->foreignId('id_san_pham')->nullable()->constrained("san_pham")->nullOnDelete();
            $table->string('ten_san_pham');
            $table->string('size')->nullable();;
            $table->integer('so_luong')->unsigned();
            $table->integer('gia')->unsigned();
            $table->integer('thanh_tien')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};
