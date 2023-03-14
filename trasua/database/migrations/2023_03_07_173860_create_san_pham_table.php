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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('id_loai_san_pham')->nullable()->constrained("loai_san_pham")->nullOnDelete();
            $table->string('ten_san_pham');
            $table->string('anh_san_pham')->nullable();
            $table->json('kich_co')->nullable();
            $table->integer('so_luong')->unsigned();
            $table->integer('gia_goc')->unsigned();
            $table->integer('gia')->unsigned()->nullable();
            $table->foreignId('id_trang_thai')->nullable()->constrained("trang_thai")->nullOnDelete();
            $table->string('mo_ta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
