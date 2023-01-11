<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LienHe extends Model
{
    use HasFactory;
    use softDeletes;
    protected $table='lien_he';
    protected $fillable=[
        'bai_dang_id',
        'dien_thoai',
        
    ];

    public function baiDang() {
        return $this->belongsTo(BaiDang::class);
    }
}
