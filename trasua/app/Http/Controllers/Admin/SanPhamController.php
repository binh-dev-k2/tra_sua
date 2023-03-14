<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\KichCo;
use App\Models\TrangThai;
use App\Models\LoaiSanPham;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý sản phẩm";
        $san_pham = SanPham::get()->sortByDesc('id');

        return view('Admin.sanpham.index', compact('san_pham', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Quản lý sản phẩm";
        $kich_co = KichCo::get();
        $trang_thai = TrangThai::where('id', 1)->get();
        $loai_san_pham = LoaiSanPham::get();

        return view('Admin.sanpham.create', compact('title', 'kich_co', 'trang_thai', 'loai_san_pham'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_san_pham' => 'required|min:1|max:100|string',
            'slug' => 'required|unique:san_pham|string|min:1|max:100',
            'so_luong' => 'required|integer',
            'gia_goc' => 'required|integer',
            'gia' => 'required|integer',
        ]);

        $kich_co = [];
        foreach ($request->kich_co as $value) {
            $kich_co[] = $value;
        }

        $file_name = "sanpham.jpg";

        if ($request->hasFile('change_img')) {
            $img = $request->file('change_img');
            $file_name = time() . '.' . $img->getClientOriginalExtension();
            $path = $request->file('change_img')->storeAs('public/images/sanpham', $file_name);
        }

        $mo_ta = json_decode($request->mo_ta)->ops[0]->insert ?? "Sản phẩm chưa có mô tả cụ thể...";

        $san_pham = SanPham::create([
            'ten_san_pham' => $request->ten_san_pham,
            'slug' => $request->slug,
            'id_loai_san_pham' => $request->id_loai_san_pham ?? 0,
            'anh_san_pham' => $file_name,
            'kich_co' => json_encode($kich_co),
            'so_luong' => $request->so_luong,
            'gia_goc' => $request->gia_goc,
            'gia' => $request->gia,
            'id_trang_thai' => $request->trang_thai,
            'mo_ta' => $mo_ta
        ]);

        if ($san_pham) {
            return redirect()->route('sanpham.index')->with(['status' => 'Thêm sản phẩm thành công', 'type' => 'success']);
        } else {
            return back()->with(['status' => 'Thêm sản phẩm không thành công', 'type' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $title = "Quản lý sản phẩm";
        $kich_co = KichCo::get();
        $trang_thai = TrangThai::where('id', 1)->get();
        $san_pham = SanPham::where('slug', $slug)->first();
        $loai_san_pham = LoaiSanPham::get();

        return view('Admin.sanpham.edit', compact('san_pham', 'title', 'kich_co', 'trang_thai', 'loai_san_pham'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'ten_san_pham' => 'required|min:1|max:100|string',
            'slug' => 'required|string|min:1|max:100',
            'so_luong' => 'required|integer',
            'gia_goc' => 'required|integer',
            'gia' => 'required|integer',
        ]);

        $kich_co = [];
        foreach ($request->kich_co as $value) {
            $kich_co[] = $value;
        }

        $file_name = "";
        $san_pham = SanPham::where('slug', $slug)->first();

        if ($request->hasFile('change_img') && $san_pham->anh_san_pham != $request->change_img) {
            $img = $request->file('change_img');
            $file_name = time() . '.' . $img->getClientOriginalExtension();
            $path = $request->file('change_img')->storeAs('public/images/sanpham', $file_name);
            if ($san_pham->anh_san_pham != 'sanpham.jpg') {
                unlink(storage_path('app/public/images/sanpham'.$san_pham->anh_san_pham));
            }
        } else {
            $file_name = $san_pham->anh_san_pham;
        }

        $mo_ta = json_decode($request->mo_ta)->ops[0]->insert ?? "Sản phẩm chưa có mô tả cụ thể...";

        $status = $san_pham->update([
            'ten_san_pham' => $request->ten_san_pham,
            'id_loai_san_pham' => $request->id_loai_san_pham ?? 0,
            'anh_san_pham' => $file_name,
            'kich_co' => json_encode($kich_co),
            'so_luong' => $request->so_luong,
            'gia_goc' => $request->gia_goc,
            'gia' => $request->gia,
            'id_trang_thai' => $request->trang_thai,
            'mo_ta' => $mo_ta
        ]);

        if ($status) {
            return redirect()->route('sanpham.index')->with(['status' => 'Sửa thông tin sản phẩm thành công', 'type' => 'success']);
        } else {
            return back()->with(['status' => 'Sửa thông tin sản phẩm không thành công', 'type' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
