<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoaiSanPham;
use App\Models\KichCo;
use App\Models\TrangThai;

class SanPham extends Model
{
    use HasFactory;

    protected $table = "san_pham";

    protected $guarded = ['id'];

    public function getLoaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'id_loai_san_pham');
    }

    public function getKichCo($data)
    {
        return KichCo::where('id', $data)->first();
    }

    public function getTrangThai()
    {
        return $this->belongsTo(TrangThai::class, 'id_trang_thai');
    }
}
