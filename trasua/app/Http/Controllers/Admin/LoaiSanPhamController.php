<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý loại sản phẩm";
        $loai_san_pham = LoaiSanPham::get()->sortByDesc('id');

        return view('Admin.loaisanpham.index', compact('loai_san_pham', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Quản lý loại sản phẩm";

        return view('Admin.loaisanpham.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_loai' => 'required|min:1|max:100|string',
            'slug' => 'required|string|min:1|max:100'
        ]);

        $mo_ta = json_decode($request->mo_ta)->ops[0]->insert;

        $loai_san_pham = LoaiSanPham::create([
            'ten_loai' => $request->ten_loai,
            'slug' => $request->slug,
            'mo_ta' => $mo_ta ?? "Chưa có mô tả cụ thể!"
        ]);

        if ($loai_san_pham) {
            return redirect()->route('loaisanpham.index')->with(['status' => 'Thêm loại sản phẩm thành công', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['status' => 'Thêm loại sản phẩm không thành công', 'type' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $title = "Quản lý loại sản phẩm";
        $loai_san_pham = LoaiSanPham::where('slug', $slug)->first();

        return view('Admin.loaisanpham.edit', compact('loai_san_pham', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'ten_loai' => 'required|min:1|max:100|string',
            'slug' => 'required|string|min:1|max:100'
        ]);

        $mo_ta = json_decode($request->mo_ta)->ops[0]->insert;

        $loai_san_pham = LoaiSanPham::where('slug', $slug)->first();

        $status = $loai_san_pham->update([
            'ten_loai' => $request->ten_loai,
            'slug' => $request->slug,
            'mo_ta' => $mo_ta ?? "Chưa có mô tả cụ thể!"
        ]);

        if ($status) {
            return redirect()->route('loaisanpham.index')->with(['status' => 'Sửa thông tin loại sản phẩm thành công', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['status' => 'Sửa thông tin loại sản phẩm không thành công', 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $loai_san_pham = LoaiSanPham::where('slug', $slug)->delete();;

        if ($loai_san_pham) {
            return redirect()->route('loaisanpham.index')->with(['status' => 'Xóa loại sản phẩm thành công', 'type' => 'success']);
        } else {
            return redirect()->back()->with(['status' => 'Xóa loại sản phẩm không thành công', 'type' => 'danger']);
        }
    }
}
