<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_metode_pembayaran',
        'id_user',
        'bukti_pembayaran',
        'status',
        'nama_rekening_pengirim'
    ];

    public function metodePembayaran()
    {
        return $this->belongsTo(RefMetodePembayaran::class, 'id_metode_pembayaran', 'id_metode_pembayaran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
