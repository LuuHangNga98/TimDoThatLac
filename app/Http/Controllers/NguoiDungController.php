<?php

namespace App\Http\Controllers;


use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\DangNhapRequest;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id=Auth::id();
        // $nguoiDung=NguoiDung::where('id',$id)->first();
        // return view('main',['user'=>$nguoiDung,'id'=>$id]);
    }
    public function sign_up()
    {
        return view('begin.sign-up');
    }
    public function get_sign_up(DangKyRequest $request)
    {
        $nguoiDung=NguoiDung::create([
            'ho_ten'=>$request->ho_ten,
            'mat_khau'=>Hash::make($request->password),
            'so_dien_thoai'=>$request->so_dien_thoai,
            'email'=>$request->email,
            'admin'=>0,
            'gioi_tinh'=>1,
            'anh_dai_dien'=>"",
        ]);
       
        return redirect()->route('xl-dang-nhap');
    }
    public function sign_in()
    {
        return view('begin.sign-in');
    }
    public function get_sign_in(DangNhapRequest $request)
    {
        $nguoidung =[
            'email'=>$request->email,
            'password'=>$request->password,
            'admin'=>0,
        ];
        $admin =[
            'email'=>$request->email,
            'password'=>$request->password,
            'admin'=>1,
        ];
        if(Auth::attempt($admin))
        {   
                return redirect()->route('trang-ca-nhan');
                
        }else if(Auth::attempt($nguoidung)){
            return redirect()->route('trang-chu');
        }
       return redirect()->back()->with('error','Đăng nhập thất bại');
    }

    public function log_out()
    {
        Auth::logout();
        return redirect()->route('dang-xuat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
    public function edit_account()
    {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->first();
        return view('client.edit-account',['user'=>$nguoiDung,'id'=>$id]);
    }
    public function get_edit_account(Request $request)
    {
        $id=Auth::id();
        $nguoiDung=NguoiDung::where('id',$id)->update([
            'ho_ten'=>$request->ho_ten,
            'gioi_tinh'=>(int)$request->gioi_tinh,
            'so_dien_thoai'=>$request->so_dien_thoai,
        ]);
        $img =NguoiDung::find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('clients/img'), $filename);
            $img->anh_dai_dien = $filename;
        }
        $img->save();
       if(Auth::user()->admin==0){
        return redirect()->route('trang-chu',['id'=>Auth::id()]);
       }
       else{
        return redirect()->route('trang-chu',['id'=>Auth::id()]);
       }
    }
    public function forgot_password()
    {
        return view('begin.forgot-password');
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
