<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    use HasFactory;
    use softDeletes;
    protected $table='nguoi_dung';
    protected $fillable=[
        'ho_ten',
        'mat_khau',
        'so_dien_thoai',
        'email',
        'admin',
        //'ngay_sinh',
        'gioi_tinh',
        'anh_dai_dien'
    ];
    public function getPasswordAttribute(){
        return $this->mat_khau;
    }
}
