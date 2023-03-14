<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = "chi_tiet_don_hang";

    protected $guarded = ['id'];

    public function getDonHang()
    {
        return $this->belongsTo(DonHang::class, 'id_don_hang');
    }
}
