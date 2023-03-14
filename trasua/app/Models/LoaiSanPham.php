<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;

class LoaiSanPham extends Model
{
    use HasFactory;

    protected $table = "loai_san_pham";

    protected $guarded = ['id'];

    public function getSanPham()
    {
        return $this->hasMany(SanPham::class, 'id_loai_san_pham');
    }
}
