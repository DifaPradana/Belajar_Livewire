<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSumberInformasi extends Model
{
    use HasFactory;

    protected $table = 'ref_sumber_informasis';
    protected $primaryKey = 'id_sumber_informasi';

    protected $fillable = [
        'nama_sumber_informasi',
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_sumber_informasi', 'id_sumber_informasi');
    }
}
