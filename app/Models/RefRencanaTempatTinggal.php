<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefRencanaTempatTinggal extends Model
{
    use HasFactory;

    protected $table = 'ref_rencana_tempat_tinggals';
    protected $primaryKey = 'id_rencana_tempat_tinggal';
    protected $fillable = ['nama_rencana_tempat_tinggal'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_rencana_tempat_tinggal', 'id_rencana_tempat_tinggal');
    }
}
