<?php

namespace App\Http\Controllers;

use App\Models\BaiDang;
use App\Models\DanhMuc;
use App\Models\HinhAnh;
use App\Models\KhuVuc;
use App\Models\LienHe;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangBaiRequest;
use App\Models\BaoCao;
use App\Models\NguoiDung;

class BaiDangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsTheLoai=TheLoai::all();
        $dsDanhMuc=DanhMuc::all();
        $dsKhuVuc=KhuVuc::all();
        $dsBaiDang=BaiDang::where('trang_thai',1)->orderBy('updated_at','DESC')->get();
        return view('main',['dsTheLoai'=>$dsTheLoai,'dsDanhMuc'=>$dsDanhMuc,'dsKhuVuc'=>$dsKhuVuc,'dsBaiDang'=>$dsBaiDang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dang_bai()
    {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->first();
        $danhMuc=DanhMuc::all();
        $theLoai=TheLoai::where('admin',0)->get();
        $khuVuc=KhuVuc::all();
        return view('client.my-post',['danhMuc'=>$danhMuc,'theLoai'=>$theLoai,'khuVuc'=>$khuVuc,'user'=>$nguoiDung,'id'=>$id]);
    }
    public function xl_dang_bai(DangBaiRequest $request){
        $user=Auth::id();
        
        $dangBai=BaiDang::create([
            'nguoi_dung_id'=>$user,
            'the_loai_id'=>$request->the_loai,
            'danh_muc_id'=>$request->danh_muc,
            'khu_vuc_id'=>$request->khu_vuc,
            'tieu_de'=>$request->tieu_de,
            'noi_dung'=>$request->noi_dung,
            'dia_chi'=>$request->dia_chi,
            'trang_thai'=>1,
        ]);
        $hinhAnh=BaiDang::latest()->first();
        $lienHe=LienHe::create([
            'bai_dang_id'=>$hinhAnh->id,
            'dien_thoai'=>$request->dien_thoai!=null?$request->dien_thoai:"",
            
        ]);
        if ($request->has('file')) {
            foreach ($request->file('file') as $img) {
                $filename = $img->getClientOriginalName();
                $img->move(public_path('clients/img'), $filename);
                HinhAnh::create([
                    'bai_dang_id'=>$hinhAnh->id,
                    'hinh_anh'=>$filename,
                ]);
            }
        }
        return redirect()->route('trang-chu',['id'=>Auth::id()]);
    }
    public function ds_bai_dang($id) {
        $array = ['Gi??? m???o ng?????i kh??c', 'T??i kho???n gi??? m???o', 'T??n gi??? m???o', '????ng n???i dung kh??ng ph?? h???p', 'Qu???y r???i ho???c b???t n???t', 'V???n ????? kh??c',];
        $nguoiDung=NguoiDung::where('id',$id)->first();
        $dsBaiDang=BaiDang::where('nguoi_dung_id',$id)->orderBy('trang_thai','DESC')->orderBy('updated_at','DESC')->get();
        return view('client.post-list',['user'=>$nguoiDung,'dsBaiDang'=>$dsBaiDang,'id'=>$id,'array'=>$array]);
    }
    public function xem_bai_dang($id) {
        $array = ['Tin gi???', 'Th??ng tin sai s??? th???t', 'H??nh ???nh ch???a n???i dung nh???y c???m','Qu???y r???i', 'Spam', 'Ng??n t??? g??y th?? gh??t','B??n h??ng tr??i ph??p', 'V???n ????? kh??c',];
        $user=NguoiDung::where('id',Auth::id())->first();
        $chiTietBaiDang=BaiDang::find($id);
        //$dsBinhLuan=BinhLuan::where([['bai_dang_id',$id],['binh_luan_id',0]])->orderBy('updated_at','DESC')->get();
        //$dsPhanHoi=BinhLuan::where([['bai_dang_id',$id],['binh_luan_id','>',0]])->orderBy('updated_at','ASC')->get();
        $soLuongHinhAnh=HinhAnh::where('bai_dang_id',$id)->count();
        $lienHe=LienHe::where('bai_dang_id',$id)->first();
        $hinhAnh=HinhAnh::where('bai_dang_id',$id)->get();
        //$follow=TheoDoi::where('nguoi_dung_id',Auth::id())->where('bai_dang_id',$id)->first();
        return view('client.detail-post',['baiDang'=>$chiTietBaiDang,'soLuongHA'=>$soLuongHinhAnh,'hinhAnh'=>$hinhAnh,'user'=>$user]);
    }
    public function bao_cao(Request $request) {
        BaoCao::create([
            'nguoi_bao_cao_id'=>Auth::id(),
            'bai_dang_id'=>$request->bai_dang!=null?$request->bai_dang:0,
            'binh_luan_id'=>$request->binh_luan!=null?$request->binh_luan:0,
            'nguoi_dung_id'=>$request->nguoi_dung!=null?$request->nguoi_dung:0,
            'noi_dung'=>$request->bao_cao,
        ]);
        if ($request->nguoi_dung!=null) {
            return redirect()->route('ds-bai-dang',['id'=>$request->nguoi_dung]);
        }
        return redirect()->route('xem-bai-dang',['id'=>$request->bai_dang]);
    }
    // public function ds_theo_doi($id) {
    //     $nguoiDung=NguoiDung::where('id',$id)->first();
    //     $dsTheoDoi=TheoDoi::where('nguoi_dung_id',$id)->where('trang_thai',1)->get();
    //     return view('main_pages.follow_list',['user'=>$nguoiDung,'id'=>$id,'dsTheoDoi'=>$dsTheoDoi]);
    // }
    // public function detail()
    // {
    //     return view('client.detail-post');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
