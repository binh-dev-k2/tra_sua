<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Carbon\Carbon;

class GioHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function data(Request $request)
    {
        $cart = json_decode($request->getContent(), true);
        $data = [];
        foreach ($cart as $value) {
            $san_pham = SanPham::where('slug', $value['slug'])->first();
            $san_pham->so_luong = $value['so_luong'];
            $kichCo = [];
            $kichCO = json_decode($san_pham->kich_co);
            foreach ($kichCO as $kc) {
                $kichCo[] = $san_pham->getKichCo($kc)->ten;
            }
            $san_pham->kich_co = $kichCo;
            $data[] = $san_pham;
        }

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $don_hang = DonHang::create([
            'ten_khach' => $data[0]['ho_ten'],
            'sdt' => $data[0]['sdt'],
            'dia_chi' => "Thái Nguyên, ". $data[0]['dia_chi'],
            'ghi_chu' => $data[0]['ghi_chu'],
            'tong_tien' => $data[0]['tong_tien'],
            'ngay_dat_hang' => $dt->toDateTimeString()
        ]);

        for ($i = 1; $i < count($data); $i ++) {
            $id_san_pham = SanPham::where('slug', $data[$i]['slug'])->first()->id;

            ChiTietDonHang::create([
                'id_don_hang' => $don_hang->id,
                'id_san_pham' => $id_san_pham,
                'ten_san_pham' => $data[$i]['ten_san_pham'],
                'size' => $data[$i]['size'],
                'so_luong' => $data[$i]['so_luong'],
                'gia' => $data[$i]['gia'],
                'thanh_tien' => $data[$i]['thanh_tien']
            ]);
        }

        return response()->json(['status', 'success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
