<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadBerkas extends Model
{
    use HasFactory;

    protected $table = 'upload_berkas';

    protected $primaryKey = 'id_upload_berkas';

    protected $fillable = [
        'id_pendaftaran',
        'id_berkas',
        'berkas',
    ];

    public function berkas()
    {
        return $this->belongsTo(RefBerkas::class, 'id_berkas', 'id_berkas');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
