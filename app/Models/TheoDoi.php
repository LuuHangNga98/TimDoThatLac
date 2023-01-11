<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheoDoi extends Model
{
    use HasFactory;
    protected $table='theo_doi';
    protected $fillable=['nguoi_dung_id','bai_dang_id','trang_thai'];
    public function nguoiDung() {
        return $this->belongsTo(NguoiDung::class);
    }
    public function baiDang() {
        return $this->belongsTo(BaiDang::class);
    }

}
