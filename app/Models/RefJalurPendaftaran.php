<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJalurPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'ref_jalur_pendaftarans';
    protected $primaryKey = 'id_jalur_pendaftaran';
    protected $fillable = ['nama_jalur_pendaftaran'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_jalur_pendaftaran', 'id_jalur_pendaftaran');
    }
}
