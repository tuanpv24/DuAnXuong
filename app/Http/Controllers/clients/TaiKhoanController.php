<?php

namespace App\Http\Controllers\clients;

use App\Models\User;
use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\GioHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{   
    protected $listDanhMuc;
    protected $listCart;
    public function __construct()
    {
        $this->listDanhMuc = DanhMuc::orderByDesc('id')->get();
    }
    public function order(){
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
        ->join('chi_tiet_gio_hangs','chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
        ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
        ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
        ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
        ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
        ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
        ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id') 
        ->where('users.id' , Auth::id())
        ->groupBy(                                                                                                               
            'san_phams.ten_san_pham', 'san_phams_alt.ten_san_pham', 'san_phams.anh_san_pham',                     
            'bien_the_san_phams.anh_bien_the_san_pham', 'san_phams_alt.anh_san_pham',                  
            'san_phams.id', 'san_phams_alt.id', 'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id',
            'san_phams.gia', 'bien_the_san_phams.gia', 'san_phams.kieu_san_pham', 'san_phams_alt.kieu_san_pham',
            'bien_the_san_phams.id'                                                            
        )                                                                                                                     
        ->orderByDesc('chi_tiet_gio_hangs.id')
        ->get(['chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh', 
        DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
        DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
        DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
        DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
        DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
        DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
        DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
        DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
        ]);
        $listDonHang = DonHang::join('trang_thai_don_hangs', 'trang_thai_don_hangs.id', '=', 'don_hangs.trang_thai_don_hang_id')
        ->join('phuong_thuc_thanh_toans', 'phuong_thuc_thanh_toans.id', '=','don_hangs.phuong_thuc_thanh_toan_id')->where('user_id', Auth::id())
        ->orderByDesc('don_hangs.id')->get(['don_hangs.*', 'trang_thai_don_hangs.ten_trang_thai_don_hang', 'phuong_thuc_thanh_toans.ten_phuong_thuc_thanh_toan']);
        $module = "clients.mytaikhoans.components.order";
        $template = "clients.mytaikhoans.index";
        return view('clients.layout', [
            'title' => 'Đơng Hàng Của Tôi',
            'template' => $template,
            'module' => $module,
            'listDanhMuc' => $this->listDanhMuc,
            'listDonHang' => $listDonHang,
            'listCart' => $listCart
        ]);
    }

    public function orderDetail(string $id){
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
        ->join('chi_tiet_gio_hangs','chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
        ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
        ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
        ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
        ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
        ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
        ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id') 
        ->where('users.id' , Auth::id())
        ->groupBy(                                                                                                               
            'san_phams.ten_san_pham', 'san_phams_alt.ten_san_pham', 'san_phams.anh_san_pham',                     
            'bien_the_san_phams.anh_bien_the_san_pham', 'san_phams_alt.anh_san_pham',                  
            'san_phams.id', 'san_phams_alt.id', 'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id',
            'san_phams.gia', 'bien_the_san_phams.gia', 'san_phams.kieu_san_pham', 'san_phams_alt.kieu_san_pham',
            'bien_the_san_phams.id'                                                            
        )                                                                                                                     
        ->orderByDesc('chi_tiet_gio_hangs.id')
        ->get(['chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh', 
        DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
        DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
        DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
        DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
        DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
        DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
        DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
        DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
        ]);
        $donHangCheck = DonHang::join('users', 'users.id', '=', 'don_hangs.user_id')
        ->where('users.id', Auth::id())->where('don_hangs.id', $id)
        ->get(['don_hangs.id']);
        if(!$donHangCheck->isEmpty()){
        $donHangShow = DonHang::select(
            DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id_san_pham'),
            DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
            DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
            'chi_tiet_don_hangs.gia as gia', 'chi_tiet_don_hangs.so_luong',
            'chi_tiet_don_hangs.thanh_tien', 'don_hangs.tong_tien', 'don_hangs.ghi_chu', 'don_hangs.ngay_dat',
            'phuong_thuc_thanh_toans.ten_phuong_thuc_thanh_toan', 'trang_thai_don_hangs.ten_trang_thai_don_hang',
            DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
            DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            )
            ->join('trang_thai_don_hangs', 'don_hangs.trang_thai_don_hang_id', '=', 'trang_thai_don_hangs.id')
            ->join('phuong_thuc_thanh_toans', 'don_hangs.phuong_thuc_thanh_toan_id', '=', 'phuong_thuc_thanh_toans.id')
            ->join('chi_tiet_don_hangs', 'don_hangs.id', '=', 'chi_tiet_don_hangs.don_hang_id')
            ->leftJoin('san_phams', 'san_phams.id', '=', 'chi_tiet_don_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_don_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id') 
            ->where('don_hangs.id', $id)
            ->groupBy(                                                                                                                //
                'don_hangs.id', 'san_phams.ten_san_pham', 'san_phams_alt.ten_san_pham', 'san_phams.anh_san_pham',                     //
                'bien_the_san_phams.anh_bien_the_san_pham', 'san_phams_alt.anh_san_pham', 'chi_tiet_don_hangs.gia',                   //
                'chi_tiet_don_hangs.so_luong', 'chi_tiet_don_hangs.thanh_tien', 'don_hangs.tong_tien', 'don_hangs.ghi_chu',           //
                'phuong_thuc_thanh_toans.ten_phuong_thuc_thanh_toan', 'trang_thai_don_hangs.ten_trang_thai_don_hang',                 //
                'san_phams.id', 'san_phams_alt.id', 'don_hangs.ngay_dat'                                                              //
            )                                                                                                                         //
            ->get();
            $module = "clients.mytaikhoans.components.orderdetail";
            $template = "clients.mytaikhoans.index";
            return view('clients.layout', [
            'title' => 'Đơng Hàng Của Tôi',
            'template' => $template,
            'module' => $module,
            'listDanhMuc' => $this->listDanhMuc,
            'donHangShow' => $donHangShow,
            'listCart' => $listCart,
        ]);
        }else{
            return redirect()->back()->with("error", "Bạn không có quyền truy cập");

        }       
    }
    
    public function infoUser(){
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
        ->join('chi_tiet_gio_hangs','chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
        ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
        ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
        ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
        ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
        ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
        ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id') 
        ->where('users.id' , Auth::id())
        ->groupBy(                                                                                                               
            'san_phams.ten_san_pham', 'san_phams_alt.ten_san_pham', 'san_phams.anh_san_pham',                     
            'bien_the_san_phams.anh_bien_the_san_pham', 'san_phams_alt.anh_san_pham',                  
            'san_phams.id', 'san_phams_alt.id', 'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id',
            'san_phams.gia', 'bien_the_san_phams.gia', 'san_phams.kieu_san_pham', 'san_phams_alt.kieu_san_pham',
            'bien_the_san_phams.id'                                                            
        )                                                                                                                     
        ->orderByDesc('chi_tiet_gio_hangs.id')
        ->get(['chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh', 
        DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
        DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
        DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
        DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
        DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
        DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
        DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
        DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
        ]);
        $module = "clients.mytaikhoans.components.account";
        $template = "clients.mytaikhoans.index";
        return view('clients.layout', [
        'title' => 'Tài khoản Của Tôi',
        'template' => $template,
        'module' => $module,
        'listDanhMuc' => $this->listDanhMuc,
        'listCart' => $listCart,
    ]);
    }
    
    public function updateUser(Request $request){
        if($request->isMethod('post')){
            $user = User::findOrFail(Auth::id());
            if ($request->hasFile('img')) {  
                if($user->anh_dai_dien && Storage::disk('public')->exists($user->anh_dai_dien)){
                    Storage::disk('public')->delete($user->anh_dai_dien);
                } 
                   //Lưu ảnh mới
                   $fileName = $request->file('img')->store("uploads/khachhang", "public");
                }else{
                   $fileName = $user->anh_dai_dien;
                }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->so_dien_thoai = $request->input('phone');
            $user->anh_dai_dien = $fileName;
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật không tin thành công');
        }
    }
}