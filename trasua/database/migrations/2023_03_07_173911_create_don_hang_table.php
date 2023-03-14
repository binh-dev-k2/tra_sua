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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khach');
            $table->dateTime('ngay_dat_hang')->default(now()->toDateString());
            $table->string('dia_chi');
            $table->string('chi_chu')->nullable();
            $table->integer('tong_tien')->unsigned();
            $table->foreignId('id_trang_thai')->nullable()->constrained("trang_thai")->nullOnDelete();
            $table->integer('sdt')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
