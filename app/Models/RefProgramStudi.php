<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'ref_program_studis';
    protected $primaryKey = 'id_program_studi';
    protected $fillable = ['nama_program_studi'];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'id_program_studi', 'id_program_studi');
    }
}
