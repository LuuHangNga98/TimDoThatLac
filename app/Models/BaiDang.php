<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiDang extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table='bai_dang';
    protected $fillable=[
        'nguoi_dung_id',
        'the_loai_id',
        'danh_muc_id',
        'khu_vuc_id',
        'tieu_de',
        'noi_dung',
        'dia_chi',
        'trang_thai'
    ];

    public function nguoiDung() {
        return $this->belongsTo(NguoiDung::class);
    }
    public function theLoai() {
        return $this->belongsTo(TheLoai::class);
    }
    public function danhMuc() {
        return $this->belongsTo(DanhMuc::class);
    }
    public function khuVuc() {
        return $this->belongsTo(KhuVuc::class);
    }
}
