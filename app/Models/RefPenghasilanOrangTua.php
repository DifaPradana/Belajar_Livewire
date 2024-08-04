<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPenghasilanOrangTua extends Model
{
    use HasFactory;

    protected $table = 'ref_penghasilan_orang_tuas';
    protected $primaryKey = 'id_penghasilan_orang_tua';
    protected $fillable = ['nama_penghasilan_orang_tua'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_penghasilan_orang_tua', 'id_penghasilan_orang_tua');
    }
}
