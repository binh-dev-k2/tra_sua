<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = "don_hang";

    protected $guarded = ['id'];

    public function getTrangThai()
    {
        return $this->belongsTo(TrangThai::class, 'id_trang_thai');
    }
}
