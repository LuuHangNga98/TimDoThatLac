<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinhLuan extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table='binh_luan';
    protected $fillable=[
        'binh_luan_id',
        'bai_dang_id',
        'nguoi_dung_id',
        'noi_dung',
    ];
    public function binhLuan() {
        return $this->belongsTo(BinhLuan::class);
    }
    public function baiDang() {
        return $this->belongsTo(BaiDang::class);
    }
    public function nguoiDung() {
        return $this->belongsTo(NguoiDung::class);
    }
}
