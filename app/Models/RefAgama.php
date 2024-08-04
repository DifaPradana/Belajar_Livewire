<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefAgama extends Model
{
    use HasFactory;

    protected $table = 'ref_agamas';
    protected $primaryKey = 'id_agama';
    protected $fillable = ['nama_agama'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_agama', 'id_agama');
    }
}
