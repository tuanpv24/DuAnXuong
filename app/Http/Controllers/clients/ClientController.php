<?php

namespace App\Http\Controllers\clients;

use App\Models\User;
use App\Models\DanhGia;
use App\Models\DanhMuc;
use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\SanPham;
use App\Models\BinhLuan;
use App\Models\SlideShow;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BienTheSanPham;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietGioHang;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{

    protected $listDanhMuc;
    public function __construct()
    {
        $this->listDanhMuc = DanhMuc::orderByDesc('id')->get();
    }

    public function index()
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
            ->where('users.id', Auth::id())
            ->groupBy(
                'san_phams.ten_san_pham',
                'san_phams_alt.ten_san_pham',
                'san_phams.anh_san_pham',
                'bien_the_san_phams.anh_bien_the_san_pham',
                'san_phams_alt.anh_san_pham',
                'san_phams.id',
                'san_phams_alt.id',
                'chi_tiet_gio_hangs.so_luong',
                'chi_tiet_gio_hangs.id',
                'san_phams.gia',
                'bien_the_san_phams.gia',
                'san_phams.kieu_san_pham',
                'san_phams_alt.kieu_san_pham',
                'bien_the_san_phams.id'
            )
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get([
                'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh',
                DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
                DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
                DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
                DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
                DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
                DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
                DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
                DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            ]);
        $sanPhamBanChay = SanPham::select(
            'san_phams.id',
            'san_phams.ten_san_pham',
            'san_phams.gia',
            'san_phams.kieu_san_pham',
            DB::raw('MIN(bien_the_san_phams.gia) as gia_min'),
            DB::raw('MAX(bien_the_san_phams.gia) as gia_max'),
            'san_phams.anh_san_pham',
            DB::raw('SUM(chi_tiet_don_hang_tong.so_luong) as ban_chay'),
            DB::raw('AVG(danh_gias_trung_binh.sao) as trungBinhSao')
        )
            ->leftJoin('bien_the_san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin(
                DB::raw('(SELECT san_pham_id, bien_the_san_pham_id, SUM(so_luong) as so_luong 
        FROM chi_tiet_don_hangs 
        GROUP BY san_pham_id, bien_the_san_pham_id) as chi_tiet_don_hang_tong'),
                function ($join) {
                    $join->on('chi_tiet_don_hang_tong.san_pham_id', '=', 'san_phams.id')
                        ->orOn('chi_tiet_don_hang_tong.bien_the_san_pham_id', '=', 'bien_the_san_phams.id');
                }
            )
            ->leftJoin(DB::raw('(SELECT san_pham_id, AVG(sao) as sao 
        FROM danh_gias
        GROUP BY san_pham_id) as danh_gias_trung_binh'), 'san_phams.id', '=', 'danh_gias_trung_binh.san_pham_id')
            ->groupBy('san_phams.ten_san_pham', 'san_phams.gia', 'san_phams.anh_san_pham', 'san_phams.id', 'san_phams.kieu_san_pham')
            ->orderByDesc('ban_chay')
            ->paginate(10);
        $topSanPhamMoiNhat = SanPham::leftJoin('danh_gias', 'danh_gias.san_pham_id', '=', 'san_phams.id')
            ->leftJoin('bien_the_san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
            ->orderBy('san_phams.id', 'desc')
            ->groupBy('san_phams.id', 'ten_san_pham', 'san_phams.gia', 'anh_san_pham', 'san_phams.kieu_san_pham')
            ->take(6)
            ->get([
                'san_phams.id', 'san_phams.ten_san_pham', 'san_phams.gia', 'san_phams.anh_san_pham', 'san_phams.kieu_san_pham',
                DB::raw('MAX(bien_the_san_phams.gia) as gia_max'),
                DB::raw('MIN(bien_the_san_phams.gia) as gia_min'),
                DB::raw('AVG(sao) as sao')
            ]);
        $slideShow = SlideShow::where('active', 1)->get(['slide_shows.*']);
        $slideShowActive = SlideShow::select('album_anh_slide_shows.duong_dan_anh', 'album_anh_slide_shows.link')
            ->join('album_anh_slide_shows', 'slide_shows.id', '=', 'album_anh_slide_shows.slide_show_id')
            ->where('slide_shows.active', 1)->orderBy('order')->get();
        $template = 'clients.trangchus.index';
        return view('clients.layout', [
            'title' => 'Trang chủ',
            'template' => $template,
            'listDanhMuc' => $this->listDanhMuc,
            'slideShowActive' => $slideShowActive,
            'sanPhamBanChay' => $sanPhamBanChay,
            'topSanPhamMoiNhat' => $topSanPhamMoiNhat,
            'slideShow' => $slideShow,
            'listCart' => $listCart
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function shop(Request $request)
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->join('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->where('users.id', Auth::id())->orderByDesc('chi_tiet_gio_hangs.id')->get(['san_phams.*', 'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh']);
        $perPage = $request->query('perpage', 12);
        $orderBy = $request->query('orderby', 0);
        $query = SanPham::select(
            'san_phams.id',
            'san_phams.ten_san_pham',
            DB::raw('COALESCE(san_phams.gia, MAX(bien_the_san_phams.gia)) as gia'),
            'san_phams.anh_san_pham',
            'san_phams.kieu_san_pham',
            DB::raw('SUM(chi_tiet_don_hang_tong.so_luong) as ban_chay'),
            DB::raw('AVG(danh_gias_trung_binh.sao) as trungBinhSao'),
            DB::raw('MAX(bien_the_san_phams.gia) as gia_max'),
            DB::raw('MIN(bien_the_san_phams.gia) as gia_min')
        )
            ->leftJoin('bien_the_san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin(
                DB::raw('(SELECT san_pham_id, bien_the_san_pham_id, SUM(so_luong) as so_luong 
        FROM chi_tiet_don_hangs 
        GROUP BY san_pham_id, bien_the_san_pham_id) as chi_tiet_don_hang_tong'),
                function ($join) {
                    $join->on('chi_tiet_don_hang_tong.san_pham_id', '=', 'san_phams.id')
                        ->orOn('chi_tiet_don_hang_tong.bien_the_san_pham_id', '=', 'bien_the_san_phams.id');
                }
            )
            ->leftJoin(DB::raw('(SELECT san_pham_id, AVG(sao) as sao 
        FROM danh_gias
        GROUP BY san_pham_id) as danh_gias_trung_binh'), 'san_phams.id', '=', 'danh_gias_trung_binh.san_pham_id')
            ->groupBy('san_phams.ten_san_pham', 'san_phams.gia', 'san_phams.anh_san_pham', 'san_phams.id', 'san_phams.kieu_san_pham');
        if ($request->input('s')) {
            $query->where('san_phams.ten_san_pham', 'LIKE', "%" . $request->input('s') . "%");
        }
        if ($request->input('price_filter')) {
            $priceFilter = $request->input('price_filter');
            switch ($priceFilter) {
                case '1-5':
                    $query->having('gia', '>=', 1000000)->having('gia', '<=', 5000000)->orderBy('gia');
                    break;
                case '5-10':
                    $query->having('gia', '>=', 5000000)->having('gia', '<=', 10000000)->orderBy('gia');
                    break;
                case '10-20':
                    $query->having('gia', '>=', 10000000)->having('gia', '<=', 20000000)->orderBy('gia');
                    break;
                case '20-30':
                    $query->having('gia', '>=', 20000000)->having('gia', '<=', 30000000)->orderBy('gia');
                    break;
                case '30-40':
                    $query->having('gia', '>=', 30000000)->having('gia', '<=', 40000000)->orderBy('gia');
                    break;
                case '40-50':
                    $query->having('gia', '>=', 40000000)->having('gia', '<=', 50000000)->orderBy('gia');
                    break;
                default:
                    $query->having('gia', '>=', 50000000)->orderBy('gia');
                    break;
            }
            $price = $priceFilter;
        } else {
            $price = 0;
        }
        if ($orderBy == 'oldest') {
            $query->orderBy('san_phams.id');
        } else if ($orderBy == 'rating') {
            $query->orderByDesc('trungBinhSao');
        } else if ($orderBy == 'sellerest') {
            $query->orderByDesc('ban_chay');
        } else if ($orderBy == 'price') {
            $query->orderBy('gia');
        } else if ($orderBy == 'price-desc') {
            $query->orderByDesc('gia');
        } else {
            $query->orderByDesc('san_phams.id');
        }
        $allSanPham = $query->paginate($perPage);
        $count = SanPham::count();
        $template = 'clients.cuahangs.index';
        return view('clients.layout', [
            'title' => 'Cửa Hàng',
            'template' => $template,
            'listDanhMuc' => $this->listDanhMuc,
            'allSanPham' => $allSanPham,
            'perPage' => $perPage,
            'orderBy' => $orderBy,
            'count' =>  $count,
            'price' =>  $price,
            'listCart' => $listCart
        ]);
    }

    public function login()
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
            ->where('users.id', Auth::id())
            ->groupBy(
                'san_phams.ten_san_pham',
                'san_phams_alt.ten_san_pham',
                'san_phams.anh_san_pham',
                'bien_the_san_phams.anh_bien_the_san_pham',
                'san_phams_alt.anh_san_pham',
                'san_phams.id',
                'san_phams_alt.id',
                'chi_tiet_gio_hangs.so_luong',
                'chi_tiet_gio_hangs.id',
                'san_phams.gia',
                'bien_the_san_phams.gia',
                'san_phams.kieu_san_pham',
                'san_phams_alt.kieu_san_pham',
                'bien_the_san_phams.id'
            )
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get([
                'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh',
                DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
                DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
                DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
                DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
                DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
                DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
                DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
                DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            ]);
        $bien = "Đăng Nhập";
        $template = 'clients.login-signins.login';
        return view('clients.layout', [
            'title' => 'Đăng nhập',
            'template' => $template,
            'listDanhMuc' => $this->listDanhMuc,
            'bien' => $bien,
            'listCart' => $listCart
        ]);
    }

    public function signin()
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
            ->where('users.id', Auth::id())
            ->groupBy(
                'san_phams.ten_san_pham',
                'san_phams_alt.ten_san_pham',
                'san_phams.anh_san_pham',
                'bien_the_san_phams.anh_bien_the_san_pham',
                'san_phams_alt.anh_san_pham',
                'san_phams.id',
                'san_phams_alt.id',
                'chi_tiet_gio_hangs.so_luong',
                'chi_tiet_gio_hangs.id',
                'san_phams.gia',
                'bien_the_san_phams.gia',
                'san_phams.kieu_san_pham',
                'san_phams_alt.kieu_san_pham',
                'bien_the_san_phams.id'
            )
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get([
                'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh',
                DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
                DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
                DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
                DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
                DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
                DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
                DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
                DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            ]);
        $bien = "Đăng Ký";
        $template = 'clients.login-signins.signin';
        return view('clients.layout', [
            'title' => 'Đăng Ký',
            'template' => $template,
            'listDanhMuc' => $this->listDanhMuc,
            'bien' => $bien,
            'listCart' => $listCart
        ]);
    }

    public function storeSignin(Request $request)
    {
        // dd($request->post());
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);
        $password = $request->input('password');
        User::create(
            [
                "ma_khach_hang" => "KH-1",
                'name' => 'User',
                'email' => $request->input('email'),
                'mat_khau' => $password,
                'password' => Hash::make($password)
            ]
        );
        return redirect()->route('client.form.login')->with("success", "Đăng ký thành công");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return redirect()->route('client.index')->with("success", "Logged in successfully");
        }
        return redirect()->back()->with("error", "Email or password is incorrect");
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("client.form.login");
    }

    public function comment(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            if (Auth::id()) {
                BinhLuan::create([
                    "ma_binh_luan" => "BL-" . Str::random(6),
                    'user_id' => Auth::id(),
                    'san_pham_id' => $id,
                    'noi_dung' => $request->input('comment')
                ]);
                return redirect()->back()->with("success", "Gửi bình luận thành công");
            } else {
                return redirect()->back()->with("error", "Bạn phải đăng nhập để bình luận");
            }
        }
    }

    public function review(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            if (Auth::id()) {
                $checkDanhGia = SanPham::leftJoin('bien_the_san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
                    ->join('chi_tiet_don_hangs', function ($join) {
                        $join->on('chi_tiet_don_hangs.san_pham_id', '=', 'san_phams.id')
                            ->orOn('chi_tiet_don_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id');
                    })
                    ->join('don_hangs', 'don_hangs.id', '=', 'chi_tiet_don_hangs.don_hang_id')
                    ->join('users', 'users.id', '=', 'don_hangs.user_id')
                    ->where('users.id', Auth::id())
                    ->where('san_phams.id', $id)
                    ->orderByDesc('chi_tiet_don_hangs.id')
                    ->first(['chi_tiet_don_hangs.id as id_chi_tiet_don_hang', 'san_phams.id as id_san_pham', 'users.id as id_user', 'don_hangs.trang_thai_don_hang_id']);
                if ($checkDanhGia === NULL) {
                    return redirect()->back()->with("error", "Bạn chưa mua sản phẩm này");
                } else {
                    $listDanhGia = DanhGia::get()->where('user_id', Auth::id())->where('san_pham_id', $id)->where('chi_tiet_don_hang_id', $checkDanhGia->id_chi_tiet_don_hang);
                    if ($listDanhGia->isEmpty()) {
                        if ($checkDanhGia->trang_thai_don_hang_id !== 5) {
                            return redirect()->back()->with("error", "Đang hàng đang trong quá trình thực hiện");
                        } else {
                            DanhGia::create([
                                "ma_danh_gia" => "DG-" . Str::random(6),
                                'san_pham_id' => $id,
                                'user_id' => Auth::id(),
                                'chi_tiet_don_hang_id' => $checkDanhGia->id_chi_tiet_don_hang,
                                'sao' => $request->input('rating'),
                                'noi_dung' => $request->input('comment')
                            ]);
                            return redirect()->back()->with("success", "Đánh giá thành công");
                        }
                    } else {
                        return redirect()->back()->with("error", "Bạn đã đánh giá sản phẩm này rồi");
                    }
                }
            } else {
                return redirect()->back()->with("error", "Bạn chưa đăng nhập");
            }
        }
    }


    public function addtocart(Request $request)
    {
        // dd($request->post());
        if (Auth::id()) {
            $checkGioHang = GioHang::where('user_id', Auth::id())->get('id');
            if ($checkGioHang->isEmpty()) {
                $gioHang = GioHang::create(['ma_gio_hang' => "GH-" . Str::random(6), 'user_id' => Auth::id()]);
                $gioHangId = $gioHang->id;
            } else {
                $gioHangId = $checkGioHang[0]->id;
            }
            if ($request->input('quantity') !== null) {
                if ($request->input('quantity') <= 0) {
                    return redirect()->back()->with("error", "Số lượng phải lớn hơn 0");
                } else {
                    $quantity = $request->input('quantity');
                }
            } else {
                $quantity = 1;
            }
            if ($request->input('kieu_san_pham') == 1) {
                $checkSanPham = GioHang::join('chi_tiet_gio_hangs', 'gio_hangs.id', '=', 'chi_tiet_gio_hangs.gio_hang_id')
                    ->where('gio_hangs.user_id', Auth::id())
                    ->where('chi_tiet_gio_hangs.san_pham_id', $request->input('id_san_pham'))
                    ->get('chi_tiet_gio_hangs.id');
                $sanPham = SanPham::findOrFail($request->input('id_san_pham'));
                if (!$checkSanPham->isEmpty()) {
                    $chiTietGioHang = ChiTietGioHang::findOrFail($checkSanPham[0]->id);
                    if ($chiTietGioHang->so_luong + $quantity > $sanPham->so_luong) {
                        return redirect()->back()->with("error", "Số lượng đã vượt quá tồn kho");
                    } else {
                        $chiTietGioHang->so_luong += $quantity;
                        $chiTietGioHang->save();
                    }
                } else {
                    ChiTietGioHang::create([
                        'ma_chi_tiet_gio_hang' => "CTGH-" . Str::random(5),
                        'gio_hang_id' => $gioHangId,
                        'san_pham_id' => $request->input('id_san_pham'),
                        'so_luong' => $quantity,
                    ]);
                }
            } else {
                // dd($request->post());
                $bienTheSanPham = SanPham::join('bien_the_san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
                    ->join('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
                    ->join('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
                    ->join('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
                    ->where('san_phams.id', $request->input('id_san_pham'))
                    ->groupBy('bien_the_san_phams.id', 'thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the', 'gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt')
                    ->get(['bien_the_san_phams.id', 'thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the', 'gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt'])->toArray();
                $result = [];
                foreach ($bienTheSanPham as $item) {
                    $id = $item['id'];
                    if (!isset($result[$id])) {
                        $result[$id] = [
                            'id' => $id,
                            'ten_thuoc_tinh_bien_the' => [],
                            'ten_gia_tri_thuoc_tinh_bt' => [],
                        ];
                    }
                    $result[$id]['ten_thuoc_tinh_bien_the'][] = $item['ten_thuoc_tinh_bien_the'];
                    $result[$id]['ten_gia_tri_thuoc_tinh_bt'][] = $item['ten_gia_tri_thuoc_tinh_bt'];
                }
                $result = array_values($result);
                $combined = [$request->input('atrributes'), $request->input('values')];

                $resultId = null;
                foreach ($result as $item) {
                    if ($item['ten_thuoc_tinh_bien_the'] === $combined[0] && $item['ten_gia_tri_thuoc_tinh_bt'] === $combined[1]) {
                        $resultId = $item['id'];
                        break;
                    }
                }
                $checkBienTheSanPham = GioHang::join('chi_tiet_gio_hangs', 'gio_hangs.id', '=', 'chi_tiet_gio_hangs.gio_hang_id')
                    ->where('gio_hangs.user_id', Auth::id())
                    ->where('chi_tiet_gio_hangs.bien_the_san_pham_id', $resultId)
                    ->get('chi_tiet_gio_hangs.id');
                $bienTheSanPham = BienTheSanPham::findOrFail($resultId);
                if (!$checkBienTheSanPham->isEmpty()) {
                    $chiTietGioHang = ChiTietGioHang::findOrFail($checkBienTheSanPham[0]->id);
                    if ($chiTietGioHang->so_luong + $quantity > $bienTheSanPham->so_luong) {
                        return redirect()->back()->with("error", "Số lượng đã vượt quá tồn kho");
                    } else {
                        $chiTietGioHang->so_luong += $quantity;
                        $chiTietGioHang->save();
                    }
                } else {
                    ChiTietGioHang::create([
                        'ma_chi_tiet_gio_hang' => "CTGH-" . Str::random(5),
                        'gio_hang_id' => $gioHangId,
                        'bien_the_san_pham_id' => $resultId,
                        'so_luong' => $quantity,
                    ]);
                }
            }
            return redirect()->back()->with("success", "Thêm vào giỏ hàng thành công");
        } else {
            return redirect()->back()->with("error", "Vui lòng đăng nhập");
        }
    }


    public function cart()
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
            ->where('users.id', Auth::id())
            ->groupBy(
                'san_phams.ten_san_pham',
                'san_phams_alt.ten_san_pham',
                'san_phams.anh_san_pham',
                'bien_the_san_phams.anh_bien_the_san_pham',
                'san_phams_alt.anh_san_pham',
                'san_phams.id',
                'san_phams_alt.id',
                'chi_tiet_gio_hangs.so_luong',
                'chi_tiet_gio_hangs.id',
                'san_phams.gia',
                'bien_the_san_phams.gia',
                'san_phams.kieu_san_pham',
                'san_phams_alt.kieu_san_pham',
                'bien_the_san_phams.id'
            )
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get([
                'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh',
                DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
                DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
                DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
                DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
                DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
                DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
                DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
                DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            ]);
        $module = 'clients.mytaikhoans.components.cart';
        $template = 'clients.mytaikhoans.index';
        return view('clients.layout', [
            'title' => 'Giỏ Hàng Của Tôi',
            'template' => $template,
            'module' => $module,
            'listDanhMuc' => $this->listDanhMuc,
            'listCart' => $listCart
        ]);
    }

    public function removeCart(string $id)
    {
        $chiTietGioHang =  ChiTietGioHang::findOrFail($id);
        $chiTietGioHang->delete();
        return redirect()->back()->with("success", "Xóa thành công");
    }

    public function updateCart(Request $request)
    {
        $check = true;
        foreach ($request->input('quantity') as $key => $value) {
            if ($value <= 0) {
                $check = false;
            }
        }
        if ($check) {
            $iteration = 1;
            foreach ($request->input('quantity') as $key => $value) {
                $chiTietDonHang = ChiTietGioHang::findOrFail($key);
                if ($request->input('kieu_san_pham')[$key] == 2) {
                    $bienTheSanPham = BienTheSanPham::findOrFail($request->input('id_alt')[$key]);
                    if ($bienTheSanPham->so_luong < $value) {
                        return redirect()->back()->with("error", "Sản phẩm thứ " . $iteration . " đã quá số lượng tồn kho");
                    } else {
                        $chiTietDonHang->so_luong = $value;
                        $chiTietDonHang->save();
                    }
                } else {
                    $sanPham = SanPham::findOrFail($request->input('id_alt')[$key]);
                    if ($sanPham->so_luong < $value) {
                        return redirect()->back()->with("error", "Sản phẩm thứ " . $iteration . " đã quá số lượng tồn kho");
                    } else {
                        $chiTietDonHang->so_luong = $value;
                        $chiTietDonHang->save();
                    }
                }
                $iteration++;
            }
            return redirect()->back()->with("success", "Cập nhật thành công");
        } else {
            return redirect()->back()->with("error", "Số lượng phải lớn hơn không");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
            ->where('users.id', Auth::id())
            ->groupBy(
                'san_phams.ten_san_pham',
                'san_phams_alt.ten_san_pham',
                'san_phams.anh_san_pham',
                'bien_the_san_phams.anh_bien_the_san_pham',
                'san_phams_alt.anh_san_pham',
                'san_phams.id',
                'san_phams_alt.id',
                'chi_tiet_gio_hangs.so_luong',
                'chi_tiet_gio_hangs.id',
                'san_phams.gia',
                'bien_the_san_phams.gia',
                'san_phams.kieu_san_pham',
                'san_phams_alt.kieu_san_pham',
                'bien_the_san_phams.id'
            )
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get([
                'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh',
                DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
                DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
                DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
                DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
                DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
                DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
                DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
                DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            ]);
        $sanPhamDetail = SanPham::join('danh_mucs', 'danh_mucs.id', '=', 'san_phams.danh_muc_id')
            ->where('san_phams.id', $id)
            ->get(['san_phams.*', 'danh_mucs.ten_danh_muc']);
        if ($sanPhamDetail[0]->kieu_san_pham == 2) {
            $sanPhamBienThe = SanPham::select(
                DB::raw('COALESCE(bien_the_san_phams.anh_bien_the_san_pham, san_phams.anh_san_pham) as anh_bien_the_san_pham'),
                'thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the',
                'bien_the_san_phams.id',
                'gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt',
            )
                ->leftJoin('bien_the_san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
                ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
                ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
                ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
                ->where('san_phams.id', $id)->get()->toArray();
            $minPrice = BienTheSanPham::where('san_pham_id', $id)->min('gia');
            $maxPrice = BienTheSanPham::where('san_pham_id', $id)->max('gia');
            $sumSoLuong = BienTheSanPham::where('san_pham_id', $id)->sum('so_luong');
            $result = [];
            foreach ($sanPhamBienThe as $item) {
                $tenThuocTinh = $item['ten_thuoc_tinh_bien_the'];
                $tenGiaTri = $item['ten_gia_tri_thuoc_tinh_bt'];

                if (!isset($result[$tenThuocTinh])) {
                    $result[$tenThuocTinh] = [];
                }

                if (!in_array($tenGiaTri, $result[$tenThuocTinh])) {
                    $result[$tenThuocTinh][] = $tenGiaTri;
                }
            }
            // dd($sanPhamBienThe, $minPrice, $maxPrice);
        } else {
            $sanPhamBienThe = NULL;
            $minPrice = NULL;
            $maxPrice = NULL;
            $sumSoLuong = NULL;
            $result = NULL;
        }
        $alBumAnh = SanPham::join('album_anhs', 'album_anhs.san_pham_id', '=', 'san_phams.id')
            ->where('san_phams.id', $id)->get(['album_anhs.duong_dan_anh']);
        $alBumAnhBienThe = SanPham::join('bien_the_san_phams', 'bien_the_san_phams.san_pham_id', '=', 'san_phams.id')
            ->where('san_phams.id', $id)->get(['bien_the_san_phams.anh_bien_the_san_pham']);
        $sanPhamCungLoai = SanPham::leftJoin('danh_gias', 'danh_gias.san_pham_id', '=', 'san_phams.id')
            ->leftJoin('bien_the_san_phams', 'san_phams.id', '=', 'bien_the_san_phams.san_pham_id')
            ->orderBy('san_phams.id', 'desc')
            ->where('san_phams.id', '<>', $sanPhamDetail[0]->id)->where('danh_muc_id', $sanPhamDetail[0]->danh_muc_id)
            ->groupBy('san_phams.id', 'ten_san_pham', 'san_phams.gia', 'anh_san_pham', 'san_phams.kieu_san_pham')
            ->get([
                'san_phams.id', 'san_phams.ten_san_pham', 'san_phams.gia', 'san_phams.anh_san_pham', 'san_phams.kieu_san_pham',
                DB::raw('MAX(bien_the_san_phams.gia) as gia_max'),
                DB::raw('MIN(bien_the_san_phams.gia) as gia_min'),
                DB::raw('AVG(sao) as sao')
            ]);
        $listBinhLuan = SanPham::join('binh_luans', 'san_phams.id', '=', 'binh_luans.san_pham_id')
            ->join('users', 'binh_luans.user_id', '=', 'users.id')
            ->where('san_phams.id', $id)->get(['users.id', 'users.name', 'users.anh_dai_dien', 'binh_luans.noi_dung', 'binh_luans.thoi_gian']);
        $listDanhGia = DanhGia::join('san_phams', 'san_phams.id', '=', 'danh_gias.san_pham_id')
            ->join('users', 'danh_gias.user_id', '=', 'users.id')
            ->where('san_phams.id', $id)->get(['users.id', 'users.name', 'users.anh_dai_dien', 'danh_gias.noi_dung', 'danh_gias.ngay_danh_gia', 'danh_gias.sao']);
        $trungBinhSao = $listDanhGia->avg('sao');
        $template = 'clients.sanphamchitiets.index';
        return view('clients.layout', [
            'title' => 'Chi Tiết Sản Phẩm',
            'template' => $template,
            'listDanhMuc' => $this->listDanhMuc,
            'sanPhamDetail' => $sanPhamDetail,
            'alBumAnh' => $alBumAnh,
            'sanPhamDetail' => $sanPhamDetail,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sumSoLuong' => $sumSoLuong,
            'result' => $result,
            'sanPhamCungLoai' => $sanPhamCungLoai,
            'listBinhLuan' => $listBinhLuan,
            'listDanhGia' => $listDanhGia,
            'trungBinhSao' => $trungBinhSao,
            'listCart' => $listCart,
            'alBumAnhBienThe' => $alBumAnhBienThe
        ]);
    }

    public function checkout()
    {
        $listCart = GioHang::join('users', 'users.id', '=', 'gio_hangs.user_id')
            ->join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->leftJoin('san_phams as san_phams_alt', 'san_phams_alt.id', '=', 'bien_the_san_phams.san_pham_id')
            ->leftJoin('thuoc_tinh_bien_thes', 'bien_the_san_phams.id', '=', 'thuoc_tinh_bien_thes.bien_the_san_pham_id')
            ->leftJoin('thuoc_tinh_va_gia_tri_bien_thes', 'thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.thuoc_tinh_bien_the_id')
            ->leftJoin('gia_tri_thuoc_tinh_bien_thes', 'gia_tri_thuoc_tinh_bien_thes.id', '=', 'thuoc_tinh_va_gia_tri_bien_thes.gia_tri_thuoc_tinh_bien_the_id')
            ->where('users.id', Auth::id())
            ->groupBy(
                'san_phams.ten_san_pham',
                'san_phams_alt.ten_san_pham',
                'san_phams.anh_san_pham',
                'bien_the_san_phams.anh_bien_the_san_pham',
                'san_phams_alt.anh_san_pham',
                'san_phams.id',
                'san_phams_alt.id',
                'chi_tiet_gio_hangs.so_luong',
                'chi_tiet_gio_hangs.id',
                'san_phams.gia',
                'bien_the_san_phams.gia',
                'san_phams.kieu_san_pham',
                'san_phams_alt.kieu_san_pham',
                'bien_the_san_phams.id'
            )
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get([
                'chi_tiet_gio_hangs.so_luong', 'chi_tiet_gio_hangs.id as id_ctgh',
                DB::raw('COALESCE(san_phams.id, san_phams_alt.id) as id'),
                DB::raw('COALESCE(san_phams.id, bien_the_san_phams.id) as id_alt'),
                DB::raw('COALESCE(san_phams.kieu_san_pham, san_phams_alt.kieu_san_pham) as kieu_san_pham'),
                DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia'),
                DB::raw('COALESCE(san_phams.ten_san_pham, san_phams_alt.ten_san_pham) as ten_san_pham'),
                DB::raw('COALESCE(NULLIF(san_phams.anh_san_pham, ""), NULLIF(bien_the_san_phams.anh_bien_the_san_pham, ""), san_phams_alt.anh_san_pham) as anh_san_pham'),
                DB::raw('GROUP_CONCAT(DISTINCT thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the ORDER BY thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the SEPARATOR " - ") AS ten_thuoc_tinh_bien_the'), //thuoc_tinh_bien_thes.ten_thuoc_tinh_bien_the
                DB::raw('GROUP_CONCAT(DISTINCT gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt ORDER BY gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt SEPARATOR " - ") AS ten_gia_tri_thuoc_tinh_bt') //gia_tri_thuoc_tinh_bien_thes.ten_gia_tri_thuoc_tinh_bt
            ]);
        $template = 'clients.thanhtoans.index';
        return view('clients.layout', [
            'title' => 'Thanh Toán',
            'template' => $template,
            'listDanhMuc' => $this->listDanhMuc,
            'listCart' => $listCart
        ]);
    }

    public function checkoutPost(Request $request)
    {
        // dd($request->post());
        $listGioHang = GioHang::join('chi_tiet_gio_hangs', 'chi_tiet_gio_hangs.gio_hang_id', '=', 'gio_hangs.id')
            ->leftjoin('san_phams', 'san_phams.id', '=', 'chi_tiet_gio_hangs.san_pham_id')
            ->leftJoin('bien_the_san_phams', 'chi_tiet_gio_hangs.bien_the_san_pham_id', '=', 'bien_the_san_phams.id')
            ->where('gio_hangs.user_id', Auth::id())
            ->orderByDesc('chi_tiet_gio_hangs.id')
            ->get(['chi_tiet_gio_hangs.*', DB::raw('COALESCE(san_phams.gia, bien_the_san_phams.gia) as gia')]);
        $donHang = DonHang::create([
            'ma_don_hang' => "DH-" . Str::random(6),
            'user_id' => Auth::id(),
            'ten_nguoi_nhan' => $request->input('name'),
            'email_nguoi_nhan' => $request->input('email'),
            'so_dien_thoai_nguoi_nhan' => $request->input('phone'),
            'dia_chi_nguoi_nhan' => $request->input('address'),
            'tong_tien' => $request->input('tong_tien'),
            'ghi_chu' => $request->input('order_comments'),
            'phuong_thuc_thanh_toan_id' => $request->input('pttt'),
            'trang_thai_don_hang_id' => 2,
        ]);

        foreach ($listGioHang as $key => $value) {
            $chiTietGioHangDelete = ChiTietGioHang::findOrFail($value->id);
            ChiTietDonHang::create([
                'ma_chi_tiet_don_hang' => "CTDH-" . Str::random(5),
                'don_hang_id' => $donHang->id,
                'san_pham_id' => $value->san_pham_id,
                'bien_the_san_pham_id' => $value->bien_the_san_pham_id,
                'so_luong' => $value->so_luong,
                'gia' => $value->gia,
                'thanh_tien' => $value->gia * $value->so_luong
            ]);
            if ($value->san_pham_id !== NULL) {
                $sanPham = SanPham::findOrFail($value->san_pham_id);
                $sanPham->so_luong -= $value->so_luong;
                $sanPham->save();
            } else {
                $bienTheSanPham = BienTheSanPham::findOrFail($value->bien_the_san_pham_id);
                $bienTheSanPham->so_luong -= $value->so_luong;
                $bienTheSanPham->save();
            }
            $chiTietGioHangDelete->delete();
        }
        return redirect()->route('client.order')->with("success", "Thanh toán thành công");
    }
}
