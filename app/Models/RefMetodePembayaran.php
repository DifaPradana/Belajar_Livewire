<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefMetodePembayaran extends Model
{
    use HasFactory;

    protected $table = 'ref_metode_pembayarans';

    protected $primaryKey = 'id_metode_pembayaran';

    protected $fillable = [
        'nama_metode_pembayaran',
    ];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }
}
