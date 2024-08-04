<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefBerkas extends Model
{
    use HasFactory;

    protected $table = 'ref_berkas';
    protected $primaryKey = 'id_berkas';
    protected $fillable = ['nama_berkas'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_berkas', 'id_berkas');
    }
}
