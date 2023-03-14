<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonHang;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $don_hang = DonHang::get()->sortByDesc('id');

        return view('Admin.donhang.index', compact('don_hang'));
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
    public function update(Request $request, $id)
    {
        $don_hang = DonHang::findOrFail($id);

        if ($don_hang->id_trang_thai == 3) {
            $don_hang->id_trang_thai = 4;
        } else {
            $don_hang->id_trang_thai = 3;
        }

        $don_hang->save();

        return route('donhang.index')->with(['status' => 'Sửa trạng thái đơn hàng thành công!', 'type' => 'success']);
    }
}
